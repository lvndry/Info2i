<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

include_once("libs/modele.php");
?>


</div>
<!-- fin du content --> 

<!-- fin du wrap -->
</div>

<div id="footer">
  <div class="container">
   	 <p class="text-muted credit">
		<?php
		// Si l'utilisateur est connecte, on affiche un lien de deconnexion 
		if (valider("connecte","SESSION"))
		{
			echo "Utilisateur <b>$_SESSION[pseudo]</b> connecté depuis <b>$_SESSION[heureConnexion]</b> &nbsp; "; 
			echo "<a href=\"controleur.php?action=Logout\">Se Déconnecter</a>";

			// LE compte est-il valide ? 
		// erreur : fonction isValid inconnue... 
			// if (!isValid($_SESSION["idUser"])) {
			// 	echo " - Compte en attente d'activation";
			// }
		}
		?>
	</p>
  </div>
</div>

</body>
</html>
