<?php
    session_start();
    include_once "../libs/maLibUtils.php";
    include_once "../libs/modele.php";
    include_once "../libs/config.php";

    $login = valider("login", "COOKIE");
    echo 'Login est '. $login;
?>

Creer topic