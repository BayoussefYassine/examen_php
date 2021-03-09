<?php
    session_start();
    $bien = "";
    require_once("../connection.php");
    $con = new ConnectionClass();
    if(isset($_POST['nom_filiere'])){
        $dic = ['nom_filiere' => $_POST['nom_filiere']];
        $con->InsertRowIntoTable('filiere',$dic);
        $bien ="la filiere a été bien inserée";
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <h5 class="mr-4">Welcome Scolarité</h5>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
        </nav>
        <div class="container">
            <br>
            <h5 class ='text-success'><?php echo $bien; ?></h5>
            <br>
            <h3 class="text-primary ml-4">Gestion des Filieres :</h3>
            <br><br>
            <form action = "ajouter_filiere.php" method="post">
            <div class="form-group">
                    <label for="fil">nom de la filiere : </label>
                    <input type="text" class="form-control" id="fil" name="nom_filiere" placeholder="nom de la filiere" required>   
                </div>
                <br>
                <input class="btn btn-primary" type="submit" name="Ajouter_filiere" value="ajouter  une filiere">
            </form>
        </div>
        <br><hr>
        <div class="container">
        <h3 class="text-info ml-4">Liste des filieres existantes :</h3><br>
        <ul>
        <?php
            $res = $con->SelectAllFromTable('filiere');
            foreach($res as $var){
                echo "<li class ='text-success'><strong>" .$var['nom_filiere'] ."</strong></li><br>";
            }
        ?>
        </ul>
        </div>
<?php include('../templates/scripts.php') ?>