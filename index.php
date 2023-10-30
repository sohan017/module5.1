<?php
session_start();

$users = json_decode( file_get_contents( 'users.json' ), true );


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
                        <h3>User List</h3>
                        <a href="registration.php" class="btn btn-info text-white">
                           Logout
                        </a>
                    </div>
                    <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                            $i = 0;
                            foreach ($users as $key => $value) {
                            $i++;
                            
                        ?>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $value['username'];?></td>
                            <td><?php echo $key;?></td>
                            <td><?php echo $value['role'];?></td>
                            
                            <td>
                            <a type="button" class="btn btn-primary" href="update.php?user_email=<?php echo $key; ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="update.php?user_delete=<?php echo $key; ?>">Delete</a>
                                <!-- <button type="button" class="btn btn-primary">View</button>
                                <button type="button" class="btn btn-secondary">Edit</button>
                                <button type="button" class="btn btn-danger">Danger</button> -->
                            </td>
                            </tr>
                            
                        </tbody>
                        <?php
                                
                            }
                        ?>
                    </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>