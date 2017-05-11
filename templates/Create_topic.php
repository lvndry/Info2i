<?php
    include("maLibUtils.php");
    include("modele.php");
    include("config.php");

    if($SESSION['member_id']){
        rediriger("Create_topic.php");
    }
    else rediriger("connexion.php");

?>