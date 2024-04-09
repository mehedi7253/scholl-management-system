<?php

    //connect with database
    require_once '../php/config.php';

    // check user login via session
    if(not_logged_in() === TRUE) {
        header('location: student_login.php');
    }

    $userdata = getUserDataByUserId($_SESSION['id']); //get all information by user id

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student Information</title>
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
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="col-md-4 col-sm-12 float-left mt-5">
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
                <div class="col-md-7 col-sm-12 float-left mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Update Your Information</h1>

                            <?php


                            if($_POST) {
                                $fname       = $_POST['fname']; // declare variable fname and put it into post method.
                                $lname       = $_POST['lname']; // declare variable lname and put it into post method.
//                                $username    = $_POST['username'];
                                $contact     = $_POST['contact']; // declare variable contact and put it into post method.
                                $address     = $_POST['address']; // declare variable address and put it into post method.
                                $dob         = $_POST['dob']; // declare variable dob and put it into post method.
                                $gender      = $_POST['gender']; // declare variable gender and put it into post method.
                                $fathername  = $_POST['fathername']; // declare variable fathername and put it into post method.
                                $mothername  = $_POST['mothername']; // declare variable mothername and put it into post method.
                                $fatherphone = $_POST['fatherphone']; // declare variable fatherphone and put it into post method.
                                $motherphone = $_POST['motherphone']; // declare variable motherphone and put it into post method.


                                //check error
                                //check filename is required
                                if($fname == "") {
                                    echo "<span class='text-danger'> * First Name is Required</span> <br />";
                                }

                                //check lastname is required
                                if($lname == "") {
                                    echo "<span class='text-danger'> * Last Name is Required</span> <br />";
                                }

//                                if($username == "") {
//                                    echo "<span class='text-danger'> * Email is Required</span> <br />";
//                                }

                                //check contact is required
                                if($contact == "") {
                                    echo "<span class='text-danger'> * Contact is Required</span> <br />";
                                }

                                //check address is required
                                if($address == "") {
                                    echo "<span class='text-danger'> * Address is Required</span> <br />";
                                }

                                //check dob is required
                                if($dob == "") {
                                    echo "<span class='text-danger'> * Date of birth  is Required</span> <br />";
                                }

                                //check gender is required
                                if($gender == "") {
                                    echo "<span class='text-danger'> * Gender is Required</span> <br />";
                                }
                                //check fathername is required
                                if($fathername == "") {
                                    echo "<span class='text-danger'> * Father Name is Required</span> <br />";
                                }

                                //check mothername is required
                                if($mothername == "") {
                                    echo "<span class='text-danger'> * Mother Name is Required</span> <br />";
                                }
                                //check fatherphone is required
                                if($fatherphone == "") {
                                    echo "<span class='text-danger'> * Father Phone Number is Required</span> <br />";
                                }

                                //check mother phone is required
                                if($motherphone == "") {
                                    echo "<span class='text-danger'> * Mother Phone Number is Required</span> <br />";
                                }

                                //here  check all user  information. if user coorectly input their information message will be shown  Successfully Updated other wise not.
                                if($fname && $lname  && $contact && $address && $dob && $gender && $fathername && $mothername && $fatherphone && $motherphone) {
                                    $user_exists = users_exists_by_id($_SESSION['id'], $username);
                                    if($user_exists === TRUE) {
                                        echo "username already exists <br /> ";
                                    } else {
                                        if(updateInfo($_SESSION['id']) === TRUE) {
                                            echo "<h3 class='text-success mt-5'>Successfully Updated</h3> <br />";
                                        } else {
                                            echo "<span class='text-danger'>Error while updating the information</span>";
                                        }
                                    }
                                }

                            }
                            ?>


                        </div>
                        <div class="card-body">

                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" name="username" id="username" title="You Can not update Your @Email address" placeholder="Email" disabled formtarget="uu" value=" <?php echo $userdata['username'] ?>">
                                </div>


                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Fisrt Name" value="<?php if($_POST) {
                                        echo $_POST['fname'];
                                    } else {
                                        echo $userdata['first_name'];
                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php if($_POST) {
                                        echo $_POST['lname'];
                                    } else {
                                        echo $userdata['last_name'];
                                    } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php if($_POST) {
                                        echo $_POST['contact'];
                                    } else {
                                        echo $userdata['contact'];
                                    }  ?>">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php if($_POST) {
                                        echo $_POST['address'];
                                    } else {
                                        echo $userdata['address'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="<?php if($_POST) {
                                        echo $_POST['dob'];
                                    } else {
                                        echo $userdata['dob'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Gender : </label> <br/>
                                    <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                                </div>
                                <div class="form-group">
                                    <label for="address">Father Name</label>
                                    <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Father Name" value="<?php if($_POST) {
                                        echo $_POST['fathername'];
                                    } else {
                                        echo $userdata['fathername'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Mother Name</label>
                                    <input type="text" class="form-control" name="mothername" id="MotherName" placeholder="Mother Name" value="<?php if($_POST) {
                                        echo $_POST['mothername'];
                                    } else {
                                        echo $userdata['mothername'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Father Phone Number</label>
                                    <input type="number" class="form-control" name="fatherphone" id="fatherphone" placeholder="Father Phone" value="<?php if($_POST) {
                                        echo $_POST['fatherphone'];
                                    } else {
                                        echo $userdata['fatherphone'];
                                    } ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Mother Phone Number</label>
                                    <input type="number" class="form-control" name="motherphone" id="motherphone" placeholder="Mother Phone" value="<?php if($_POST) {
                                        echo $_POST['motherphone'];
                                    } else {
                                        echo $userdata['motherphone'];
                                    } ?>">
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>

                            </form>
                        </div>


                        <div class="card-footer">
                            <a href="student_dasboard.php" class="float-right"><button type="button" class="btn btn-info">Back</button></a>
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



    <script src="assets/js/bootstrap.js"></script>
</body>
</html>