<?php
    $annonce = "";
    require_once('../connection.php');
    if(isset($_POST['Ajouter_etudiant'])){
        $con = new ConnectionClass();
        
        $dic = ['nom'=> $_POST['nom'], 'prenom' => $_POST['prenom'],'filiere' => $_POST['filiere'], 'annee' => $_POST['annee'], 'cne' => $_POST['cne']];
        $con->InsertRowIntoTable('etudiant',$dic);
        $annonce = "Un Etudiant a été bien enregistré";
    }

    session_start();
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
        <br>
        <div class="container">
            <br>
            <h5 class ="text-success"><?php echo $annonce ?></h5>
            <br>
            <h3 class="text-primary ml-4">Gestion des Etudiants :</h3>
            <br><br>
            <form action = "ajouter_etudiant.php" method="post">
            <div class="form-group">
                    <label for="cne">cne : </label>
                    <input type="text" class="form-control w-50" id="cne" name="cne" placeholder="cne" required>   
                </div>
                <div class="form-group">
                    <label for="nom">nom : </label>
                    <input type="text" class="form-control w-50" id="nom" name="nom" placeholder="nom" required>   
                </div>
                <div class="form-group">
                    <label for="prenom">prenom : </label>
                    <input type="text" class="form-control w-50" id="prenom" name="prenom" placeholder="prenom" required>   
                </div>
                <div class="form-group">
                    <label for="filiere">filiere : </label>
                    <select  class="form-control w-50" id="filiere" name="filiere" required>
                    <?php
                        $con = new ConnectionClass();
                        $res = $con->SelectAllFromTable('filiere');
                        foreach($res as $var){
                            echo "<option value ='".$var['nom_filiere']."'>" .$var['nom_filiere'] ."</option>";
                        } 
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="annee">filiere : </label>
                    <select  class="form-control w-50" id="annee" name="annee" required>
                    <option value ="1">1ère Année</option>
                    <option value ="2">2ème Année</option>
                    <option value ="3">3ème Année</option>
                    </select>
                </div>
                
                <br>
                <input class="btn btn-primary" type="submit" name="Ajouter_etudiant" value="ajouter un etudiant">
            </form>
        </div>
        <?php include('../templates/scripts.php') ?>