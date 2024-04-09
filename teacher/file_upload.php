<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 7/20/2019
 * Time: 4:14 AM
 */


    session_start();
    //check login
    if (!isset($_SESSION['email'])){
        header('Location: teachers_login.php'); //redirect page
    }

    require_once '../php/db_connect.php'; //connect with database
    global $connect;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faculty File Upload</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css"/>
    <link rel="icon" href="../images/Logo-Only.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <!--Start menu section-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="teachers_logout.php" class="nav-link text-white font-weight-bolder text-uppercase">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <!--end menu section-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 mt-5 mb-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-4 float-left">
                            <div class="card">
                                <div class="card-header">
                                    <p class="text-center">Chose One</p>
                                </div>
                                <div class="card-body">
                                    <label class="text-center"><a class="nav-link" href="file_upload.php"><i class="fas fa-upload"></i><span class="ml-3">File Upload</span></a></label><br/>
                                    <label class="text-center"><a class="nav-link" href="view.php"><i class="fas fa-eye" style="color: green"></i><span class="ml-3">View Upload File</span></a></label>
                                    <label class="text-center"><a class="nav-link" href="attendance/index.php"><i class="fas fa-eye" style="color: green"></i><span class="ml-3">Attendance</span></a></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="text-center">File Upload</h1>
                                    <br/>
                                    <?php if(isset($_GET['st'])) { ?>
                                        <div class="text-center">
                                            <?php if ($_GET['st'] == 'success') {
                                                echo "<span class='text-success'>File Uploaded Successfully!</span>";
                                            } else {
                                                echo '<span class="text-danger">Invalid File Extension!</span>';
                                            } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <form action="uploads.php" method="post" enctype="multipart/form-data">
                                      
                                        <div class="form-group">
                                            <label>Teacher Name</label>
                                            <input type="text" name="fcname"  class="form-control" value="<?php echo $_SESSION['name'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <textarea name="title" class="form-control"></textarea>
                                        </div>
                                       <div class="form-group">
                                           <?php
                                               $get_course = "SELECT * FROM course";
                                               $result = mysqli_query($connect, $get_course);
                                           ?>
											<label>Select Course Name<sup> <span class="text-danger font-weight-bold">*</span> </sup></label>
											<select class="form-control" id="exampleFormControlSelect1" name="subject">
												<option>--------Select One------</option>
												<?php while ($row = mysqli_fetch_assoc($result)){?>
													<option value="<?php echo $row['course_name'];?>"><?php echo $row['course_name'];?></option>
												<?php }?>
											</select>
										</div>
                                        <div class="form-group">
                                            <legend>Select File to Upload</legend>
                                            <input type="file" name="file1" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn ml-5 col-9 btn-info">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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