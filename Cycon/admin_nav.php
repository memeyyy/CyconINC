       <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="">
                <strong><img src="img/logo-nav.png" alt="" title="" /></img></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">
                    <?php if($page == 'dashboard' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                        <a class="nav-link" href="dashboard.php">Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php if($page == 'project_monitoring' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                        <a class="nav-link" href="project_monitoring.php" >Project Monitoring</a>
                    </li>
                    <?php if($page == 'project_warehouse' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                        <a class="nav-link" href="project_warehouse.php">Warehouse Inventory</a>
                    </li>
                    <?php if($page == 'project_transaction' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                        <a class="nav-link" href="project_transaction.php">Payment Transaction</a>
                    </li>
                     <?php if($page == 'project_report' )
                    { 
                        echo '<li class="nav-item  active ml-2">';
                    }
                     else {
                        echo '<li class="nav-item  ml-2">';
                     } ?>
                        <a class="nav-link" href="project_report.php">Report</a>
                    </li>
                    </li>

                    
                </ul>
            </div>
            <div class="float-right text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                      
                <div class="btn-group">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 5px; background-color: transparent; box-shadow: none;"><img src="img/admin.jpg" style="border-radius: 50%; height: 50px;"> <?php echo $login_session; ?> 
                    </a></button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php"><i class="fa fa-gears" aria-hidden="true"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" target="_blank" onclick="window.location='logout.php'"><i class="fa fa-sign-in mr-1" aria-hidden="true"></i> Logout</a>
                    </div>
                </div>
            </div>

                    
        </div>
    </nav>
    <!--/.Navbar-->