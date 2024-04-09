<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    <link rel="stylesheet" href="web/css/bootstrap.css">
    <link rel="icon" href="../../images/Logo-Only.png">
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
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">All Student Information</h3>
                </div>
                <div class="card-body">
                    <div class="float-right mb-5">
                        <a href="../file_upload.php"><button class="btn btn-info">Home</button> </a>
                        <a href="index.php?action=attendance"><button class="btn btn-success">Take Attendance</button> </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table tab-pane table-hover">
                            <thead>
                            <tr>
                                <th><strong>First Name</strong></th>
                                <th><strong>Last Name</strong></th>
                                <th><strong>Roll Number</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Phone</strong></th>
                                <th><strong>Date of Birth</strong></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (! empty($result)) {
                                foreach ($result as $k => $v) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result[$k]["first_name"]; ?></td>
                                        <td><?php echo $result[$k]["last_name"]; ?></td>
                                        <td><?php echo $result[$k]["id"]; ?></td>
                                        <td><?php echo $result[$k]["username"]; ?></td>
                                        <td><?php echo $result[$k]["contact"]; ?></td>
                                        <td><?php echo $result[$k]["dob"]; ?></td>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>



                            <tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





</body>
</html>