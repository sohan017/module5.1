<?php

session_start();
$users = json_decode( file_get_contents( 'users.json' ), true );

if( isset( $_GET["user_email"] )){
    $email = $_GET["user_email"];
} else{
    $email = "";
}

if ( isset( $users[ $email ] )){
    $user = $users[ $email ];
} else{
    die("no user found");
}

//update

if ( isset( $_POST['update'] ) ) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $new_role   = $_POST['role'];

//Validation
    if ( empty( $username ) || empty( $email ) || empty( $new_role ) ) {
        $errorMsg = "Please fill  all the fields.";
    } else {
        if ( isset( $users[$email] ) ) {
            $users[$email] = [
                'username' => $username,
                'role'     => $new_role,
            ];
            
            // echo "<pre>";
            // var_dump(json_encode( $users, JSON_PRETTY_PRINT ));
            // die;

            file_put_contents( 'users.json', json_encode( $users, JSON_PRETTY_PRINT ) );
            header("Location: index.php");
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
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Update Role</h3>
                    </div>
                    <div class="card-body">
                    <?php
                            
                            
                        ?>
                        <form class="form" method="POST">
                            <input class="form-control" type="text" name="username" placeholder="Username"  value="<?php  echo $user['username'] ?>">

                            <input class="form-control" type="text" name="email" placeholder="Email" value="<?php  echo $email ?>" readonly>

                            <input class="form-control" type="text" name="role" placeholder="Role"
                            value="<?php  echo $user['role'] ?>">

                            <input class="btn btn-primary" type="submit" name="update" value="Update">
                        </form>
                        <?php  ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>