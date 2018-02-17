 <?php
require_once('login_action.php'); // Includes Login Script
if(isset($_SESSION['login_user']))
{           
            $user=$_SESSION['login_user'];// passing the session user to new user variable
            $connection = mysqli_connect("localhost", "root", "","zundae"); // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $query = mysqli_query($connection,"SELECT * FROM account WHERE username='$user'"); 
            //SQL query to fetch information of registerd users and finds user match.
            


            $rows = mysqli_fetch_assoc($query);
            
            
                if ($rows['accLevel'] == '1' || $rows['accLevel'] == '2' || $rows['accLevel'] == '3') //checking if acclevel is equal to 0
                {   
                    header("location: dashboard.php");// retain to user dashboard
                }
                else
                {
                header("location: index.php"); 
                }            
}

  ?>


<!DOCTYPE html>
<html lang="en">

<head>

   <?php 
   include('general_meta.php');
   ?>

    <title>Index</title>

    <link href="img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong><img src="img/logo-nav.png" alt="" title="" /></img></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">
                    <!-- <li class="nav-item active ml-2">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li> -->
                  <!--  <li class="nav-item ml-2">
                        <a class="nav-link" href="#">Mission</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="#pb-3">Vision</a>
                    </li>
                   <!--  <li class="nav-item btn-group ml-2">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </li>

                    
                </ul>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-dark-green" data-toggle="modal" data-target="#modalLoginForm">Login</button>
            </div>
                    
        </div>
    </nav>
    <!--/.Navbar-->

    <!--Carousel Wrapper-->
    <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="false">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-3" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-3" data-slide-to="1"></li>
            <li data-target="#carousel-example-3" data-slide-to="2"></li>
            <li data-target="#carousel-example-3" data-slide-to="3"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!-- First slide -->
            <div class="carousel-item active view hm-black-light" style="background-image: url('img/header1.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="display-3 flex-item font-bold">CYCON INC</h1>
                            <li>
                                <h3 class="flex-item">General Contractor</h3>
                            </li>
                          
                            </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.First slide -->

            <!-- Second slide -->
            <div class="carousel-item view hm-black-light" style="background-image: url('img/header2.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="display-4 font-bold">CYCON INC</h1>
                        </li>
                        <li>
                            <h3 class="my-4">Designer</h3>
                        </li>
                   
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Second slide -->

            <!-- Third slide -->
            <div class="carousel-item view hm-black-light" style="background-image: url('img/header3.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="display-4 font-bold">CYCON INC</h1>
                        </li>
                        <li>
                            <h3 class="my-4">Fabricator</h3>
                        </li>
                     
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Third slide -->
            <!-- Fourth slide -->
            <div class="carousel-item view hm-black-light" style="background-image: url('img/header4.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="display-4 font-bold">CYCON INC</h1>
                        </li>
                        <li>
                            <h3 class="my-4">Consultant</h3>
                        </li>
                     
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Fourth slide -->

        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->


    <div class="container">
        <!--Section: Blog v.1-->
        <section class="section pb-3 text-center text-lg-left">

            <!--Section heading-->
            <h1 class="section-heading h1 dark-grey-text text-center mt-5 pt-lg-3">MISSION</h1>
            <hr>
            <!--Section description-->
            <p class="section-description mb-5 mt-lg-5 mx-lg-5 text-center">We, CYCON Inc. commit the quality of our output that will satisfy the present and anticipated needs of consumers through highly motivated and competent contractor by contributing to the well-being of our clients.</p>

          
            <h1 class="section-heading h1 dark-grey-text text-center mt-5 pt-lg-3">VISSION</h1>
            <hr class="hr-width mb-5 mt-5 pb-3">
            <p class="section-description mb-5 mt-lg-5 mx-lg-5 text-center"> CYCON Inc. aims to become reliable and stable supplier of electrical contractor and quality of service.</p>


      


       

        </section>
        <!--Section: Blog v.1-->
        

    </div>

    <!--/.Main layout-->
    <?php
    include ('index_footer.php');
    include ('general_script.php');
    ?>
 

    <script>
        new WOW().init();
    </script>

</body>

</html>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <!-- login -->
                <form method="POST"  action="login_action.php">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input placeholder="Username" type="text" id="form5" class="form-control" name="username">
                    </div>
                    <div class="md-form">
                        <i class="fa fa-eye prefix grey-text"></i>
                        <input placeholder="Password" type="Password" id="form5" class="form-control" name="password">
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit" id="form5" class="btn btn-elegant" name="submit">
                                <input type="button"  id="form5" class=" btn btn-elegant" value="close"  data-dismiss="modal">
                            </div>
                        
                        </center>
                    </div>
                </form>
                <!-- login -->
            
            </div>
        </div>
    </div>
</div>
