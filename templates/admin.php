<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

include_once("libs/maLibForms.php");
?>


    <div class="page-header">
      <h1>Administration</h1>
    </div>

    <p class="lead">

	Exempe de syntaxe Heredoc : 

	<table border="1">
		<thead><tr>
		<th>Pseudo</th>
		<th>Valide</th>
		<th>Blacklisté</th>
		</tr></thead>
		
<?php

	$users = listerUtilisateurs();
    foreach ($users as $dataUser) {

		// utilisation de syntaxe Heredoc : http://php.net/manual/fr/language.types.string.php#language.types.string.syntax.heredoc

echo <<<EOT

		<tr>
			<td>$dataUser[pseudo]</td>
			<td>$dataUser[valide]</td>
			<td>$dataUser[blacklist]</td>
		</tr>

EOT;
    }
?>

	</table>
</p>

<p class="lead">

	Opérations sur les utilisateurs :

	<table border="1">
		<thead><tr>
		<th>Pseudo</th>
		<th colspan="2">Opérations</th>
		</tr></thead>

<?php

	$users = listerUtilisateurs();
    foreach ($users as $dataUser) {
		$nextClass ="";

		if (!$dataUser["valide"]) $nextClass = " alert-info";
		else {
			if (!$dataUser["blacklist"]) $nextClass = " alert-success";
			else $nextClass = " alert-danger";
		}
		
		echo "<tr class=\"$nextClass\">"; 
			echo "<td>$dataUser[pseudo]</td>";

			echo "<td>";
			if (!$dataUser["valide"]) {
echo <<<EOT
	<form action="controleur.php">
	<input type="hidden" name="idUser" value="$dataUser[id]" />
	<input class="btn-info" type="submit" name="action" value="Valider" />
	</form>
EOT;
			}
			else {
				if (!$dataUser["blacklist"]) $action ="Blacklister";
				else $action="Réactiver";
				echo <<<EOT
					<form action="controleur.php">
					<input type="hidden" name="idUser" value="$dataUser[id]" />
					<input class="btn-warning" type="submit" name="action" value="$action" />
					</form>
EOT;
}
	
			echo "</td>";

			echo "<td>";
			// Supprimer
echo <<<EOT
	<form action="controleur.php">
	<input type="hidden" name="idUser" value="$dataUser[id]" />
	<input class="btn-danger" type="submit" name="action" value="Supprimer" />
	</form>
EOT;

			echo "</td>";
		echo "</tr>"; 
    }
?>
	</table>
</p>





