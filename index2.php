<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 10/22/2019
 * Time: 3:46 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Management System</title>
    <link rel="stylesheet" href="assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="assets/style/main.css" type="text/css" />
    <link rel="icon" href="images/Logo-Only.png">
</head>
<body style="background-color: #234250">
<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto mt-5">
            <div class="card mt-5">
                <div class="admission">
                    <marquee><strong>Well Come to Scholl Management System</strong></marquee>
                </div>
                <div class="card-body">
                    <p class="text-muted">Please Chose one, for identify who are you!!!</p>
                    <a class="nav-link" href="student/student.php"><button class="btn btn-block btn-success"><strong>Student</strong></button></a>
                    <a class="nav-link" href="admin/admin_login.php"><button class="btn btn-block btn-success"><strong>Admin</strong></button></a>
                    <a class="nav-link" href="teacher/teachers_login.php"><button class="btn btn-block btn-success"><strong>Teachers</strong></button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--    script file-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
