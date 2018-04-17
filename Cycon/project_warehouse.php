
<?php 
    require_once('session.php');
    $page = "project_warehouse";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Warehouse Inventory</title>

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
                  <li class="breadcrumb-item active"> Warehouse Inventory</li>
                </ol>
                </div>
                <!-- /.main-bar -->
            </header>
            <div class="card card-cascade narrower mt-5">

    <!--Card image-->
    <div class="view gradient-card-header aqua-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

        <h4 class="white-text font-bold font-up mb-0">Warehouse Inventory</h4>

    </div>
    <!--/Card image-->

    <div class="px-4">
<?php 
if ($level_session == 1 || $level_session == 4 ||$level_session == 3) {
  if ($level_session == 4) {
    ?>
    <a class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#modalProjectEquipment">ADD EQUIPMENT USAGE</a>
      <?php
  }
?>
  <a class="btn btn-primary btn-lg <?php  if ($level_session == 4) {echo 'float-right';} ?>" data-toggle="modal" data-target="#modalprint">Print</a>

<?php
  
}
else{
  ?>
  <div class="btn-group">
  <a class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#modaladd">Add Equipment</a>
   <a class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#modalProjectEquipment">ADD EQUIPMENT USAGE</a>
   </div>
  <a class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#modalprint">Print</a>
  <?php
}
?>
<br><br>
        <!--Table-->
