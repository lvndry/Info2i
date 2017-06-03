<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			// Connexion //////////////////////////////////////////////////
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				$passe = valider("passe");
				$login = valider("login");
					if (verifUser($login, $passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (valider("remember")) {
							setcookie('1login', $login , time()+60*60*24*30);
							setcookie('passe', $password, time()+60*60*24*30);
							setcookie('remember', true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
							$addArgs = "?view=accueil";
						}

					}	
					else 
					{
						$msg4 ="erreur";
						$addArgs = "?view=login&msg4=erreur";
					}
				// On redirigera vers la page index automatiquement
			break;

			case 'Logout' :
				session_destroy();
				$addArgs = "?view=login";
			break;


			case 'Inscription' :
				// On verifie la presence des champs login et passe
				// Prochaine vue par défaut = vue inscription 
				$addArgs = "?view=inscription";

				if ($login = valider("login"))
				if ($passe = valider("passe"))
				if ($email = valider("email")) {
					//TODO: il faudrait vérifier 
					// que ce login n'est pas déjà utilisé

					// créer l'utilisateur 
					// non validé par défaut 
					$msg = creerUser($login, $passe, $email); 
					$msg2 = creerUser($login, $passe, $email);
					$msg3 = creerUser($login, $passe, $email);
					
					if($msg=="login")
					{
					   $addArgs = "?view=Inscription&msg=login";
					}

					else if($msg2 =="email")
					{
						$addArgs = "?view=Inscription&msg2=email";
					}

					else
					{
					   $msg3="ok";
					   $addArgs = "?view=Inscription&msg3=ok";
					}
				}
			break; 
            
            case "Envoyez le topic" : 
                if ($title = valider("title"))
                if ($content = valider("content"))
                if ($member = valider("pseudo"))
                if ($categorie = valider("categorie")){
                insert_topic($member, $title, $content, $categorie);
                $last_t = view_last_user_topic($member);
                
                foreach($last_t as $element){
                    $id = $element["Topic_id"];
                    $addArgs = "?view=topic_page&id=$id";
                }

               

            }



                
            	
           
            
                //rediriger("templates/topic_page.php");
                
            break;
                
            case "Répondre" :
                if ($member = valider("pseudo"))
                if ($content = valider("content")) 
                if ($id = valider("id")){
                    insert_responses($content, $id, $member);
                    rediriger("index.php?view=topic_page&id=$id");
                }
                else rediriger("index.php?view=login");
            break;
                
			case "Valider" : 
			if ($idUser = valider("idUser"))
				validerUtilisateur($idUser);
			$addArgs = "?view=admin";
			break; 


			case "Supprimer" : 
			if ($idUser = valider("idUser"))
				supprimerUtilisateur($idUser);
			$addArgs = "?view=admin";
			break; 

			case "Réactiver" : 
			if ($idUser = valider("idUser"))
				autoriserUtilisateur($idUser);
			$addArgs = "?view=admin";
			break; 

			case "ChangeMdp" : 
			$id = valider("id","SESSION"); 
			$passe = valider("passe");
			$newpasse = valider("newpasse");
			$confirmepasse = valider("confirmepasse");

				if ($newpasse == $confirmepasse)
				{
					if(verifmdp($passe))
					{
						$msgp = "ok";
						changemdp($newpasse,$id);
						$addArgs = "?view=profil&msgp=ok";
					}
					else
					{
						$msg1="mdp";
						$addArgs="?view=ChangePass&msg1=mdp";
					}
				}
				else
				{
					$msg2="doublon";
					$addArgs ="?view=ChangePass&msg2=doublon";
				}

			break;

			case "ChangeEmail" : 
			$id = valider("id","SESSION"); 
			$email = valider("email");
			$newemail = valider("newemail");
			$confirmeemail = valider("confirmeemail");

				if ($newemail == $confirmeemail)
				{
					if(verifemail($email))
					{
						$msge = "ok";
						changeemail($newemail,$id);
						$addArgs = "?view=profil&msge=ok";
					}
					else
					{
						$msg1 = "mail";
						$addArgs="?view=ChangeEmail&msg1=mail";
					}
				}
				else
				{
					$msg2 = "doublon";
					$addArgs="?view=ChangeEmail&msg2=doublon";
				}


			break;


			case "MettreAdmin" : 

			$id = valider("id");
			MettreAdmin($id);
			$addArgs="?view=admin"; 

			break;


			case "SupprAdmin" :

			$id = valider("id");
			RetirerAdmin($id);
			$addArgs="?view=admin"; 

			break;


			case "Bannir" :

			$id = valider("id");
			bannir($id);
			$addArgs="?view=admin"; 

			break;

			case "Debannir" :

			$id = valider("id");
			debannir($id);
			$addArgs="?view=admin"; 

			break;


		}

	}
    /*if($categorie = $_POST['cat']){
        rediriger("incscription.php");
        echo 'La categorie est' . $categorie . '.';
        $addArgs = '?view='.$categorie;
    }*/

        // On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $addArgs);

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>










