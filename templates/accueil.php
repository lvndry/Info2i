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
        <section class="last-topic-contain jumbotron">
            <div class="last-topic">
                <h2>Les derniers topics crées : </h2><hr />
                <ol>
                <form action ="controleur.php">
                <?php
                    $topics = last_topics();
                    foreach($topics as $element){
                        $topic_id = $element["Topic_id"];
                        echo "<p><li><a href=\"index.php?view=topic_page&id=$topic_id\">[". $element["Topic_creator"]. "]" .$element["Topic_title"]. "</a></li></p>";
                    }
                ?>
                </form>
            </div>
        </section>
        
        <section class="all-themes jumbotron">
        <h2 id="all-topics">Tous les forums</h2><hr />
        <div class="ul-container">
            <li class="strong"> 
               <h3>Scolaire</h3>
                <ul>
                    <li><a href="index.php?view=topic&cat=Informatique">Informatique</a></li>
                    <li><a href="index.php?view=topic&cat=Mathematiques">Mathematiques</a></li>
                    <li><a href="index.php?view=topic&cat=Industriel">Industriel</a></li>
                    <li><a href="index.php?view=topic&cat=Communiction">Communication</a></li>
                    <li><a href="index.php?view=topic&cat=Langues">Langues</a></li> 
                </ul>
            </li>
            
            <li class="strong"><h3>Divers</h3>
               <ul>
                   <li><a href="index.php?view=topic&cat=DIY">diy</a></li>
                   <li><a href="index.php?view=topic&cat=Cuisine">Cuisine</a></li>
                   <li><a href="index.php?view=topic&cat=Soirée">Soiree</a></li>
               </ul>
            </li>
            <li class="strong"><h3>Ventes</h3></li>
       
        </div>
        </section>
</body>
</html>