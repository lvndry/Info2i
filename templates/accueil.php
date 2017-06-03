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
<?php 
$id = valider("id","SESSION"); 
$info = InfoUser($id);

if ( !valider("connecte","SESSION") ||$info[0]["Member_ban"]==0 ) {

?>

    <?php
        if (valider("connecte","SESSION")) {
        echo '<a class="creation" href="templates/Create_topic.php">Creer topic</a>'; 
    }
    ?>

       <meta charset="utf-8">
         <link rel="stylesheet" href="css/Home_css.css">
         <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400">
   </head>
    <body>
        <section class="last-topic-contain">
            <div class="last-topic">
                <h2>Les derniers topics crées : </h2><hr />
                <ol>
                <form action ="controleur.php">
                <?php
                    $topics = last_topics();
                    foreach($topics as $element){
                        $topic_id = $element["Topic_id"];
                        echo "<li><a href=\"index.php?view=topic_page&id=$topic_id\">[". $element["Topic_creator"]. "]" .$element["Topic_title"]. "<a/></li><br />";
                    }
                ?>
                </form>
            </div>
        </section>
        
        <section class="all-themes">
        <h2 id="all-topics">Tous les forums</h2><hr />
        <div class="ul-container">
        <ul>
            <li class="strong"> <a><h3>Scolaire</h3></a>
                <ul>
                    <li><a href="index.php?view=topic&cat=Informatique">Informatique</a></li>
                    <li><a href="index.php?view=topic&cat=Mathematiques">Mathematiques</a></li>
                    <li><a href="index.php?view=topic&cat=Industriel">Industriel</a></li>
                    <li><a href="index.php?view=topic&cat=Communiction">Communication</a></li>
                    <li><a href="index.php?view=topic&cat=Langues">Langues</a></li> 
                </ul>
            </li>
            
            <li class="strong"><a><h3>Divers</h3></a>
               <ul>
                   <li><a href="index.php?view=topic&cat=DIY">diy</a></li>
                   <li><a href="index.php?view=topic&cat=Cuisine">Cuisine</a></li>
                   <li><a href="index.php?view=topic&cat=Soirée">Soiree</a></li>
               </ul>
            </li>
            <li class="strong"><a><h3>Ventes</h3></a></li>
        </ul>
        </div>
        </section>
    <?php
  }  
 if  (valider("connecte","SESSION")) {
 if ($info[0]["Member_ban"]==1)
 {
    ?> 

    <div class="page-header" style="color:red;">
    <h1>Ton compte a été banni.</h1>
</div>

<p> <h3> En effet, tu as été banni de ce site, pour avoir plus d'informations, contacte un administrateur.  </h3> </p>

<?php
  }

}
   
    
?> 






</body>
</html>