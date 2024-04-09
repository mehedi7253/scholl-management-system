<?php

    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';


    if (isset($_GET['profile'])) {
        $id = $_GET['profile'];

        $sql = "SELECT * FROM students WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin pannel</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/style/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../assets/style/sidebar.css" rel="stylesheet">
    <link href="../assets/style/main.css" rel="stylesheet">

    <link rel="icon" href="../images/Logo-Only.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-info font-weight-bold mb-3"><?php echo $row['first_name']?> <span><?php echo $row['last_name']?></span> Profile <span>                        <a href="admin_dasboard.php" class="nav-link float-right"><button class="btn btn-info">Home</button></a>
</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-4 col-sm-12 float-left">
                            <img class="img-fluid" src="../images/<?php echo $row['image'];?>" style="height: 300px;">
                            <br/>
                            <br/>
                            <?php
                            $status = $row['status'];
                            // echo $status;

                            if (($status) == '0'){?>
                                <a href="block_unblock.php?status=<?php echo $row['id'];?>" onclick="return confirm('Block <?php echo $row['first_name'];?>')" ><button class="btn btn-danger col-7">Block</button></a>
                                <?php
                            }
                            if (($status) == '1'){?>
                                <a href="block_unblock.php?status=<?php echo $row['id'];?>"  onclick="return confirm('UnBlock <?php echo $row['first_name'];?>')"><button class="btn btn-success col-7 ">Unblock</button></a>
                                <?php
                            }
                            ?>
                        </div>


                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="table-responsive">
                                <table class="table tab-pane">
                                    <tr>
                                        <th>Student ID: </th>
                                        <td><?php echo $row['id'];?></td>
                                    </tr>
                                    <tr>
                                        <th>First Name: </th>
                                        <td><?php echo $row['first_name'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Last Name: </th>
                                        <td><?php echo $row['last_name'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <td><?php echo $row['username'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number: </th>
                                        <td><?php echo $row['contact'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Address: </th>
                                        <td><?php echo $row['address'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Date Of Buirth: </th>
                                        <td><?php echo $row['dob']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender: </th>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                </table>

                                <h1 class="text-center mt-5 mb-3">Gurdian Information</h1>
                                <div class="table-responsive">
                                    <table class="table tab-pane">
                                        <tr>
                                            <th>Father Name: </th>
                                            <td><?php echo $row['fathername']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Father Phone Number: </th>
                                            <td><?php echo $row['fatherphone']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mother Name: </th>
                                            <td><?php echo $row['mothername']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Father Phone Number: </th>
                                            <td><?php echo $row['motherphone']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="admin_dasboard.php" class="nav-link"><button class="btn btn-info">Home</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
</html>








