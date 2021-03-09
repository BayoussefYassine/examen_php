<?php
    session_start();
    require_once('../connection.php');
    $con = new ConnectionClass();
    $res = $con->SelectWhereOperationFromTable('etudiant', 'absence', 3,">=");

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
        <div class ="container text-center">
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
                            <td><?php echo $var['absence']; ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                </div>
                <br><br>
                <div class ="text-center mr-5 my-5">
                <form action="liste_pdf.php">
                <input class="btn btn-primary" type="submit" name="telecharger" value="telecharger pdf">
                </form>
                </div>
                <?php include('../templates/scripts.php') ?>