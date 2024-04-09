<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 10/19/2019
 * Time: 1:08 AM
 */

        require_once '../php/db_connect.php';

    if (isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM check_message WHERE id = $id";
        $res = mysqli_query($connect, $sql);

        header('Location: check_message.php');
    }

?>