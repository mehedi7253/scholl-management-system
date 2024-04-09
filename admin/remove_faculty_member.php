<?php
/**
 * Created by PhpStorm.
 * User: Mehedi Hasan
 * Date: 10/28/2019
 * Time: 11:40 PM
 */


    require_once '../php/db_connect.php';
    global $connect;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM teachers WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        header('Location:view_allteacher.php');
}
?>

