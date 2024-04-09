<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 6/21/2019
 * Time: 12:05 PM
 */

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "sms";

    // crearte connection
    $connect = new Mysqli($servername, $username, $password, $dbname);

    // check connection
    if($connect->connect_error) {
        die("Connection Failed : " . $connect->error);
    } else {
        // echo "Successfully Connected";
    }


?>