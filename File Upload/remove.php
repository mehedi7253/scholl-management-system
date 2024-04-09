<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 7/23/2019
 * Time: 2:34 AM
 */


    require_once '../php/db_connect.php'; //connect with database
    global $connect;

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM tbl_files WHERE id = $id"; // query

        $result = mysqli_query($connect, $sql); // execute query

        header('Location:view.php'); //redirect page
    }
?>

