<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="">
                <strong><img src="img/logo-nav.png" alt="" title="" /></img></strong>
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <?php 


    
?>
               <!--   <?php 
                    
                        if($page == 'dashboard' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                    else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                <a class="nav-link" href="dashboard">Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                </li> -->
                <?php 
                    if ($level_session == 6 ) {
                        if($page == 'Account' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                    else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                <a class="nav-link" href="account">Account
                            <span class="sr-only">(current)</span>
                        </a>
                </li>
               
                <?php 
                    }
                    if ($level_session == 1 || $level_session == 3 || $level_session == 4 || $level_session == 6 ) {
                    if($page == 'project_monitoring' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                <a class="nav-link" href="project_monitoring">Project Monitoring</a>
                </li>
                <?php
                    }
                    ?>
                    <?php 
                    if ($level_session == 1  || $level_session == 3 || $level_session == 5 || $level_session == 4 || $level_session == 6) {
                        if($page == 'project_warehouse' )
                        { 
                            echo '<li class="nav-item  active ml-2">';
                        }
                         else {
                            echo '<li class="nav-item  ml-2">';
                         } ?>
                    <a class="nav-link" href="project_warehouse">Warehouse Inventory</a>
                    </li>
                    <?php   
                     } 
                    ?>


                    <?php 
                if ($level_session == 1 || $level_session == 4 || $level_session == 2 || $level_session == 6) 
                {
                        //accounting staff

                    if($page == 'project_transaction' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                    else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                    <a class="nav-link" href="project_transaction">Payment Transaction</a>
                    </li>
                    <?php 
                }
                    ?>

                    <!-- <?php 

                     if($page == 'project_report' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                        <a class="nav-link" href="project_report">Report</a>
                    </li>
                    </li> -->


            </ul>
        </div>
        <div class="float-right text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php 
$user_check=$login_session;
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"SELECT * FROM user_account WHERE username='$user_check'");
if ($ses_sql) {
    $row = mysqli_fetch_assoc($ses_sql);
    $user_ID = $row['user_ID'];
    $de_sql=mysqli_query($connection," SELECT * FROM `user_detail` WHERE user_ID = '$user_ID'");
    if ($de_sql) {
        $rowz = mysqli_fetch_assoc($de_sql);
    }
}

if (empty($rowz['detail_img'])) {
    $img_z = "img/admin.jpg";
}
else{
    $detail_img = $rowz['detail_img'];
    $img_z = 'data:image/jpeg;base64,'.base64_encode( $detail_img ).'';
}
?>

            <div class="btn-group">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 5px; background-color: transparent; box-shadow: none;"><img src="<?php echo $img_z ?>" style="border-radius: 50%; height: 50px;"> <?php echo $login_session; ?> 
                    </a></button>

                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" data-toggle="modal" data-target="#modalPROFILE"><i class="fa fa-gears" aria-hidden="true"></i> Profile</a>
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" target="_blank" onclick="window.location='logout.php'"><i class="fa fa-sign-in mr-1" aria-hidden="true"></i> Logout</a>
                </div>
            </div>
        </div>


    </div>
</nav>
<!--/.Navbar-->


<div class="modal fade" id="modalPROFILE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Profile Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">

                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/img/ajax-loader.gif">
                </div>

                <!-- content will be load here -->
                <div id="dynamic-content"></div>


            </div>
        </div>
    </div>
</div>