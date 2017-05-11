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
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				{
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($login,$passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$password, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}

					}	
				}

				// On redirigera vers la page index automatiquement
			break;

			case 'Logout' :
				session_destroy();
			break;


			case 'Inscription' :
				// On verifie la presence des champs login et passe
				// Prochaine vue par défaut = vue inscription 
				$addArgs = "?view=inscription";

				if ($login = valider("login"))
				if ($passe = valider("passe")) {
					//TODO: il faudrait vérifier 
					// que ce login n'est pas déjà utilisé

					// créer l'utilisateur 
					// non validé par défaut 
					$id = creerUser($login,$passe); 

					// auto-connecter cet utilisateur
					creerSessionUserConnecte($login,$id);
					// pied de page devra afficher
					//		 'en attente de validation'

					// Prochaine vue = vue accueil  
					$addArgs = "?view=accueil";
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

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $addArgs);

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>










