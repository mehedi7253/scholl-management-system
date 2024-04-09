<?php


    //connect with database
    require_once '../php/config.php';

   // check user login via session
    if(logged_in() === TRUE) {
        header('location: student_dasboard.php'); // redirect location
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rsource Management System</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/style/main.css" type="text/css" />
    <link rel="icon" href="../images/Logo-Only.png" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="text-center">Chose One Who you are!!!</h1>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-block"><a href="student_reg.php" class="nav-link text-white">New Student</a></button>
                        <button class="btn btn-success btn-block"><a href="student_login.php" class="nav-link text-white">Old Student</a></button>
                    </div>
                    <div class="card-footer">
                        <a href="../index2.php" class="float-lg-right nav-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    script file-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>