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
                    <li class="nav-item active ml-2">
                        <a class="nav-link" href="dashboard.php">Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="project_monitoring.php">Project Monitoring</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="project_warehouse.php">Warehouse Inventory</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="project_transaction.php">Payment Transaction</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="project_report.php">Report</a>
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
            <div class="float-right text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                      
                <div class="btn-group">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 5px; background-color: transparent; box-shadow: none;"><img src="img/admin.jpg" style="border-radius: 50%; height: 50px;"> <?php echo $login_session; ?> 
                    </a></button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-gears" aria-hidden="true"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-sign-in mr-1" aria-hidden="true"></i> Logout</a>
                    </div>
                </div>
            </div>

                    
        </div>
    </nav>
    <!--/.Navbar-->