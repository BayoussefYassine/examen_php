<?php

    session_start();
     //check user
     if(!isset($_SESSION['username'])){
        header("Location: ../login.php");
        exit();
    }


    // Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: ../login.php");
    }


?>

<?php include('../templates/head.php'); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ENSA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST">
                <h5 class="mr-4">Welcome <?php echo $_SESSION['username']; ?></h5>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="logout">Logout</button>
            </form>
        </div>
        </nav>

        <div class="container">

            <h3 class="text-primary ml-4">Bienvenue au centre de Scolarité</h3>
            <br>
            <h5>Choisissez l'action que vous voulez faire</h5>
            <br/><hr>

            <form action = "addChanges.php" method="post">

                <input class="btn btn-primary ml-4" type="submit" name="Ajouter_filiere" value="ajouter  une filiere">
                <input class="btn btn-primary ml-4" type="submit" name="Ajouter_etudiant" value="ajouter  Un etudiant">
                <input class="btn btn-primary ml-4" type="submit" name="liste" value="liste des abcences">

            </form>

        </div>
<?php include('../templates/scripts.php') ?>
