<?php
    session_start();
    include_once "../libs/maLibUtils.php";
    include_once "../libs/modele.php";
    include_once "../libs/config.php";

    if(isset($_SESSION['login'])){
        echo "Connecté";
        rediriger("Create_topic.php");
    }
    else rediriger("connexion.php");
?>

Creer topic