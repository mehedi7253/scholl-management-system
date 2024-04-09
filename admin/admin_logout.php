<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 7/18/2019
 * Time: 11:46 PM
 */
    session_start();
    unset($_SESSION['email']);
    session_destroy();
    header('location: admin_login.php');

?>