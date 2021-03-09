<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }


?>

<h1>Scolarité page</h1>