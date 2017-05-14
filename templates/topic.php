<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}
    $categorie = $_GET['cat'];
?>
    
    <section class="last-topic-contain">
            <div class="last-topic">
               <!--Les titres des derniers themes devront etre affiché grace a du JS ou au backend--> 
                <h2>Les derniers topics crées : </h2><hr />
                <ol>
                <?php
                    $topics = last_cat_topics($categorie);
                    foreach($topics as $element)
                        echo "<li><a href=\"#\">[". $element["Topic_creator"]. "]" .$element["Topic_content"]. "<a/></li> <br />";
                ?>
            </div>
        </section>