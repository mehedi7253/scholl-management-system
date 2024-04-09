<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Login</title>
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
                        <h1 class="text-center">Student Login</h1>

                        <!-- start php code-->
                        <?php

                            //connect with database
                            require_once '../php/config.php';

                            //check login
                            if(logged_in() === TRUE) {
                                header('location: student_dasboard.php'); //redirect page
                            }

                            // form submiited
                            if($_POST) {
                                $username = $_POST['username']; //decleare variable username and put it into post method
                                $password = $_POST['password']; //decleare variable password and put it into post method

                                //check error
                                //if username empty
                                if($username == "") {
                                    echo "<span class='text-danger'>* Username Field is Required</span> <br />";
                                }

                                //if password empty
                                if($password == "") {
                                    echo "<span class='text-danger'>* Password Field is Required </span> <br />";
                                }

                                //if name and password is match then user can log in otherwise not,.
                                if($username && $password) {
                                    if(userExists($username) == TRUE) {
                                        $login = login($username, $password);
                                        if($login) {
                                            $userdata = userdata($username);

                                            $_SESSION['id'] = $userdata['id'];

                                            header('location: student_dasboard.php');
                                            exit();

                                        } else {
                                            echo "<span class='text-danger'>Incorrect username/password combination</span>";
                                        }
                                    } else{
                                        echo "<span class='text-danger'>username does not exists</span>";
                                    }
                                }

                            } // /if

                        ?>
                        <!-- End php code-->

                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" name="username" id="username" autocomplete="off" placeholder="Email" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" class="form-control"/>
                            </div>
                            <br />

                            <div>
                                <button class="btn btn-success col-4" type="submit">Login</button>
                                <button class="btn btn-danger col-4"  type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="float-right">Not Registered ? Click <a href="student_reg.php"><span class="text-info">Register</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>