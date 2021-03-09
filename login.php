<?php

    require('connection.php');
    if(isset($_POST['username']) && $_POST['password']){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $error = '';

        $con = new ConnectionClass();

        $res = $con->SelectAllFromTable('users');
        foreach ($res as $var) {
        if($username == $var['username'] and $password == $var['password']){

            if($var['role'] === 'admin'){
         
                header('Location:admin/home.php');
            }
            else if($var['role'] === 'prof'){
                header('Location:prof/home.php');
            }else{
                header('Location:scolarite/home.php');
            }


            }else{
                $error = 'Username ou mot de passe incorrect';
            }
        }

    }

?>




<?php include('templates/head.php'); ?>

    <div class="logo text-center my-5">
        <h1>Gestion des absence</h1>
    </div>


   <p class="text-center text-danger"><?php echo $error ?? '' ?></p>
    
    <div class="c-login container bg-white p-3 shadow p-3 mb-5 bg-white rounded-lg">

        <div class="row justify-content-center my-5">

        <div class="col-md-5 mr-md-5 text-center pic">
            <img src="img/login.jpg" alt="login image">
        </div>

        <div class="col-md-5 order-first order-md-last mb-5">
            <h2 class="mb-3 font-weight-bold">Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  
                </div>
                <div  class="text-right">
                    <button type="submit" class="btn btn-primary mt-3" name="login">Login</button>
                </div>
                
            </form>
        </div>
        </div>


    </div>


<?php include('templates/scripts.php'); ?>
