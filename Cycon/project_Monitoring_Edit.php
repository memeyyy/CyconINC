
<?php 
    require_once('session.php');
    $proj_ID = $_REQUEST['proj_ID'];
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
<style type="text/css">
/*  .dataTables_filter {
   float: left !important;
}*/
/*.dataTables_length {
        display: flex; 
        display: none !important;
       */
    }
</style>
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
<?php 
$total_mstone = mysqli_query($connection,"SELECT SUM(mstone_Percent) sum FROM `project_milestone` WHERE proj_ID = $proj_ID");
            $total_mstone = mysqli_fetch_array($total_mstone);
            $total_mstone = $total_mstone['sum'];
            if ($total_mstone == 100) {
              mysqli_query($connection,"UPDATE `project_monitoring` SET `status_ID` = '4' WHERE `project_monitoring`.`proj_ID` = $proj_ID;");
            }
            else{
              mysqli_query($connection,"UPDATE `project_monitoring` SET `status_ID` = '3' WHERE `project_monitoring`.`proj_ID` = $proj_ID ;");
            }
            

if  ($total_mstone <100){
  ?>
  <a class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#modaladd">Add Milestone</a>
  <?php
}
?>


<div class="btn-group float-right">

<div class="btn btn-primary btn-lg  ">Percentage: <?php 
 if  ($total_mstone >100){
   // echo "<script>alert('You reach the maximum percentage of the project milestone');</script>";
   echo "100";
 }
 else{
  echo intval($total_mstone);
 }
 ?>%</div>
</div>
<br><br>
        <!--Table-->
   <table id="project_monitoring" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
    <thead class="mdb-color darken-3 text-white" >
        <tr>
            <th>Milestone Title</th>
            <th>Milestone Percent</th>
            <th>Milestone DateStarted</th>
            <th>Milestone DateEnded</th>
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
        $project_q = mysqli_query($connection,"SELECT mstone_ID, mstone_Title,mstone_Percent,mstone_DateStarted,mstone_DateEnded FROM `project_milestone` pm WHERE proj_ID = $proj_ID ORDER BY pm.`date_added` DESC");
        while ($project_fetch = mysqli_fetch_assoc($project_q)) {
            ?>
            <tr>
            <td><?php 
            echo $project_fetch['mstone_Title'];
            ?></td>
            <td><?php echo $project_fetch['mstone_Percent']; ?></td>
            <td><?php echo $project_fetch['mstone_DateStarted']; ?></td>
            <td><?php echo $project_fetch['mstone_DateEnded']; ?></td>

            <td class="text-center">
                <div class="btn-group" data-toggle="buttons">
                  <!-- <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modalview" data-id="<?php echo $project_fetch['mstone_ID']; ?>" id="viewProject"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button> -->
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $project_fetch['mstone_ID']; ?>" id="editProject"><i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button>
                  <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaldelete" data-id="<?php echo $project_fetch['mstone_ID']; ?>" id="deleteProject"><i class="fa fa-close" aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="Delete"></i></button>
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
    {
       "lengthChange": false,
       "aaSorting":[]

    }
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
    $('#viewmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'Project_Milestone_View.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#view-content').html('');    
      $('#view-content').html(data); // load response 
      $('#viewmodal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#viewmodal-loader').hide();
    });
    
  });

    $(document).on('click', '#editProject', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#edit-content').html(''); // leave it blank before ajax call
    $('#editmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'Project_Milestone_Edit.php',
      type: 'POST',
      data: 'id='+uid+'&proj_ID=<?php echo $proj_ID?>',
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#edit-content').html('');    
      $('#edit-content').html(data); // load response 
      $('#editmodal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#editmodal-loader').hide();
    });
    
  });
  $(document).on('click', '#deleteProject', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#delete-content').html(''); // leave it blank before ajax call
    $('#deletemodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'Project_Milestone_Delete.php',
      type: 'POST',
      data: 'id='+uid+'&proj_ID=<?php echo $proj_ID ?>',
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#delete-content').html('');    
      $('#delete-content').html(data); // load response 
      $('#deletemodal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#deletemodal-loader').hide();
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
                <h4 class="modal-title w-100 font-bold">Add New Milestone</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-1">
                <!-- add form -->
                <form method="POST"  action="project_action.php?proj_ID=<?php echo $proj_ID?>">
                    <div class="md-form row">
                        <div class="col-7 col-md-7">
                            <i class="fa fa-user prefix grey-text"></i>
                           <!--  <input placeholder="Milestone Title" type="text" id="form5" class="form-control" name="mstone_Title" required="" -->
                            <select  class="browser-default form-control" name="mstone_Title" style="  
                          padding: 0;
                          padding-bottom: 0.6rem;
                          padding-top: 0.5rem;
                          font-size: 1rem;
                          line-height: 1.5;
                          background-color: transparent;
                          background-image: none;
                          border-radius: 0;
                          margin-top: 1rem;
                          margin-left: 3rem;
                          margin-bottom: 1rem;  width: 400px;" required="" >
  <option value="Survey and Stalking">Survey and Stalking</option>
  <option value="Mobilization and Demobilization">Mobilization and Demobilization</option>
  <option value="Fabrication of Flatform for Transformer">Fabrication of Flatform for Transformer</option>
  <option value="Excavation and Concreting for Flatform">Excavation and Concreting for Flatform</option>
  <option value="Installation of Flatform of Transformer">Installation of Flatform of Transformer</option>
  <option value="Excavation and Concrete Breaking for Pole Erection">Excavation and Concrete Breaking for Pole Erection</option>
  <option value="Hauling of Pole">Hauling of Pole</option>
  <option value="Pole Erection">Pole Erection</option>
  <option value="Pole Dressing">Pole Dressing</option>
  <option value="Stringing">Stringing</option>
  <option value="Termination of XLPE">Termination of XLPE</option>
  <option value="Testing">Testing</option>

</select>
                          </div>
                        <div class="col-5 col-md-5">
                            <input placeholder="Milestone Percent" type="number" id="form5" class="form-control" name="mstone_Percent"  required=""></div>
                    </div>
                   
                   <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="mstone_DateStarted"  required=""></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Date End" type="date" id="form5" class="form-control" name="mstone_DateEnded"></div>
                    </div>
                 <!--    <div class="md-form row">
                    <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                          <select class="browser-default form-control" name="status_ID" style="  
                          padding: 0;
                          padding-bottom: 0.6rem;
                          padding-top: 0.5rem;
                          font-size: 1rem;
                          line-height: 1.5;
                          background-color: transparent;
                          background-image: none;
                          border-radius: 0;
                          margin-top: 1rem;
                          margin-left: 3rem;
                          margin-bottom: 1rem;  ">
                                <option value="" disabled selected>Choose your option</option>
                                <?php 
                                $sql = mysqli_query($connection,"SELECT * FROM `status` WHERE status_ID = '3' OR status_ID = '4'");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['status_ID'];?>"> <?php echo $u['status_Name'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                        
                    </div> -->
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="submit-milestone">
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
                <h4 class="modal-title w-100 font-bold">Milestone Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-3">

                <div id="viewmodal-loader" style="display: none; text-align: center;">
                 <img src="assets/img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="view-content"></div>
            
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Edit Milestone</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-3">

                <div id="editmodal-loader" style="display: none; text-align: center;">
                 <img src="assets/img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="edit-content"></div>
            
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Are you sure to delete this milestone of project?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">

                <div id="deletemodal-loader" style="display: none; text-align: center;">
                 <img src="assets/img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="delete-content"></div>
                
            
            </div>
        </div>
    </div>
</div>


