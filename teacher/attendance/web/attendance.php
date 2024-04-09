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
        <div class="col-md-12 col-sm-12 mt-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">Take New Attendance</h3>
                    <div class="float-right mb-5">
                        <a href="../file_upload.php"><button class="btn btn-info">Home</button> </a>
                        <a href="index.php?action=attendance"><button class="btn btn-success">Take Attendance</button> </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="float-right mb-5">
                        <div style="text-align: right; margin: 20px 0px 10px;">
                            <a id="btnAddAction" class="nav-link" href="index.php?action=attendance-add"><img src="web/image/icon-add.png"/>Add Attendance</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table tab-pane table-hover">
                            <thead>
                            <tr>
                                <th><strong>Date</strong></th>
                                <th><strong>Present</strong></th>
                                <th><strong>Absent</strong></th>
                                <th><strong>Action</strong></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (! empty($result)) {
                                foreach ($result as $k => $v) {
                                    ?>
                                    <tr>
                                        <td><?php
                                            $attendance_date = "";
                                            if(!empty($result[$k]["attendance_date"])) {
                                                $attendance_timestamp = strtotime($result[$k]["attendance_date"]);
                                                $attendance_date = date("m-d-Y", $attendance_timestamp);
                                            }
                                            echo $attendance_date; ?></td>
                                        <td><?php echo $result[$k]["present"]; ?></td>
                                        <td><?php echo $result[$k]["absent"]; ?></td>
                                        <td>
                                            <a class="btnDeleteAction"
                                               href="index.php?action=attendance-delete&date=<?php echo $result[$k]["attendance_date"]; ?>">
                                                <img src="web/image/icon-delete.png" />
                                            </a>
                                        </td>
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