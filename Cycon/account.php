
<?php 
    require_once('session.php');
    $page = "Account";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Account management</title>

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
                  <li class="breadcrumb-item active"> Account Management</li>
                </ol>
                </div>
                <!-- /.main-bar -->
            </header>
            <div class="card card-cascade narrower mt-5">

    <!--Card image-->
    <div class="view gradient-card-header aqua-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

        <h4 class="white-text font-bold font-up mb-0">Account management</h4>

    </div>
    <!--/Card image-->

    <div class="px-4">
<?php 
if ($level_session == 1 || $level_session == 4) {
?>
  <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalprint">Print</a>
<?php
}
else{
  ?>
  <a class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#modaladd">Add Account</a>
  <!-- <a class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#modalprint">Print</a> -->
  <?php
}
?>

        <!--Table-->
<table id="equipment_invent" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
    <thead class="mdb-color darken-3 text-white" >
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
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
            $u_q = mysqli_query($connection,"SELECT * FROM `user_account` ua
LEFT JOIN  user_level ul ON ua.level_ID = ul.level_ID");
            while ($u_fetch = mysqli_fetch_assoc($u_q)) {
              if ($u_fetch['level_ID'] == 4) {
                # //remove this if you want to display accouting staffs...
              }
              else{
                ?>
                <tr>
                    <td><?php echo $u_fetch['user_ID']?></td>
                    <td><?php echo $u_fetch['username']?></td>
                    <td><?php echo $u_fetch['password']?></td>
                    <td><?php echo $u_fetch['level_Name']?></td>
                    <td class="text-center">
                        <div class="btn-group" data-toggle="buttons">
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modalview" data-id="<?php echo $u_fetch['user_ID']; ?>" id="viewAcc"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button>
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $u_fetch['user_ID']; ?>" id="editAcc"><i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaldelete" data-id="<?php echo $u_fetch['user_ID']; ?>" id="deleteAcc"><i class="fa fa-close" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete"></i></button>
                        </div>
                    </td>
                </tr>
                <?php
                }
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
    $(document).on('click', '#viewAcc', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#view-content').html(''); // leave it blank before ajax call
    $('#viewmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'account_View.php',
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
    $(document).on('click', '#editAcc', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#edit-content').html(''); // leave it blank before ajax call
    $('#editmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'account_Edit.php',
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

  $(document).on('click', '#deleteAcc', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#delete-content').html(''); // leave it blank before ajax call
    $('#deletemodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'account_Delete.php',
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
                <h4 class="modal-title w-100 font-bold">Add New Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body mx-1">
                <!-- add form -->
               <form method="POST"  action="project_action.php" runat="server" enctype="multipart/form-data">
                    <div class="md-form row">
                      <div class="col-6 col-md-6">
                         <i class="fa fa prefix grey-text"></i>
                     <input type="file" name="imagex"  class="form-control inputFile" style="width:300px" id="imgInp"/>
                        </div>
                         <div class="col-6">
                          <img id="blah" src="#" alt="your image" style="border-radius: 50%; " width="80" height="80" />
                        </div>
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Username" type="text" id="form5" class="form-control" name="username" required="">
                        </div>
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Password" type="password" id="form5" class="form-control" name="password" required="">
                        </div>
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Password" type="password" id="form5" class="form-control" name="re-password" required="">
                        </div>
                    </div>

                     <div class="md-form row">

                        <div class="col-4 col-md-4">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="First Name" type="text" id="form5" class="form-control" name="fname" required="">
                        </div>

                        <div class="col-4 col-md-4">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Middle Name" type="text" id="form5" class="form-control" name="mname" required="">
                        </div>

                        <div class="col-4 col-md-4">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Last Name" type="text" id="form5" class="form-control" name="lname" required="">
                        </div>
                     </div>

                     <div class="md-form row">

                        <div class="col-8 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Address" type="text" id="form5" class="form-control" name="address" required="">
                        </div>

                        <div class="col-4 col-md-2">

                            <p style="margin-top: 30px;">Birth Day</p>
                        </div>

                        <div class="col-4 col-md-4">
                            <input placeholder="" type="date" id="form5" class="form-control" name="bday" required="">
                        </div>
                     </div>
                     <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <select class="browser-default form-control" name="gender" style="  
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
  margin-bottom: 1rem; width: 280px; ">
                                <option value="" disabled selected>Choose gender option</option>
                                <?php 
                                $sql = mysqli_query($connection,"SELECT * FROM `gender`");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['0'];?>"> <?php echo $u['1'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                         <div class="col-6 col-md-6">
                           <input placeholder="Email" type="email" id="form5" class="form-control" name="email" required="">
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <select class="browser-default form-control" name="level_ID" style="  
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
                                <option value="" disabled selected>Choose account level</option>
                                <?php 
                                $sql = mysqli_query($connection,"SELECT * FROM `user_level`");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['level_ID'];?>"> <?php echo $u['level_Name'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                         <div class="col-6 col-md-6">

                        </div>
                    </div>

                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit" class="btn btn-dark-green" name="submit-account">
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
                <h4 class="modal-title w-100 font-bold">Account View</h4>
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
                <h4 class="modal-title w-100 font-bold">Account Edit</h4>
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

<!-- 
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
                  <input class="btn btn-primary" type="submit" name="Print_inventory" value="Print">
                </form>
                </center>
            
            </div>
        </div>
    </div>
</div> -->

 <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });

    </script>