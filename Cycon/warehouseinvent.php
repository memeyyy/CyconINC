<!DOCTYPE html>
<html lang="en">
<?php 
include ('head.php');
?>

  <body>
    <!-- Page Content
    ================================================== -->
    <!-- Hero -->

    <section class="hero">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
            <a class="hero-brand" href="index.html" title="Home"><img alt="Bell Logo" src="img/logo.png"></a>
          </div>
        </div>

        <div class="col-md-12">
          <hr style="background-color: white; margin-bottom: -45px;">
          <p class="tagline">
            GENERAL CONTRACTOR - DESIGNER - CONSULTANT - FABRICATOR
          </p>
          <hr style="background-color: white; margin-top: -75px;">
        </div>
      </div>
      
    </section>
    <!-- /Hero -->
    
  <!-- Header -->
  <header id="header">
    <div class="container">
    
      <div id="logo" class="pull-left">
        <a href="index.html"><img src="img/logo-nav.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>
             
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">HOME</a></li>
          <li><a href="projectmonitoring.php">PROJECT MONITORING</a></li>
          <li><a href="warehouseinvent.php">WAREHOUSE INVENTORY</a></li>
          <li><a href="paymenttransaction.php">PAYMENT TRANSACTION</a></li>
          <li><a href="reports.php">REPORTS</a></li>
          
        <!--   <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto" >
            <li class="dropdown order-1" style="margin-top: 10px; margin-left: 40px;" >
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle" style="border-radius: 0;">Login <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right mt-1">
                  <li class="p-3">
                        <form class="form" role="form">
                            <div class="form-group">
                                <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                            </div>
                            <div class="form-group">
                                <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" style="border-radius: 0;">Login</button>
                            </div>
                            <div class="form-group text-xs-center">
                                <small><a href="#">Forgot password?</a></small>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
      </nav><!-- #nav-menu-container -->
      
     
    </div>
  </header><!-- #header -->
  

    <!-- Parallax -->

  <!--   <div class="block bg-primary block-pd-lg block-bg-overlay text-center" data-bg-img="img/parallax-bg.jpg" data-settings='{"stellar-background-ratio": 0.6}' data-toggle="parallax-bg">
      <h2>
        Welcome WORDS 
      </h2>

      <p>
        others word
      </p>
      <img alt="Bell - A perfect theme" class="gadgets-img hidden-md-down" src="img/gadgets.png">
    </div> -->
    <!-- /Parallax -->
    <!-- Portfolio -->

    <section class="portfolio" id="portfolio" >
      <div class="container">
        <table  id="example" class="table table-bordered table-advance table-hover  dataTable" >
          <thead>
            <tr>
              <th class="col-sm-1 text-center">Item Name</th>
              <th class="col-sm-1 text-center">Quantity</th>
              <th class="col-sm-3 text-center">Physical Condition</th>
              <th class="col-sm-2 text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>sample</td>
              <td>sample</td>
              <td>sample</td>
              <td>
                <div class="btn-group">
                  <button type="button" class=" btn-success">ADD</button>
                  <button type="button" class=" btn-primary">EDIT</button>
                  <button type="button" class=" btn-danger">DELETE</button>
                </div>
              </td>
            </tr>
              <tr>
              <td>sample</td>
              <td>sample</td>
              <td>sample</td>
              <td>
                <div class="btn-group">
                  <button type="button" class=" btn-success">ADD</button>
                  <button type="button" class=" btn-primary">EDIT</button>
                  <button type="button" class=" btn-danger">DELETE</button>
                </div>
              </td>
            </tr> 
            <tr>
              <td>sample</td>
              <td>sample</td>
              <td>sample</td>
              <td>
                <div class="btn-group">
                  <button type="button" class=" btn-success">ADD</button>
                  <button type="button" class=" btn-primary">EDIT</button>
                  <button type="button" class=" btn-danger">DELETE</button>
                </div>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>
    <!-- /Portfolio -->
    <!-- Team -->

    <!-- @component: footer -->

      
    <footer class="site-footer">
      <div class="bottom">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-xs-12 text-lg-left text-center">
              <p class="copyright-text">
                © 2017
              </p>
              <div class="credits">
                 
                <a href="">CYCON INC.</a>
              </div>
            </div>
            
            <div class="col-lg-9 col-xs-12 text-lg-right text-center">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a href="index.php">HOME</a>
                </li>

                <li class="list-inline-item">
                  <a href="projectmonitoring.php">PROJECT MONITORING</a>
                </li>

                <li class="list-inline-item">
                  <a href="warehouseinvent.php">WAREHOUSE INVENTORY</a>
                </li>

                <li class="list-inline-item">
                  <a href="paymenttransaction.php">PAYMENT TRANSACTION</a>
                </li>

                <li class="list-inline-item">
                  <a href="reports.php">REPORTS</a>
                </li>


              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </footer>
    <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a> <!-- JavaScript-->
  <?php 
  include ('script.php'); 
  ?>
    
  </body>
</html>