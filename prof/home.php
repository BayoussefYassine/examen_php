<?php

    session_start();
    require('../connection.php');
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
    
    $con = new ConnectionClass();

    $prof = $con->SelectWhereFromTable('prof', 'username', $_SESSION['username']);
    
    $name = $prof[0]['nom'];
    $filiere = $prof[0]['filiere'];
    // print_r($res);

    if(isset($_POST['1'])){
        $res = $con->SelectWhereFromTable('etudiant', 'annee', 1);
       
    }
    else if(isset($_POST['2'])){
        $res = $con->SelectWhereFromTable('etudiant', 'annee', 2);
        // print_r($res);
    }
    else if(isset($_POST['3'])){
        $res = $con->SelectWhereFromTable('etudiant', 'annee', 3);
        // print_r($res);
    }

    if(isset($_POST['absence'])){

        // print_r($_POST['ab']);

        if(isset($_POST['a'])){
            foreach($_POST['a'] as $id){
                $pdo = $con;
                
                $add = $con->SelectWhereFromTable('etudiant', 'id', $id);

                $add = $add[0]['absence'];

                $dict = ["absence" => $add + 1];
    
                if($pdo->UpdateRowInTable("etudiant", $dict, "id", $id)){
                    // echo "done";
                }else {
                    // echo "not done";
                }
    
            }
        }
        
        
        
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
                <h5 class="mr-4">Welcome <?php echo $name; ?></h5>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="logout">Logout</button>
            </form>
        </div>
        </nav>


        <div class="container text-center mt-5">

            <h2 class="text-primary mb-5">Filière: <?php  echo $filiere; ?></h2>

            <form action="" method="POST">

                <label class="mb-3">Selectionner l'Année:</label><br>
                <input class="btn btn-primary" type="submit" name="1" value="Première Année" >
                <input class="btn btn-primary" type="submit" name="2" value="Deuxième Année" >
                <input class="btn btn-primary" type="submit" name="3" value="Troisième Année" >
             
            </form>

            <?php if(isset($_POST['1']) || isset($_POST['2']) || isset($_POST['3'])): ?>
            <form action="" method="POST">
                <h4 class="mt-4">La liste des étudiants:</h4>
                <table class="table my-5">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Cne</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Absence</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($res as $var): ?>
                        <tr>
                            <th scope="row"><?php echo $var['cne']; ?></th>
                            <td><?php echo $var['nom']; ?></td>
                            <td><?php echo $var['prenom']; ?></td>
                            <td><input type="checkbox" name="a[]" value="<?php echo $var['id']; ?>"></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <input class="btn btn-primary" type="submit" name="absence" value="validé" >
            </form>
            <?php endif ?>
        </div>




<?php include('../templates/scripts.php') ?>