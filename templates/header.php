<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

include_once("libs/modele.php");

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>TinyMVC ...</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

	<!-- Liaisons aux fichiers css de Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />
	<link href="css/sticky-footer.css" rel="stylesheet" />
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->

	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>

<!-- style inspiré de http://www.bootstrapzero.com/bootstrap-template/sticky-footer --> 

<!-- Wrap all page content here -->
<div id="wrap">
  
  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
        </button>
	<a class="navbar-brand" href="index.php?view=accueil">TUTO 2I</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
         	<!-- <li class="active"><a href="index.php?view=accueil">Accueil</a></li> -->
		<?=mkHeadLink("Accueil","accueil",$view)?>
		<?php
		$id = valider("id","SESSION"); 
		$info = InfoUser($id);	
		// Si l'utilisateur n'est pas connecte, on affiche un lien de connexion 


		

		
		// else {
		// 	// s'il est connecté et administrateur... 
		// 	if (isAdmin($_SESSION["idUser"])) 
		// 		echo mkHeadLink("Administration","admin",$view); 
		// }

		//LES LIENS DE LA NAVBAR A DROITE 
		?>
        </ul>

       	<ul class="nav navbar-nav navbar-right"> 

       	<?php


       	if (!valider("connecte","SESSION")) {
       		?>

				
			<li><a href="index.php?view=login"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
			<?php

		} 
		?>


		<?php

       	if (!valider("connecte","SESSION")) {
       		?>

				
			<li><a href="index.php?view=Inscription"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
			<?php

		}
		?>

		<?php

		if (valider("connecte","SESSION")) {
		?>
			
			<li><a href="index.php?view=profil"><span class="glyphicon glyphicon-certificate"></span> Mon profil </a></li>
		<?php
		}
		?>
    
		<?php

       	if (valider("connecte","SESSION")) {
       		?>

				
			<li><a href="controleur.php?action=Logout"><span class="glyphicon glyphicon-off"></span> Se deconnecter </a></li>
			<?php
		} 
		?>

		<?php
		
       	if (valider("connecte","SESSION"))
       	if ($info[0]["Member_admin"] == 1) {
       		?>

				
			<li><a href="index.php?view=admin"><span class="glyphicon glyphicon-th-large"></span> Administration </a></li>
			<?php
		} 
		?>



		
    </ul>

      </div><!--/.nav-collapse -->
    </div>
  </div>
  
  <!-- Begin page content -->
  <div class="container"> 