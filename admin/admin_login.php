
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
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
                    <h1 class="text-center">Admin Login</h1>
                    <?php

                    session_start();
                    if (isset($_SESSION['email'])){
                        header('Location: admin_dasboard.php');
                    }

                    require_once '../php/db_connect.php';
                    global  $connect;


                    if (isset($_POST['btn'])){
                        $email    = $_POST['email'];
                        $password = $_POST['password'];

                        $sql = "SELECT * FROM admin WHERE email ='$email' AND password = '$password'";

                        $result = mysqli_query($connect, $sql);

                        $row = mysqli_num_rows($result);
                        if ($row == 1){
                            echo "Login Donee";
                            $_SESSION['email'] = $email;
                            header('Location: admin_dasboard.php');
                        }else{
                            echo "<span class='text-danger'>User Name Or Password Doesn't match</span>";
                            //header('Location: admin_login.php');
                        }
                    }

                    ?>


                </div>
                <div class="card-body">
                    <form action="admin_login.php" method="POST">
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