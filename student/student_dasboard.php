<?php

    //connect with database
    require_once '../php/config.php';

   // check user login via session
    if(not_logged_in() === TRUE) {
        header('location: student_login.php'); // redirect location
    }

    $userdata = getUserDataByUserId($_SESSION['id']);  //get all information by user id

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Dashboard</title>
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

    <!--start deash board (view)-->
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
               <div class="float-left col-md-8 col-sm-12 mt-5">
                   <div class="card" style="background-color: #FFFFFF">
                     <div class="card-body">
                         <div class="float-left col-md-4">
                           <div class="card">
                               <p class="text-center"><img class="img-fluid" src="../images/<?php echo $userdata['image'] ?>" title="<?php echo $userdata['first_name']?>" alt="card image" style="height: 250px; width: 100%"></p>
                           </div>
                         </div>
                         <div class="float-left col-md-8">
                                     <div class="table-responsive">
                                         <table class="table">
                                             <tr>
                                                 <th>Student ID  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['id']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Frst Name </th>
                                                 <td class="font-weight-bold text-capitalize"><?php echo $userdata['first_name']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Last Name  </th>
                                                 <td class="font-weight-bold text-capitalize"><?php echo $userdata['last_name']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Email </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['username']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Date Of Birth  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['dob']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Gender  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['gender']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Address  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['address']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Phone Number  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['contact']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Father Name  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['fathername']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Mother Name  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['mothername']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Father Number  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['fatherphone']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Mother Number  </th>
                                                 <td class="font-weight-bold"><?php echo $userdata['motherphone']; ?></td>
                                             </tr>

                                         </table>
                                     </div>
                                 </div>
                            </div>

                       <div class="card-footer">
                           <a href="edit_student_info.php" class="nav-link"><span class="text-center"><span class="text-info">Edit Your Profile</span></a>
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

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>


</body>
</html>