<?php
    session_start();
    include_once "../libs/maLibUtils.php";
    include_once "../libs/modele.php";
    include_once "../libs/config.php";

<<<<<<< HEAD
    $login = valider("login", "COOKIE");
    echo 'Login est '. $login;
=======
  echo 'Login est '. $_SESSION['login'];
>>>>>>> origin/master
?>

Creer topic