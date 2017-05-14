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
							setcookie("login", $login , time()+60*60*24*30);
							setcookie("passe", $password, time()+60*60*24*30);
							setcookie("remember", true, time()+60*60*24*30);
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
					$msg = creerUser($login,$passe, $email); 
					$msg2 = creerUser($login,$passe, $email);
					$msg3 = creerUser($login,$passe, $email);
					
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
       
			case "Valider" : 
			if ($idUser = valider("idUser"))
				validerUtilisateur($idUser);
			$addArgs = "?view=admin";
			break; 


			case "Blacklister" : 
			if ($idUser = valider("idUser"))
				interdireUtilisateur($idUser);
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










