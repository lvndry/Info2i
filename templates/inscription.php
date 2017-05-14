<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}

?>

<div class="page-header">
	<h1>Inscription</h1>
</div>

<p class="lead">

 <form role="form" action="controleur.php">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login" name="login" >
  </div>
  <div class="form-group">
    <label for="pwd">Passe</label>
    <input type="password" class="form-control" id="pwd" name="passe">
  </div>
  <div class="form-group">
  <label for="email">Email</label>
  <input type="email" class="form-control" id="email" name="email">
  </div>
  <button type="submit" name="action" value="Inscription" class="btn btn-default">Inscription</button>
</form>
</p>
<p>

<?php 
if ($msg = valider("msg"))
echo "<div class=\"alert alert-danger\" role=\"alert\">Erreur dans la création de votre compte.<strong> Login déjà utilisé </strong> </div>";

if ($msg2 = valider("msg2"))
echo "<div class=\"alert alert-danger\" role=\"alert\">Erreur dans la création de votre compte.<strong> Email déjà utilisé </strong> </div>";

if ($msg3 = valider("msg3"))
echo "<div class=\"alert alert-success\" role=\"alert\">Votre compte a bien été crée.</div>";

?>

</p>





