<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 10/22/2019
 * Time: 3:11 PM
 */


require_once "../php/db_connect.php";

if (isset($_POST['slider_upload'])){
    $fileName = $_FILES['slider'] ['name'];

    if ($fileName != ''){

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowed = ['png', 'jpg', 'jpeg', 'PNG', 'gif'];

        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from sliders';
            $result = mysqli_query($connect, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $fileName;
            }
            else
                $filename = '1' . '-' . $fileName;

            //set target directory
            $path = '../images/';

            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['slider']['tmp_name'],($path . $fileName));

            // insert file details into database
            $sql = "INSERT INTO sliders (slider_name, slider_upload) VALUES ('$fileName', '$created')";
            mysqli_query($connect, $sql);
            header("Location: add_slider.php?msg=success");
        }
        else
        {
            header("Location: add_slider.php?msg=error");
        }
    }else
        header('Location: add_slider.php');

}


?>