<table id="equipment_invent" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
    <thead class="mdb-color darken-3 text-white" >
        <tr>
            <th>Equipment Name</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Available</th>
            <th>Usage</th>
            <th>Return</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tfoot class="mdb-color darken-3 text-white" >
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="text-center"></th>
        </tr>
    </tfoot>
    <tbody>
         <?php 
            $project_q = mysqli_query($connection,"
SELECT e.equip_ID,
e.equip_Name,
u.unit_Name,
e.equip_Quantity,
e.equip_Quantity - COALESCE(eu.usage_quantity, 0)+ (COALESCE(er.return_quantity, 0)) as available_quantity,
(COALESCE(eu.usage_quantity, 0)) - 
(COALESCE(er.return_quantity, 0))  usage_quantity,
COALESCE(er.return_quantity, 0) as return_quantity
FROM equipment e 
INNER JOIN unit u
ON u.unit_ID = e.unit_ID LEFT JOIN
(SELECT eu.equip_id, 
 SUM(eu.usage_Quantity) as usage_Quantity
FROM equipment_usage eu
GROUP BY eu.equip_ID
) eu
ON eu.equip_ID = e.equip_ID LEFT JOIN
(SELECT eu.equip_id, SUM(er.return_Quantity) as return_Quantity
FROM equipment_return er JOIN
equipment_usage eu
ON er.usage_ID = eu.usage_ID
GROUP BY eu.equip_id
) er
ON er.equip_ID = e.equip_ID");
            while ($equip_fetch = mysqli_fetch_assoc($project_q)) {
                ?>
                <tr>
                    <td><?php  echo $equip_fetch['equip_Name']; ?></td>
                    <td><?php echo number_format($equip_fetch['equip_Quantity']); ?></td>
                    <td><?php 
                    if ($equip_fetch['equip_Quantity'] > 1) {
                        $s = 's';
                    }
                    else{
                        $s = '';
                    }
                    echo $equip_fetch['unit_Name'].$s;
                   
                     ?></td>
                     <?php 
                      if ($level_session == 1 || $level_session == 5|| $level_session == 6) {
                     ?>

                    <td><?php  echo $equip_fetch['available_quantity']; ?></td>

                    <td><?php  echo $equip_fetch['usage_quantity']; ?></td>
                    
                    <td><?php  echo $equip_fetch['return_quantity']; ?></td>
                    <td class="text-center">
                        <div class="btn-group" data-toggle="buttons">
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modalview" data-id="<?php echo $equip_fetch['equip_ID']; ?>" id="viewEquipment"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button>
                          <?php 
                          if ($level_session == 3  || $level_session == 5|| $level_session == 6) {
                          ?>
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $equip_fetch['equip_ID']; ?>" id="editEquipment"><i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaldelete" data-id="<?php echo $equip_fetch['equip_ID']; ?>" id="deleteEquipment"><i class="fa fa-close" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete"></i></button>
                          <?php
                          }
                          ?>
                        </div>
                    </td>
                
                <?php
              }
              else{
                ?>
                 <td class="text-center">
                  <button type="button" class="btn btn-warning  btn-sm" >Disable</button>
                </td>
                <?php
              }
              ?>
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
    $('#equipment_invent').DataTable( 
    // {
    //     "processing": true,
    //     "serverSide": true,
    //     "sAjaxSource": "serverside_data_equipment_invent.php"
        
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
    $(document).on('click', '#viewEquipment', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#view-content').html(''); // leave it blank before ajax call
    $('#viewmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'project_warehouse_View.php',
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
    $(document).on('click', '#editEquipment', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#edit-content').html(''); // leave it blank before ajax call
    $('#editmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'project_warehouse_Edit.php',
      type: 'POST',
      data: 'id='+uid,
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

  $(document).on('click', '#deleteEquipment', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#delete-content').html(''); // leave it blank before ajax call
    $('#deletemodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'project_warehouse_Delete.php',
      type: 'POST',
      data: 'id='+uid,
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
                <h4 class="modal-title w-100 font-bold">Add New Equipment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-1">
                <!-- add form -->
               <form method="POST"  action="project_action.php">
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Name" type="text" id="form5" class="form-control" name="equip_Name" required="">
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <select class="browser-default form-control" name="unit_ID" style="  
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
                                $sql = mysqli_query($connection,"SELECT * FROM `unit`");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['unit_ID'];?>"> <?php echo $u['unit_Name'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                         <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Qty" type="number"  class="form-control number" name="equip_Qty" required="" lang="en" id="myinput" onkeyup="number(this);">
                        </div>
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit" class="btn btn-dark-green" name="submit-equipment">
                                 <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        </center>
                     </div>
                 </center>
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
                <h4 class="modal-title w-100 font-bold">Equipment View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-3">

                <div id="viewmodal-loader" style="display: none; text-align: center;">
                 <img src="img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="view-content"></div>
            
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">Equipment Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-3">

                <div id="editmodal-loader" style="display: none; text-align: center;">
                 <img src="img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="edit-content"></div>
            
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Are you sure you want to delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">

                <div id="deletemodal-loader" style="display: none; text-align: center;">
                 <img src="img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="delete-content"></div>
                
            
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Inventory Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
              <center>
                <form method="post" action="fpdf181/index.php" target="_blank">
                  
                  <label class="label">Date</label>
                   <input type="month" name="date" class="form-control">
                   <select name="type">
                     <option value="1">Year</option>
                     <option value="2">Month</option>
                   </select>
                   <br> 
                  <div class="btn-group">

                  <input class="btn btn-primary" type="submit" name="Print_inventory" value="Print Total Equipment">
                  <input class="btn btn-primary" type="submit" name="Print_usage_eq" value="Print Usage Equipment">
                  </div>
                </form>
                </center>
            
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalProjectEquipment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Add Project Usage Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
              <center>
                <form method="post" action="project_action.php" target="_blank">
                  <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <select class="browser-default form-control" name="proj_ID" style="  
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
                                <option value="" disabled selected>Choose project</option>
                                <?php 
                                $sql = mysqli_query($connection,"SELECT * FROM `project_monitoring` WHERE visibility = 1");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['proj_ID'];?>"> <?php echo $u['proj_Title'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <select class="browser-default form-control" name="equip_ID" style="  
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
                                <option value="" disabled selected>Choose equipment (Available)</option>
                                <?php 
                                $sql = mysqli_query($connection,"SELECT e.equip_ID,
e.equip_Name,
u.unit_Name,
e.equip_Quantity,
e.equip_Quantity - COALESCE(eu.usage_quantity, 0)+ (COALESCE(er.return_quantity, 0)) as available_quantity,
(COALESCE(eu.usage_quantity, 0)) - 
(COALESCE(er.return_quantity, 0))  usage_quantity,
COALESCE(er.return_quantity, 0) as return_quantity
FROM equipment e 
INNER JOIN unit u
ON u.unit_ID = e.unit_ID LEFT JOIN
(SELECT eu.equip_id, 
 SUM(eu.usage_Quantity) as usage_Quantity
FROM equipment_usage eu
GROUP BY eu.equip_ID
) eu
ON eu.equip_ID = e.equip_ID LEFT JOIN
(SELECT eu.equip_id, SUM(er.return_Quantity) as return_Quantity
FROM equipment_return er JOIN
equipment_usage eu
ON er.usage_ID = eu.usage_ID
GROUP BY eu.equip_id
) er
ON er.equip_ID = e.equip_ID ORDER BY e.equip_Name");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['equip_ID'];?>"> <?php echo $u['equip_Name']."(".$u['available_quantity'].")";?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                        <div class="col-6 col-md-6">

                            <i class="fa fa prefix grey-text"></i>
                           <input placeholder="Equipment Qty" type="number"  class="form-control number" name="Quantity" required="" lang="en" id="myinput1" onkeyup="number(this);">
                        </div>
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="addusage" value="Add Usage Equipment" >
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        
                        </center>
                    </div>
                </form>
                </center>
            
            </div>
        </div>
    </div>
</div>


<!-- <script>
var myinput = document.getElementById('myinput');
var myinput1 = document.getElementById('myinput1');

myinput.addEventListener('keyup', function() {
  var val = this.value;
  val = val.replace(/[^0-9\.]/g,'');
  
  if(val != "") {
    valArr = val.split('.');
    valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
    val = valArr.join('.');
  }
  
  this.value = val;
});
myinput1.addEventListener('keyup', function() {
  var val = this.value;
  val = val.replace(/[^0-9\.]/g,'');
  
  if(val != "") {
    valArr = val.split('.');
    valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
    val = valArr.join('.');
  }
  
  this.value = val;
});


</script> -->