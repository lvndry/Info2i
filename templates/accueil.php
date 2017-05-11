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

?>
<html>
   <head>
       <meta charset="utf-8">
         <link rel="stylesheet" href="css/Home_css.css">
         <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
   </head>
    <body>
        <section class="last-topic-contain">
            <div class="last-topic">
               <!--Les titres des derniers themes devront etre affiché grace a du JS ou au backend--> 
                <h2>Les derniers topics crées : </h2><hr />
                <ol>
            <!--
                /*$lasttopic = last_topics();
                if($lasttopic){
                    while($donnees = $lasttopic->fetch())
                    {
                    echo '<li>'.$donnees['Topic_title'].'<li>';
                    }
                } */
                */ -->
            </div>
        </section>
        
        <section class="all-themes">
        <h2 id="all-topics">Tous les forums</h2><hr />
        <div class="ul-container">
        <ul>
            <li class="strong"> <a href="#"><h3>Scolaire</h3></a>
                <ul>
                    <li><a href="controleur.php?cat=', urlencode('Mathematiques'), '">Mathematiques</a></li>
                    <li><a href="#">Industriel</a></li>
                    <li><a href="#">Communication</a></li>
                    <li><a href="#">Langues</a></li>
                    
                </ul>
            </li>
            <li class="strong"><a><h3>Divers</h3></a>
               <ul>
                   <li><a href="#">diy</a></li>
                   <li><a href="#">Cuisine</a></li>
                   <li><a href="#">Soiree</a></li>
               </ul>
            </li>
            
            <li class="strong"><a href="#"><h3>Ventes</h3></a></li>
        </ul>
        </div>
        </section>
</body>
</html>