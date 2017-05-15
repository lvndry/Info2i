<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) == "profil.php")
{
	header("Location:../index.php?view=profil");
	die("");
}


include_once("libs/modele.php");
include_once("libs/maLibUtils.php");	
include_once("libs/maLibForms.php");

?>


    <div class="page-header">
      <h1> <strong> Mon profil </strong></h1>
    </div>




<h2> <span style="color: #F87901;"> Mes informations </span> </h2> <br/> </br/> 
<p> 
<?php
$id = valider("id","SESSION"); 
$info = InfoUser($id);
?>
			
		<div>Nom d'utilisateur :  <span style="color : blue";> <?php echo '<strong>'.$info[0]["Member_pseudo"].'</strong>'; ?> </span> </div>  <br/> 
		<div>Mot de passe : <span style="color : blue";> <strong> ********** </strong><br/> <br/> </span> </div>  <!-- on évite de l'écrire vraiment par sécurité  -->
		<div>Email : <span style="color : blue";><?php echo '<strong>'.$info[0]["Member_email"].'</strong>'; ?> <br/> </span> </div>


</p>





<!--    <p> 
   <?php //echo "Bonjour à toi  <b>$_SESSION[pseudo]</b>, bienvenue sur notre forum."; 
   ?> 
   </p> -->
