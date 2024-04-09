<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 7/20/2019
 * Time: 4:20 AM
 */


    session_start();

    //check login
    if (!isset($_SESSION['email'])){
        header('Location: teachers_login.php'); //redirect with page
    }

    require_once '../php/db_connect.php'; //connect with database
    global $connect;


    // fetch files
    $sql = "SELECT * FROM tbl_files";
    $result = mysqli_query($connect, $sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Faculty File</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css">
    <link rel="icon" href="../images/Logo-Only.png" />
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
                         <div class="col-sm-12 col-md-3 float-left">
                             <div class="card">
                                 <div class="card-header">
                                     <p class="text-center">Chose One</p>
                                 </div>
                                 <div class="card-body">
                                     <label class="text-center"><a class="nav-link" href="file_upload.php"><i class="fas fa-upload"></i><span class="ml-3">File Upload</span></a></label><br/>
                                     <label class="text-center"><a class="nav-link" href="view.php"><i class="fas fa-eye" style="color: green"></i><span class="ml-3">View Upload File</span></a></label>
                                     <label class="text-center"><a class="nav-link" href="attendance.php"><i class="fas fa-eye" style="color: green"></i><span class="ml-3">Attendance</span></a></label>

                                 </div>
                                 <div class="card-footer">
                                     <a class="btn btn-info float-right" href="file_upload.php">Back</a>
                                 </div>
                             </div>
                         </div>
                        <div class="col-md-9 col-sm-12 float-left">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">All Faculty Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Teacher Name</th>
                                                <th>Title</th>
                                                <th>Subject</th>
                                                <th>View</th>
                                                <th>Download</th>
                                                <th>Remove File</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['filename']; ?></td>
                                                    <td><?php echo $row['fcname']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['subject']; ?></td>
                                                    <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View<i class="fas fa-eye" style="color: red"></i></a></td>
                                                    <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download <i class="fas fa-download" style="color: green"></i></a></td>
                                                    <td><a href="remove.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this !!'); ">Remove<i class="fas fa-trash-alt" style="color: red"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>