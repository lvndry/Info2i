<?php

if (basename($_SERVER["PHP_SELF"]) == "ChangePass.php")
{
	header("Location:../index.php?view=ChangePass");
	die("");
}


include_once("libs/modele.php");
include_once("libs/maLibUtils.php");	
include_once("libs/maLibForms.php");


?>
    <div class="page-header">
      <h1> <strong> Mon profil </strong></h1>
    </div>




<h2> <span style="color: #F87901;"> Modifier mon mot de passe </span> </h2> <br/> </br/> 

<p class="lead">

 <form role="form" action="controleur.php">
  <div class="form-group">
    <label for="pwd">Votre mot de passe actuel</label>
    <input type="password" class="form-control" id="login" name="passe" >
  </div>
  <div class="form-group">
    <label for="newpwd">Nouveau mot de passe</label>
    <input type="password" class="form-control" id="pwd" name="newpasse">
  </div>
  <div class="form-group">
  <label for="confirmepwd">Confirmez le nouveau mot de passe</label>
  <input type="password" class="form-control" id="email" name="confirmepasse">
  </div>
  <button type="submit" name="action" value="ChangeMdp" class="btn btn-default">Valider</button> 
</form>
</p>

<?php 
if ($msg1 = valider("msg1"))
echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Erreur. </strong> Le mot de passe est incorrect.</div>";

if ($msg2 = valider("msg2"))
echo "<div class=\"alert alert-danger\" role=\"alert\"><strong> Erreur.</strong> Le mot de passe de confirmation est différent de celui saisi. </div>";





?> 
