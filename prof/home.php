<?php

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
                <h5 class="mr-4">Welcome <?php $_SESSION['username']; ?></h5>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
        </nav>


        <div class="container text-center mt-5">

            <h2 class="text-primary mb-5">Filière: xxxx</h2>

            <form action="" method="GET">

                <label class="mb-3">Selectionner l'Année:</label><br>
                <input class="btn btn-primary" type="submit" name="1ere" value="Première Année" >
                <input class="btn btn-primary" type="submit" name="2eme" value="Deuxième Année" >
                <input class="btn btn-primary" type="submit" name="3eme" value="Troisième Année" >
             
            </form>

            <form action="">
                <table class="table my-5">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Cne</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Présence</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <th scope="row">131524857</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td><input type="checkbox" value="false"></td>
                        </tr>
                    
                    </tbody>
                </table>
            </form>
        </div>




<?php include('../templates/scripts.php') ?>