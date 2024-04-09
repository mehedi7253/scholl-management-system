<?php
/**
 * Created by PhpStorm.
 * User: Mehedi Hasan
 * Date: 10/29/2019
 * Time: 12:12 AM
 */
    require_once '../php/db_connect.php';
    global $connect;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM notice WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        header('Location:manage_notice.php');
    }

?>