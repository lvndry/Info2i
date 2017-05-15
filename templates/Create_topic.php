<?php
    session_start();
    include_once "../libs/maLibUtils.php";
    include_once "../libs/modele.php";
    include_once "../libs/config.php";

  echo 'Login est '. $_SESSION['login'];
?>

Creer topic