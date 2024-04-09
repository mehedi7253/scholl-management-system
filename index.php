<?php
/**
 * Created by PhpStorm.
 * User: mdmeh
 * Date: 10/17/2019
 * Time: 11:39 PM
 */

    include "php/config.php";


    $sql    = "SELECT * FROM sliders";
    $res    = mysqli_query($connect, $sql);
    $numrow = mysqli_num_rows($res);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scholl Management System</title>
    <link href="assets/style/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="assets/style/main.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="images/Logo-Only.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <header>
        <nav class="navbar  navbar-expand-lg bg-dark navbar-dark m-0 p-0 fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="images/Logo-Only.png" style="height: 70px; width: 150px">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="myMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="index.php"" class="nav-link active ">HOME</a></li>
                        <li class="nav-item"><a href="#mission" class="nav-link">Mission & Visson</a></li>
                        <li class="nav-item"><a href="#top" class="nav-link">Top Students</a></li>
                        <li class="nav-item"><a href="#notice" class="nav-link">Notice</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link">CONTACT</a></li>
                        <li class="nav-item"><a href="index2.php" class="nav-link" >login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<!--    admission-->
    <div class="admission">
        <marquee>.........Well Come to Smart School management system...Addmission Is Going On Fall 2019.....</marquee>
    </div>

    <!-- slider-->
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                for ($i=1; $i<=$numrow; $i++ ) {
                    echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"$i++\"></li>";
                }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i=1; $i<=$numrow; $i++ ) {
                        $row = mysqli_fetch_assoc($res);

                        ?>
                        <?php
                        if ($i == 1) { ?>
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="<?php echo "images/" . $row["slider_name"]; ?>" alt="First slide" width="100%" style="height: 390px">
                            </div>

                        <?php } else { ?>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?php echo "images/" . $row["slider_name"]; ?>" alt="Second slide" width="100%" style="height: 390px">
                            </div>
                        <?php }
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- end slider-->

<!--mission and vission-->

    <section class="" id="mission" style="background-color: rgba(204,205,255,0.39)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <div class="col-md-6 col-sm-12 mt-3 float-left">
                        <h5 class="text-center mt-5">Mission</h5>
                        <?php
                            $mision = "SELECT * FROM mission ORDER BY id DESC";
                            $result = mysqli_query($connect, $mision);

                            $row = mysqli_fetch_assoc($result);
                        ?>
<!--                        --><?php //while ($row = mysqli_fetch_assoc($result)){?>
                             <p class="text-justify"><?php echo $row['mission'];?></p>
<!--                        --><?php //}?>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-3 float-left">
                        <h5 class="text-center mt-5">Vission</h5>
                        <?php
                            $vission = "SELECT * FROM vission ORDER BY id DESC";
                            $result = mysqli_query($connect, $vission );

                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <!--                        --><?php //while ($row = mysqli_fetch_assoc($result)){?>
                        <p class="text-justify"><?php echo $row['vission'];?></p>
                        <!--                        --><?php //}?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--end mission and vission-->

<!--    top students-->
    <section class="top_student" id="top" style="background-color: rgba(108,110,255,0.28)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h2 class="text-center mt-5">Top Students</h2>
                </div>

                <?php
                    $student = "SELECT * FROM students";

                    $results = mysqli_query($connect, $student);

                ?>
                <div class="col-md-12 col-sm-12 mt-5 mb-5 ">
                    <?php
                    while ($row = mysqli_fetch_assoc($results)) {?>

                        <div class="col-md-3 col-sm-12 mt-2 float-left ">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo "images/". $row['image'];?>" style="height: 250px;">
                                <div class="card-body">
                                    <h3 class="ml-3 text-capitalize"> <?php echo $row['first_name']; ?><span class="ml-1"><?php echo $row['last_name'];?></span></h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<!--    end top students-->

<!--    class routine and notice-->
    <section class="" id="notice" style="background-color: powderblue">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-5">
                    <div class="col-md-7 col-sm-12 mt-5 float-left">
                        <h5 class="text-center">Class Routine</h5>
                        <?php
                            $sql = "SELECT * FROM routine";
                            $r = mysqli_query($connect, $sql);
                        ?>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Time</th>
                                    <th>Satur Day</th>
                                    <th>Sun Day</th>
                                    <th>Mon Day</th>
                                    <th>Tues Day</th>
                                    <th>Wednes Day</th>
                                    <th>Thurs Day</th>
                                </tr>
                                <?php while ($row = mysqli_fetch_assoc($r)){?>
                                <tr>
                                    <td><?php echo $row['time'];?></td>
                                    <td><?php echo $row['sat'];?></td>
                                    <td><?php echo $row['sun'];?></td>
                                    <td><?php echo $row['mon'];?></td>
                                    <td><?php echo $row['tues'];?></td>
                                    <td><?php echo $row['wed'];?></td>
                                    <td><?php echo $row['thurs'];?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>

                    </div>
                    <div class="col-md-5 col-sm-12 mt-5 float-left">
                        <h5 class="text-center mb-2">Notice</h5>
                            <?php
                                $sql = "SELECT * FROM notice ORDER BY id DESC";
                                $result = mysqli_query($connect, $sql);

                            ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Title</td>
                                    <td>Notice</td>
                                </tr>
                                <?php while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td><?php echo $row['issue'];?></td>
                                    <td><?php echo $row['notice'];?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--    end class routine nad notice-->


<!--    section send message-->
    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-5 mb-5">
                    <h5 class="text-center mb-3">Fell Free To Send Message</h5>
                    <h2>
                        <?php
                        if (isset($_POST['msg'])){
                            $name    = $_POST['name'];
                            $email   = $_POST['email'];
                            $phone   = $_POST['phone'];
                            $message  = $_POST['message'];

                            if ($name == ""){
                                echo "<span class='text-danger'>Please Enter Your Name</span> <br/>";
                            }
                            if ($email == ""){
                                echo "<span class='text-danger'>Please Enter Your Email</span> <br/>";
                            }
                            if ($phone == ""){
                                echo "<span class='text-danger'>Please Enter Your Phone Number</span> <br/>";
                            }
                            if ($message == ""){
                                echo "<span class='text-danger'>Please Enter Your Message</span> <br/>";
                            }


                            if ($name && $email && $phone && $message){
                                $sql = "INSERT INTO check_message (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
                                $res = mysqli_query($connect, $sql);

                                echo "<span class='text-success'> Message Send Successfully.</span> <br/>";
                            }else{
                                echo "<span class='text-danger'>Field Must Not Be Empty... Try Again</span> <rb/>";
                            }

                        }
                        ?>
                    </h2>
                    <hr/>

                    <div class="col-md-7 col-sm-12 float-left">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name......">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email......">
                            </div>
                            <div class="form-group">
                                <label>Phone :</label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number......">
                            </div>
                            <div class="form-group">
                                <label>Message :</label>
                                <textarea name="message" placeholder="Type Message here.........." class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="submit" name="msg" class="btn btn-info" value="Send Message">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-5 col-sm-12 float-left">
                        <h3 class="text-center mb-5">Our Contact Information</h3>
                        <div class="text-justify mt-5">
                            <label class="font-weight-bolder ml-5">Admin Phone : 01941697253</label><br/>
                            <label class="font-weight-bolder ml-5">Admin Email : admin@gamil.com</label><br/>
                            <hr/>
                            <label class="font-weight-bolder ml-5">Head Phone : 01941697253</label><br/>
                            <label class="font-weight-bolder ml-5">Head Email : head@gamil.com</label><br/>
                            <hr/>
                            <label class="font-weight-bolder ml-5">Information Desk Phone : 01941697253</label><br/>
                            <label class="font-weight-bolder ml-5">Information Desk Email : info@gamil.com</label><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--    end section send message- -->


<!--    footer-->
    <section class="footer" style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-white text-center font-italic p-2">This Site Is Create by <b>@ Md. Mehedi Hasn</b></p>
                </div>
            </div>
        </div>
    </section>
<!--    end footer-->



<!--    scrooll up-->
    <button id="topBtn"><i class="fas fa-arrow-up"></i></button>
    <!--    script-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/topdown.js"></script>
</body>
</html>
