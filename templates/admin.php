<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) == "admin.php")
{
	header("Location:../index.php?view=admin");
	die("");
}


include_once("libs/modele.php");
include_once("libs/maLibUtils.php");	
include_once("libs/maLibForms.php");

?>


    <div class="page-header">
      <h1> <strong> Administration </strong></h1>
    </div>




<h2> <span style="color: #F87901;"> Utilisateurs :  </span> </h2> <br/> </br/> 
<p> 
<?php 
$users = listerUtilisateurs(); 
mkTable($users,array('Member_id','Member_pseudo', 'Member_email','Member_admin','Member_ban'),"utilisateur","idmembre"); 


?>
<form role="form" action="controleur.php">
<select name="id"> 
<?php
foreach($users as $data) { echo "<option value='".$data["Member_id"]."'>" .$data["Member_pseudo"]."</option>"; } 

?> 

</select>
<button type="submit" name="action" value="MettreAdmin" class="btn btn-default">Mettre Admin</button>
</form> 

<br/> 
<br/>



<form role="form" action="controleur.php">
<select name="id"> 
<?php
foreach($users as $data) { echo "<option value='".$data["Member_id"]."'>" .$data["Member_pseudo"]."</option>"; } 

?> 

</select>
<button type="submit" name="action" value="SupprAdmin" class="btn btn-default">Supprimer d'Admin</button>
</form> 

</p>

<br/> 
<br/>


<form role="form" action="controleur.php">
<select name="id"> 
<?php
foreach($users as $data) { echo "<option value='".$data["Member_id"]."'>" .$data["Member_pseudo"]."</option>"; } 

?> 

</select>
<button type="submit" name="action" value="Bannir" class="btn btn-default">Bannir un utilisateur.</button>
</form> 


<br/> 
<br/>

<form role="form" action="controleur.php">
<select name="id"> 
<?php
foreach($users as $data) { echo "<option value='".$data["Member_id"]."'>" .$data["Member_pseudo"]."</option>"; } 

?> 

</select>
<button type="submit" name="action" value="Debannir" class="btn btn-default">Debannir un utilisateur.</button>
</form> 

