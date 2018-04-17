<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	 $id = $pieces[0];
	 $proj_ID = $pieces[1];
  
  $d1 = mysqli_query($connection,"SELECT * FROM `project_monitoring` where proj_ID = $proj_ID");
	$d1 = mysqli_fetch_array($d1);

$sql = mysqli_query($connection,"SELECT * FROM `boq_detail` where proj_ID = $proj_ID");

function numberToRomanRepresentation($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

$sql3 = mysqli_query($connection,"SELECT * FROM `purchase_order` WHERE proj_ID  = $proj_ID");
$po = mysqli_fetch_array($sql3);
$po['po_ID'];
if ($po['po_lock'] == 1) {
  ?>
  <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalprint">Print</a>
  <a class="btn btn-primary float-right" data-toggle="modal" data-target="#payment" id="payment1" data-id="<?php echo $_REQUEST['id']?>">Payment</a>
  <?php
}
else{
  ?>

<form method="POST" action="project_action.php?proj_ID=<?php echo $proj_ID?>&id=<?php echo $id?>">
        <div class="btn-group float-right">
        <input type="submit" class="btn btn-primary float-right btn-sm" name="submit-boq-lock" value="LOCK BOQ">
        </input>
<a class="btn btn-primary float-right btn-sm"  data-toggle="modal"  data-target="#add_boq" id="a">Add Bill of Quantity</a>
        </div>
        </form>
        <br><br><br>
  <?php
}
?>


<h4 align="center"><?php echo $d1[1]?></h4>
<table class="table">
  <thead>
    <tr>
      <th>Description</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </tfoot>
  <tbody>
    <?php
    $a =1;
 while ($d =  mysqli_fetch_array($sql)) {

   ?>
    <tr>
      <td><?php echo numberToRomanRepresentation($a).".) ".$d[1];?></td>
      <td><?php echo number_format($d[2])?></td>
      <td>
        <div class="btn-group">
          <?php 
          if ($po['po_lock'] == 1) {
            ?>
            <button type="button" class="btn btn-warning  btn-sm" >Disable</button>
            <?php
          }
          else{
            ?>
            
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaladd_boqadd" data-id="<?php echo $d[0].",".$proj_ID?>" id="add_material">Add List</button>
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit_boq" data-id="<?php echo $d[0].",".$proj_ID?>" id="edit_material">Edit</button>
            <input class="btn btn-danger btn-sm" type="submit" name="delete_boq" data-toggle="modal" data-target="#modaldel_boq" data-id="<?php echo $d[0].",".$proj_ID?>" id="delete_bmaterial" value="Delete">
                        </div>
            <?php
          }

          ?>
        
      </td>
    </tr>
   <?php
   $a++;
  }
    ?>
  </tbody>
</table>


<?php 

  }//if isset end brace
  ?>


  <div class="modal fade" id="modaladd_boqadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Add material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div id="boqaddmodal-loader" style="display: none; text-align: center;">
                    <img src="img/ajax_load.gif">
                </div>

                <!-- content will be load here -->
                <div id="boqadd-content"></div>


            </div>
        </div>
    </div>
</div>


  
<script type="text/javascript">
   $(document).ready(function() {

                $(document).on('click', '#add_material', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#boqadd-content').html(''); // leave it blank before ajax call
                    $('#boqaddmodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_transaction_boq.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#boqadd-content').html('');
                            $('#boqadd-content').html(data); // load response 
                            $('#boqaddmodal-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#boqadd-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#boqaddmodal-loader').hide();
                        });

                });
  $(document).on('click', '#edit_material', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#boqedit-content').html(''); // leave it blank before ajax call
                    $('#boqeditmodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_transaction_boq_edit.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#boqedit-content').html('');
                            $('#boqedit-content').html(data); // load response 
                            $('#boqedit-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#boqedit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#boqedit-loader').hide();
                        });

                });
                $(document).on('click', '#payment1', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#payment-content').html(''); // leave it blank before ajax call
                    $('#paymentmodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_payment.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#payment-content').html('');
                            $('#payment-content').html(data); // load response 
                            $('#paymentmodal-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#payment-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#paymentmodal-loader').hide();
                        });

                });

                 $(document).on('click', '#delete_bmaterial', function(e) {

                    e.preventDefault();

                    var uid = $(this).data('id'); // it will get id of clicked row

                    $('#delete_b-content').html(''); // leave it blank before ajax call
                    $('#delete_bmodal-loader').show(); // load ajax loader

                    $.ajax({
                            url: 'project_bill_del.php',
                            type: 'POST',
                            data: 'id=' + uid,
                            dataType: 'html'
                        })
                        .done(function(data) {
                            console.log(data);
                            $('#delete_b-content').html('');
                            $('#delete_b-content').html(data); // load response 
                            $('#delete_bmodal-loader').hide(); // hide ajax loader 
                        })
                        .fail(function() {
                            $('#delete_b-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                            $('#delete_bmodal-loader').hide();
                        });

                });


});


