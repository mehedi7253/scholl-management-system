<?php

    require_once '../php/config.php';

    if(not_logged_in() === TRUE) {
        header('location: student_login.php');
    }

    $userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="icon" href="../images/Logo-Only.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <!--Start menu section-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4267B2">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="view_faculty_file.php" class="nav-link text-white text-capitalize">View Faculty File</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="student_dasboard.php" class="nav-link text-white font-weight-bolder text-uppercase"><span class="mr-3"><img src="../images/<?php echo $userdata['image'] ?>" style="height: 50px; width: 70px; border-radius: 50%"></span><span class="text-white mr-3"><?php echo $userdata['first_name']; ?></span></a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white font-weight-bold mt-2">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end menu section-->

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 float-left mt-5 mb-5">
                <div class="col-md-4 float-left col-sm-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Wellcome <span class="float-right text-success"><?php echo $userdata['first_name']; ?></span></h3>
                        </div>
                        <div class="card-body">
                            <a href="student_dasboard.php" class="nav-link card-symbol"><span class="card_view"><i class="fas fa-eye" style="color: green;"></i><span class="ml-3">View Profile</span></span></a>
                            <a href="edit_student_info.php" class="nav-link card-symbol"><i class="fas fa-user-edit" style="color: red"></i><span class="card_view"><span class="ml-3">Update Profile</span></span></a>
                            <a href="changepassword.php" class="nav-link card-symbol"><i class="fas fa-unlock-alt" style="color: rebeccapurple"></i><span class="card_view"><span class="ml-3">Change Password</span></span></a>
                            <a href="change_profile_pic.php" class="nav-link card-symbol"><i class="fas fa-user"></i><span class="card_view"><span class="ml-3">Change profile Picture</span></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 float-left col-sm-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Change Your Password</h1>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                                    <!--     start php code-->
                              <?php
                                if($_POST) {
                                    $currentpassword = $_POST['currentpassword']; //declare variable currentpassword
                                    $newpassword = $_POST['password']; // //declare variable newpassword
                                    $conformpassword = $_POST['conformpassword']; //declare variable confirmpassword

                                    //check error ..if current password is match then user can enter their new password
                                    //here check current password is match? other wise message will show
                                    if($currentpassword == "") {
                                        echo "<span class='text-danger'> * Current Password field is required</span> <br/>";
                                    }

                                    //here check new password other wise message will show
                                    if($newpassword == "") {
                                        echo "<span class='text-danger'> * New Password is required</span> <br/>";
                                    }

                                    //here check new password is match with confirm password? other wise message will show
                                    if($conformpassword == "") {
                                        echo "<span class='text-danger'> * Confirm Password field is required</span> <br/>";
                                    }

                                    //if current password new password and confirm password will match then show message password update other wise not.
                                    if($currentpassword && $newpassword && $conformpassword) {
                                        if(passwordMatch($_SESSION['id'], $currentpassword) === TRUE) {

                                            if($newpassword != $conformpassword) {
                                                echo "New password does not match conform password <br />";
                                            } else {
                                                if(changePassword($_SESSION['id'], $newpassword) === TRUE) {
                                                    echo "<span class='text-success'>Successfully updated</span> <br/>";
                                                } else {
                                                    echo "<span class='text-success'>Successfully updated</span> <br/>";
                                                }
                                            }

                                        } else {
                                            echo "<span class='text-danger'>Current Password is incorrect </span><br />";
                                        }
                                    }
                                }

                                ?>

                            <!-- end php code-->

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" autocomplete="off" placeholder="New Password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" name="conformpassword" autocomplete="off" placeholder="Confrom Password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-block" type="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="student_dasboard.php"><button type="button" class="btn btn-info float-right">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="footer-text col-md-12 col-sm-12">
                    <p class="text-white text-capitalize text-center font-italic p-4">Create By  <strong>@Md.Mehedi Hasan</strong></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>