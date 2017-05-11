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
    <label for="email">Login</label>
    <input type="text" class="form-control" id="email" name="login" >
  </div>
  <div class="form-group">
    <label for="pwd">Passe</label>
    <input type="password" class="form-control" id="pwd" name="passe">
  </div>
  <button type="submit" name="action" value="Inscription" class="btn btn-default">Inscription</button>
</form>

</p>




