<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 7/20/2019
 * Time: 3:43 AM
 */

    require_once '../php/db_connect.php'; //connect with database
    global $connect;


  
    $fcname = $_POST['fcname']; //declare variable fcname and put into post method
    $title = $_POST['title']; //declare variable title and put into post method
    $subject =$_POST['subject'];


//file uploda
if (isset($_POST['submit'])) //button name
{
    $filename = $_FILES['file1']['name']; //declare name

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'PNG', 'gif', 'zip'];

        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from tbl_files';
            $result = mysqli_query($connect, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';

            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));

            // insert file details into database
            $sql = "INSERT INTO tbl_files(filename, created, fcname, title, subject) VALUES ('$filename', '$created', '$fcname', '$title', '$subject')";
            mysqli_query($connect, $sql);
            header("Location: file_upload.php?st=success");
        }
        else
        {
            header("Location: file_upload.php?st=error");
        }
    }
    else
        header("Location: file_upload.php");
}
?>