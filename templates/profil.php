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
			
		<div> <strong>Nom d'utilisateur : </strong><span style="color : gray";> <?php echo $info[0]["Member_pseudo"]; ?> </span> </div>  <br/> 
		<div> <strong>Mot de passe : </strong><span style="color : gray";>**********</span></span>  <a href="index.php?view=ChangePass">   <span class="glyphicon glyphicon-pencil"></span> </a> <br/> <br/> </div>  <!-- on évite de l'écrire vraiment par sécurité  -->
		<div> <strong>Email : </strong> <span style="color : gray";><?php echo $info[0]["Member_email"]; ?>  </span> </span>  <a href="index.php?view=ChangeEmail">  <span class="glyphicon glyphicon-pencil"></span> </a> <br/></div>


</p>


<?php

if ($msge = valider("msge"))
echo "<div class=\"alert alert-success\" role=\"alert\">Votre email a bien été modifié.</div>";

if ($msgp = valider("msgp"))
echo "<div class=\"alert alert-success\" role=\"alert\">Votre mot de passe a bien été modifié.</div>";

?>
