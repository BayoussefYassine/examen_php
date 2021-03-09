<?php
    session_start();
    echo "hello";
    if(isset($_POST["prof"])){
        header("Location:professeur.php");
        //echo "filiere";
    }
    else if(isset($_POST["scolarite"])){
        header("Location:scolarite.php");
    }

?>