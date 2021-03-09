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

    $annonce = "";
    require_once('../connection.php');
    if(isset($_POST['Ajouter_agent_scolarite'])){
        $con = new ConnectionClass();

        $dic = ['username' => $_POST['username'], 'password'=> $_POST['password'], 'role' => 'scolarite'];
        $con->InsertRowIntoTable('users',$dic);

        $annonce = "Un agent de scolarité a été bien un enregistré";
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
        <br>
        <div class="container">
            <br>
            <h5 class ="text-success"><?php echo $annonce ?></h5>
            <br>
            <h3 class="text-primary ml-4">Gestion des agents de scolarité :</h3>
            <br><br>
            <form action = "scolarite.php" method="post">
            <div class="form-group">
                    <label for="cne">Username : </label>
                    <input type="text" class="form-control w-50" id="username" name="username" placeholder="username" required>   
                </div>
                
                <div class="form-group">
                    <label for="annee">Password : </label>
                    <input class="form-control w-50" type="password" placeholder="password" name="password" id="password" required >
                </div>
                
                <br>
                <input class="btn btn-primary" type="submit" name="Ajouter_agent_scolarite" value="ajouter un agent de scolarité">
            </form>
        </div>
<?php include('../templates/scripts.php') ?>