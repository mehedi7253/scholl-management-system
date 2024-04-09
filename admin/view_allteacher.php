<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 7/18/2019
 * Time: 2:01 AM
 */


    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: admin_login.php');
    }

    require_once '../php/db_connect.php';

    $sql = "SELECT * FROM teachers";
    $result = mysqli_query($connect, $sql);
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

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">Admin Page</div>
        <div class="">
            <p class="text-center"><img class="img-fluid cardImage" src="../images/admin.jpg" alt="card image" style="height: 150px; width: 150px; border-radius: 50%;"></p>
            <p class="text-center text-dark">Admin</p>
            <hr/>
        </div>
        <div class="">
            <?php include 'nav.php'?>

        </div>
        <hr style="border: 2px solid black"/>
        <div class="list-group list-group-flush">
            <a href="admin_logout.php" class="ist-group-item list-group-item-action bg-ligh text-center">Logout</a>
        </div>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control"  id="myInput" placeholder="Search Names.." title="Type in a name">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto mt-5 mb-5">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4> <i class="fas fa-table"></i>View All Teacher</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject Name</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <?php $i =1;
                                    while ($row = $result->fetch_assoc()) {?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['contact']; ?></td>
                                            <td>
                                                <a href="remove_faculty_member.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to Remove <?php echo $row['name'];?> !!'); "><i class="fas fa-minus-circle" style="color: red"></i><span class="ml-2">Remove</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="admin_dasboard.php" class="nav-link text-info">Back</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
</div>

<div class="card-footer bg-dark">
    <p class="text-white text-capitalize text-center font-italic">Create By  <strong>@Md.Mehedi Hasan</strong></p>
</div>
<!-- /#wrapper -->
<!-- Bootstrap core JavaScript -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!--        search script-->
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</body>
</html>
