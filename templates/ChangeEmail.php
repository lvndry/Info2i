<?php

if (basename($_SERVER["PHP_SELF"]) == "ChangePass.php")
{
	header("Location:../index.php?view=ChangeEmail");
	die("");
}


include_once("libs/modele.php");
include_once("libs/maLibUtils.php");	
include_once("libs/maLibForms.php");


?>
    <div class="page-header">
      <h1> <strong> Mon profil </strong></h1>
    </div>




<h2> <span style="color: #F87901;"> Modifier mon email </span> </h2> <br/> </br/> 

<p class="lead">

 <form role="form" action="controleur.php">
  <div class="form-group">
    <label for="mail">Votre adresse e-mail actuelle</label>
    <input type="email" class="form-control" id="login" name="email" >
  </div>
  <div class="form-group">
    <label for="newmail">Nouvelle adresse e-mail</label>
    <input type="email" class="form-control" id="pwd" name="newemail">
  </div>
  <div class="form-group">
  <label for="confirmemail">Confirmez la nouvelle adresse e-mail</label>
  <input type="email" class="form-control" id="email" name="confirmeemail">
  </div>
  <button type="submit" name="action" value="ChangeEmail" class="btn btn-default">Valider</button> 
</form>
</p>


<?php 
if ($msg1 = valider("msg1"))
echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Erreur. </strong> L'email est incorrect.</div>";

if ($msg2 = valider("msg2"))
echo "<div class=\"alert alert-danger\" role=\"alert\"><strong> Erreur.</strong> L'e-mail de confirmation est différent de celui saisi. </div>";





?> 