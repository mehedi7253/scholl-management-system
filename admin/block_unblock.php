<?php
/**
 * Created by PhpStorm.
 * User: SOURAV
 * Date: 8/6/2019
 * Time: 11:34 PM
 */

    require_once '../php/db_connect.php';

    //block unblock user
    if (isset($_GET['status'])){
        $status1 = $_GET['status']; // decleare variable

        $sql = "SELECT * FROM students WHERE id='$status1'"; // select all students

        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_object($result)){
            $status_var = $row->status;

            if ($status_var == '0'){
                $status_state = 1;
            }else{
                $status_state = 0;
            }
            $update = "UPDATE students SET status = '$status_state' WHERE id = '$status1'";

            $res = mysqli_query($connect, $update);

            if ($res){
                header('Location: admin_dasboard.php');
            }else{
                echo  mysqli_error($res);
            }
        }
    }

?>