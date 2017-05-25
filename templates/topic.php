<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=topic");
	die("");
}
    $categorie = $_GET['cat'];
?>
    <link rel="stylesheet" href="css/Home_css.css">
    <?php
        echo '<a class="creation" href="templates/Create_topic.php">Creer topic</a>'; 
    ?>
    <section class="last-topic-contain">
            <div class="last-topic">
                <ol>
                <?php
                    echo "<h2>Les derniers topics en $categorie </h2></hr>";
                    $topics = last_cat_topics($categorie);
                    foreach($topics as $element){
                        $topic_id = $element["Topic_id"];
                        echo "<li><a href=\"index.php?view=topic_page&id=$topic_id\">[". $element["Topic_creator"]. "]" .$element["Topic_content"]. "<a/></li><br />";
                    }
                ?>
            </div>
        </section>