
<?php 
    require_once('session.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Material Design Bootstrap</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <div class="container">
            
            <div class="card card-cascade narrower mt-5">

    <!--Card image-->
    <div class="view gradient-card-header purple-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

        <h4 class="white-text font-bold font-up mb-0">Project Transaction</h4>

    </div>
    <!--/Card image-->

    <div class="px-4">

        <!--Table-->
   <table id="example" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Owner</th>
            <th>Project Head</th>
            <th>Project Progress</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Project Name</th>
            <th>Project Owner</th>
            <th>Project Head</th>
            <th>Project Progress</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php 
        $project_q = mysqli_query($connection,"SELECT * FROM `project`");
        while ($project_fetch = mysqli_fetch_assoc($project_q)) {
            ?>
            <tr>
            <td><?php 
            echo $project_fetch['proj_Title'];
            ?>
            <br>
            <p style="color:grey;">Started on: <?PHP
            echo $project_fetch['proj_DateStarted'];
            ?></p> </td>
            <td><?php echo $project_fetch['proj_Owner']; ?></td>
            <td><?php echo $project_fetch['proj_Head']; ?></td>
            <td>
            <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="Percentage"></div>
            </div>
            </td>
            <td><?php echo $project_fetch['proj_Status']; ?></td>
            <td >
                <div class="btn-group" data-toggle="buttons">
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></button>
                </div>
            </td>
            </tr>
            <?php
        }
           
        ?>
    </tbody>
</table>
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