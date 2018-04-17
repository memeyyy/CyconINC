
<?php 
    require_once('session.php');
    $page = "project_report";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Project Reports</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->

    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/Table_style.css">

</head>

<body>

    <header>
        <?php 

        require_once('admin_nav.php');
        ?>
    </header>

    <main>
        <!--Main layout-->
        <div class="container" style=" min-height: 900px;">
            <header class="head" style="padding-top: 3em;">
                <div class="main-bar">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active"> Report</li>
                </ol>
                </div>
                <!-- /.main-bar -->
            </header>
            <div class="card card-cascade narrower mt-5">

    <!--Card image-->
    <div class="view gradient-card-header aqua-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

        <h4 class="white-text font-bold font-up mb-0">Reports</h4>

    </div>
    <!--/Card image-->

    <div class="px-4">

   
    </div>


</div>
                
             
        </div>
            
    </main>

   <!--/.Main layout-->
    <?php
    include ('admin_footer.php');
    include ('general_script.php');
    ?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
         
</script>
 
    <script>
        new WOW().init();

    $(document).ready(function() {
    $('#example').DataTable();
    $('.dataTables_wrapper').find('label').each(function() {
      $(this).parent().append($(this).children());
    });
    $('select').addClass('mdb-select');
    $('.mdb-select').material_select();
});

// Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>

</body>

</html>