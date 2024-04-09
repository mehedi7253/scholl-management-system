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
                    <form name="frmAdd" method="post" action="" id="frmAdd"
                          onSubmit="return validate();">
                        <div class="mb-5">
                            <label>Slect Date</label>
                            <input type="date" name="attendance_date" id="attendance_date" class="demoInputBox form-control"> <span id="attendance_date-info" class="info"></span>
                        </div>
                        <div id="toys-grid">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><strong>Student Name</strong></th>
                                        <th>Student ID</th>
                                        <th><strong>Present</strong></th>
                                        <th><strong>Absent</strong></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (! empty($studentResult)) {
                                        foreach ($studentResult as $k => $v) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="student_id[]" id="student_id" value = "<?php echo $studentResult[$k]["id"]; ?>">
                                                    <?php echo $studentResult[$k]["first_name"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $studentResult[$k]["id"]; ?>
                                                </td>
                                                <td><input type="radio" name="attendance-<?php echo $studentResult[$k]["id"]; ?>" value="present" checked /></td>
                                                <td><input type="radio" name="attendance-<?php echo $studentResult[$k]["id"]; ?>" value="absent" /></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tbody>

                                </table>
                            </div>

                        </div>
                        <div>
                            <input type="submit" name="add" class="btn btn-info col-4" id="btnSubmit" value="Add" />
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
<script>
    function validate() {
        var valid = true;
        $(".demoInputBox").css('background-color','');
        $(".info").html('');

        if(!$("#attendance_date").val()) {
            $("#attendance_date-info").html("(Please Selecr Date)");
            $("#attendance_date").css('background-color','#FFFFDF');
            valid = false;
        }
        return valid;
    }
</script>

</body>
</html>