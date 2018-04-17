<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	echo $id = $pieces[0];
	echo $proj_ID = $pieces[1];
  
  $d1 = mysqli_query($connection,"SELECT * FROM `project_monitoring` where proj_ID = $proj_ID");
	$d1 = mysqli_fetch_array($d1);

$sql = mysqli_query($connection,"SELECT * FROM `boq_detail` where proj_ID = $proj_ID");

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
 while ($d =  mysqli_fetch_array($sql)) {
   ?>
    <tr>
      <td><?php echo $d[1]?></td>
      <td><?php echo $d[2]?></td>
      <td>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaladd_material" data-id="<?php echo $d[1]?>" id="add_material">Add</button>
      </td>
    </tr>
   <?php
  }
    ?>
  </tbody>
</table>


<?php 

  }//if isset end brace
  ?>


  <div class="modal fade" id="modaladd_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Add material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <center>
                    <form method="POST"  >
                      <div class="md-form row input_fields_wrap">
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Name" type="text" id="form5" class="form-control" name="equip_Name[]"  value="" >
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                          <select class="browser-default form-control" name="unit_ID[]" style="  
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
                            <input placeholder="Equipment Qty" type="text" id="form5" class="form-control" name="equip_Qty[]" value="" >
                        </div>
                      </div>
                    
                      <button class="add_field_button">Add More Fields</button>
                      <div><input type="text" name="item[]"></div>
                    </div>
                        <input class="btn btn-primary" type="submit" name="Print_Trans">
                    </form>
                </center>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  
  $(document).ready(function() {
    var max_fields      = 1000; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            //$(wrapper).append('<div><input type="text" name="item[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $(wrapper).append("<div class='md-form row'><div class='col-12 col-md-12'><i class='fa fa prefix grey-text'></i><input placeholder='Equipment Name' type='text' id='form5' class='form-control' name='equip_Name[]'  value="" ></div></div><div class='md-form row'><div class='col-6 col-md-6'><i class='fa fa prefix grey-text'></i><select class='browser-default form-control' name='unit_ID[]'' style='padding: 0;padding-bottom: 0.6rem;padding-top: 0.5rem;font-size: 1rem;line-height: 1.5;background-color: transparent;background-image: none;border-radius: 0;margin-top: 1rem;margin-left: 3rem;margin-bottom: 1rem;  ''><option value='' disabled selected>Choose your option</option> <?php $sql = mysqli_query($connection,'SELECT * FROM `unit`');while ($u = mysqli_fetch_array($sql)) { ?><option  value='<?php echo $u['unit_ID'];?>'> <?php echo $u['unit_Name'];?></option><?php
                                }
                                ?></select></div><div class='col-6 col-md-6'><i class='fa fa prefix grey-text'></i><input placeholder='Equipment Qty' type='text' id='form5' class='form-control' name='equip_Qty[]' value='' ></div></div>");
            
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>