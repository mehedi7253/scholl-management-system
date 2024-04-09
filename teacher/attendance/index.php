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
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card-body">
                    <?php
                    require_once ("class/DBController.php");
                    require_once ("class/Student.php");
                    require_once ("class/Attendance.php");

                    $db_handle = new DBController();

                    // $action = "";
                    if (! empty($_GET["action"])) {
                        $action = $_GET["action"];
                    }
                    switch ($action) {
                        case "attendance-add":
                            if (isset($_POST['add'])) {
                                $attendance = new Attendance();

                                $attendance_timestamp = strtotime($_POST["attendance_date"]);
                                $attendance_date = date("Y-m-d", $attendance_timestamp);

                                if(!empty($_POST["student_id"])) {
                                    $attendance->deleteAttendanceByDate($attendance_date);
                                    foreach($_POST["student_id"] as $k=> $student_id) {
                                        $present = 0;
                                        $absent = 0;

                                        if($_POST["attendance-$student_id"] == "present") {
                                            $present = 1;
                                        }
                                        else if($_POST["attendance-$student_id"] == "absent") {
                                            $absent = 1;
                                        }

                                        $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                                    }
                                }
                                header("Location: index.php?action=attendance");
                            }
                            $student = new Student();
                            $studentResult = $student->getAllStudent();
                            require_once "web/attendance-add.php";
                            break;

                        case "attendance-edit":
                            $attendance_date = $_GET["date"];
                            $attendance = new Attendance();
                            if (isset($_POST['add'])) {
                                $attendance->deleteAttendanceByDate($attendance_date);
                                if(!empty($_POST["student_id"])) {
                                    foreach($_POST["student_id"] as $k=> $student_id) {
                                        $present = 0;
                                        $absent = 0;

                                        if($_POST["attendance-$student_id"] == "present") {
                                            $present = 1;
                                        }
                                        else if($_POST["attendance-$student_id"] == "absent") {
                                            $absent = 1;
                                        }

                                        $attendance->addAttendance($attendance_date, $student_id, $present, $absent);
                                    }
                                }
                                header("Location: index.php?action=attendance");
                            }

                            $result = $attendance->getAttendanceByDate($attendance_date);

                            $student = new Student();
                            $studentResult = $student->getAllStudent();
                            require_once "web/attendance-edit.php";
                            break;

                        case "attendance-delete":
                            $attendance_date = $_GET["date"];
                            $attendance = new Attendance();
                            $attendance->deleteAttendanceByDate($attendance_date);

                            $result = $attendance->getAttendance();
                            require_once "web/attendance.php";
                            break;

                        case "attendance":
                            $attendance = new Attendance();
                            $result = $attendance->getAttendance();
                            require_once "web/attendance.php";
                            break;


                        default:
                            $student = new Student();
                            $result = $student->getAllStudent();
                            require_once "web/student.php";
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>