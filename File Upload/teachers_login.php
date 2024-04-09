
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faculty Login</title>
    <link rel="stylesheet" href="../assets/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/style/main.css" type="text/css" />
    <link rel="icon" href="../images/Logo-Only.png">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Teachers Login</h1>
                    <?php
                        require_once '../php/db_connect.php';//connect with database

                        global  $connect;

                        session_start();
                        //check login
                        if (isset($_SESSION['email'])){
                            header('Location:teachers_login.php'); //redirect page
                        }


                        if (isset($_POST['btn'])){
                            $email    = $_POST['email']; //declare varable email and put into post method.
                            $password = $_POST['password']; //declare variable password and put into post method.

                            //query
                            $sql = "SELECT * FROM teachers WHERE email ='$email' AND password = '$password'";

                            $result = mysqli_query($connect, $sql);

                            //check availability
                            $row = mysqli_num_rows($result);
                            if ($row == 1){
                                $row = mysqli_fetch_array($result);
                                $_SESSION['name']  = $row['name'];
                                $_SESSION['email'] = $email;
                                header('Location: file_upload.php');
                            }else{
                                echo "<span class='text-danger'>User Name Or Password Doesn't match</span>";
                                header('Locatio: teachers_login.php');
                            }
                        }

                    ?>


                </div>
                <div class="card-body">
                    <form action="teachers_login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" name="email" id="email" autocomplete="off" placeholder="Email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" class="form-control"/>
                        </div>
                        <br />
                        <div>
                            <button class="btn btn-success col-4" name="btn" type="submit">Login</button>
                            <button class="btn btn-danger col-4"  type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>