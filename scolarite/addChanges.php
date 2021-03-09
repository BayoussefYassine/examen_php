<?php
    session_start();
    echo "hello";
    if(isset($_POST["Ajouter_filiere"])){
        header("Location:ajouter_filiere.php");
        //echo "filiere";
    }

        else if(isset($_POST["Ajouter_etudiant"])){
            header("Location:ajouter_etudiant.php");
        }
        else if(isset($_POST["liste"])){
            header("Location:liste_absences.php");
        }
?>