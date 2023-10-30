<?php
session_start();


// login Form Handling
$users = json_decode( file_get_contents( 'users.json' ), true );
//var_dump($users["habib@gmail.comt"]);
// var_dump($users["habib@gmail.com"]["username"]);
//exit();

if ( isset( $_POST['login'] ) ) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

//Validation
    if ( empty( $email ) || empty( $password ) ) {
        $errorMsg = "Please fill  all the fields.";
    } elseif($users[$email] == NULL) {
        $errorMsg = "No user found.";

    } else{
        if(($users[$email] !== NULL) && ($users[$email]["password"] === $password)){
            header("Location:index.php");
        }
    }

}


?>


<!DOCTYPE html>
<html>

<head>
    <title>User Registration and Login</title>
    <?php
include 'bootstrap.php';
?>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center mb-4">Use Role Management App</h3>
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h3>User Login</h3>
                        <a href="registration.php" class="btn btn-info text-white">
                            Create an account?
                        </a>
                    </div>
                    <div class="card-body">
                        <?php

                            if ( isset( $errorMsg ) ) {
                                echo "<p>$errorMsg</p>";
                            }

                            ?>
                        <form class="form" method="POST">
                            
                            <input class="form-control" type="email" name="email" placeholder="Email"><br>
                            <input class="form-control" type="password" name="password" placeholder="Password"><br>
                            <input class="btn btn-primary" type="submit" name="login" value="Login">
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>