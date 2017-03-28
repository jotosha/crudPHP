<?php session_start(); ?>


<?php

    $_SESSION['id'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['email'] = null;
    $_SESSION['activation_key'] = null;


    header("Location: ../index.php");
?>