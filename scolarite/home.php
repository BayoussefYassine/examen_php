<<<<<<< HEAD
<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }


?>

<h1>Scolarité page</h1>
=======
<?php include('../templates/head.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ENSA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <h5 class="mr-4">Welcome Scolarité</h5>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
        </nav>
<?php include('../templates/scripts.php') ?>
>>>>>>> bbd2a584ddee0e3d9651efa38e3cbe8cce0b670f
