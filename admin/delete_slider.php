<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 10/22/2019
 * Time: 3:22 PM
 */

    require_once "../php/db_connect.php";

    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "DELETE FROM sliders WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        header('Location:manage_slider.php');
    }
?>