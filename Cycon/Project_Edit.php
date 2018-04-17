
<?php 
    require_once('session.php');
    $page = "project_monitoring";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Project Monitoring</title>

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
                  <li class="breadcrumb-item active"><a href="project_monitoring">Project Monitoring</a></li>
                  <li class="breadcrumb-item active"> Milestone</li>
                </ol>
                </div>
                <!-- /.main-bar -->
            </header>
            <div class="card card-cascade narrower mt-5">

    <!--Card image-->
    <div class="view gradient-card-header aqua-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

        <h4 class="white-text font-bold font-up mb-0">Milestone Project</h4>

    </div>
    <!--/Card image-->

    <div class="px-4">

<a class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#modaladd">Add Milestone</a>
        <!--Table-->
   <table id="project_monitoring" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
    <thead class="mdb-color darken-3 text-white" >
        <tr>
            <th>Project Title</th>
            <th>Project Owner</th>
            <th>Project Location</th>
            <th>Project Progress</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tfoot class="mdb-color darken-3 text-white" >
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="text-center"></th>
        </tr>
    </tfoot>
    <tbody>
         <?php 
        $project_q = mysqli_query($connection,"SELECT * FROM `project_monitoring`");
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
            <td><?php echo $project_fetch['proj_Location']; ?></td>
            
            <td><?php echo $project_fetch['proj_Status']; ?></td>
            <td class="text-center">
                <div class="btn-group" data-toggle="buttons">
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modalview" data-id="<?php echo $project_fetch['proj_ID']; ?>" id="viewProject"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button>
                  <button type="button" class="btn btn-primary  btn-sm" onclick="window.location='project_Edit'" ><i class="fa fa-edit" aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaldelete" data-id="<?php echo $project_fetch['proj_ID']; ?>" id="deleteProject"><i class="fa fa-close" aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="Delete"></i></button>
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
    $('#project_monitoring').DataTable( 
    // {
    //     "processing": true,
    //     "serverSide": true,
    //     "sAjaxSource": "serverside_data_project_monitoring.php"
        
    // }
     );



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

$(document).ready(function(){
    $(document).on('click', '#viewProject', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#view-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'Project_View.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#view-content').html('');    
      $('#view-content').html(data); // load response 
      $('#modal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
    });
    
  });
  $(document).on('click', '#deleteProject', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'Project_Delete.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamic-content').html('');    
      $('#dynamic-content').html(data); // load response 
      $('#modal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
    });
    
  });

  
});

    </script>

</body>

</html>

<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Add New Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-1">
                <!-- add form -->
                <form method="POST"  action="project_action.php">
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Project Title" type="text" id="form5" class="form-control" name="ProjectTitle" required=""></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Project Owner" type="text" id="form5" class="form-control" name="ProjectOwner"  required=""></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Project Location" type="text" id="form5" class="form-control" name="ProjectLocation"  required=""></div>
                        
                    </div>
                   
                   <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="ProjectStart"  required=""></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Date End" type="date" id="form5" class="form-control" name="ProjectEnd"></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Project Scope" type="text" id="form5" class="form-control" name="ProjectScope"  required=""></div>
                        
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Project Head" type="text" id="form5" class="form-control" name="ProjectHead" ></div>
                        
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="submit-project">
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        
                        </center>
                    </div>
                </form>
                <!-- add form -->
            
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Project Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-3">

                <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="assets/img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="view-content"></div>
            
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Are you sure to delete this project?</h5>
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