</script>


<div class="modal fade" id="add_boq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Add Bill Of Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <center>
                    <form method="post" action="project_action.php?proj_ID=<?php echo $proj_ID?>" >
                      <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Description" type="text" id="form5" class="form-control" name="Description"  value="" >
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Amount" type="number" id="myinput" class="form-control" name="amount"  value="" >
                        </div>
                    </div>
                        <input class="btn btn-primary" type="submit" name="add_boq">
                      
                    </form>
                </center>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaledit_boq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Edit Bill Of Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                 <div id="boqedit-loader" style="display: none; text-align: center;">
                    <img src="img/ajax_load.gif">
                </div>

                <!-- content will be load here -->
                <div id="boqedit-content"></div>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaldel_boq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Delete this Bill Of Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                 <div id="delete_bmodal-loader" style="display: none; text-align: center;">
                    <img src="img/ajax_load.gif">
                </div>

                <!-- content will be load here -->
                <div id="delete_b-content"></div>


            </div>
        </div>
    </div>
</div>
<!-- 
  $(document).ready(function() {
    var max_fields      = 1000; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            var unit_array = <?php echo $unit_array; ?>;
           
            x++; //text box increment
            var option = "";
            for (i = 0; i < unit_array.length; i++) { 
                var slitval = unit_array[i].split(",");
                var opVal = slitval[0];
                var opText = slitval[1];
                option +="<option value="+opVal+">"+opText+ "</option>";
                
            }
             $(wrapper).append("<div><div class='md-form row'><div class='col-12 col-md-12'><i class='fa fa prefix grey-text'></i><input placeholder='Equipment Name' type='text' id='form5' class='form-control' name='item[]'  value='' ></div></div><div class='md-form row'><div class='col-12 col-md-12'><i class='fa fa prefix grey-text'></i><input placeholder='Amount' type='text' id='form5' class='form-control' name='amount[]'  value='' ></div></div><div class='md-form row'><div class='col-6 col-md-6'><i class='fa fa prefix grey-text'></i><select name='unit[]' class='browser-default form-control' style='padding: 0;padding-bottom: 0.6rem;padding-top: 0.5rem;font-size: 1rem;line-height: 1.5;background-color: transparent;background-image: none;border-radius: 0;margin-top: 1rem;margin-left: 3rem; margin-bottom: 1rem;  '  >"+ option + "</select></div><div class='col-6 col-md-6'><i class='fa fa prefix grey-text'></i><input placeholder='Equipment Qty' type='text' id='form5' class='form-control' name='qty[]' value='' ></div></div></div>"); 
            // <a href='#'' class='remove_field'>Remove</a>
            
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
}); -->
<!-- 
  <form method="POST" action="project_action.php?proj_ID=<?php echo $proj_ID?>" >
                      <div class="md-form row input_fields_wrap">
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Name" type="text" id="form5" class="form-control" name="item[]"  value="" >
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Amount" type="text" id="form5" class="form-control" name="amount[]"  value="" >
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                          <select class="browser-default form-control" name="unit[]" style="  
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

                                $unit_array  = array();
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['unit_ID']; $unit_array[] = $u['unit_ID'].",".$u['unit_Name']?>"> <?php echo $u['unit_Name'];?></option>
                                   <?php
                                }
                                $unit_array = json_encode($unit_array);
            
                                ?>
                            </select>
                            
                        </div>
                         <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Qty" type="text" id="form5" class="form-control" name="qty[]" value="" >
                        </div>
                      </div>
                    
                      
                    </div>
                    <button class="btn btn-primary add_field_button">Add More Fields</button>
                        <input class="btn btn-primary" type="submit" name="boq_material">
                    </form> -->

<div class="modal fade" id="modalprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Transaction Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <center>
                    <form method="post" action="fpdf181/index.php?proj_ID=<?php echo $proj_ID?>" target="_blank">
                      <!-- <input type="month" name="date" class="form-control"> -->
                   <br> 
                        <input class="btn btn-primary" type="submit" name="Print_Trans">
                    </form>
                </center>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Purchase Order Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div id="paymentmodal-loader" style="display: none; text-align: center;">
                    <img src="img/ajax_load.gif">
                </div>

                <!-- content will be load here -->
                <div id="payment-content"></div>


            </div>
        </div>
    </div>
</div>

