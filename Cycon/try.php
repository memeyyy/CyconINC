<?php 
include('dbconfig.php');
if (isset($_POST['submit'])) {

	$item = $_POST['item'];
		foreach( $item as $v ) {
	print $v;
	}

    $amount = $_POST['amount'];
        foreach( $amount as $v ) {
    print $v;
    }
    $unit = $_POST['unit'];
        foreach( $unit as $v ) {
    print $v;
    }
    $qty = $_POST['qty'];
        foreach( $qty as $v ) {
    print $v;
    }
}

?>


<!-- <form method="post">

	<div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="item[]"></div>
    <div><input type="text" name="amount[]"></div>
    <div>
        <select name="unit[]">
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
            echo $pieces = explode(",", $unit_array);

            ?>
        </select>
    </div>

    <div><input type="text" name="qty[]"></div>
	</div>

	<input type="submit" name="submit">
</form> -->

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

                                $unit_array  = array();
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['unit_ID']; $unit_array[] = $u['unit_ID'].",".$u['unit_Name']?>?>"> <?php echo $u['unit_Name'];?></option>
                                   <?php
                                }
                                $unit_array = json_encode($unit_array);
            
                                ?>
                            </select>
                            
                        </div>
                         <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Qty" type="text" id="form5" class="form-control" name="equip_Qty[]" value="" >
                        </div>
                      </div>
                    
                      
                    </div>
                    <button class="btn btn-primary add_field_button">Add More Fields</button>
                        <input class="btn btn-primary" type="submit" name="Print_Trans">
                    </form>
    <?php
    include ('admin_footer.php');
    include ('general_script.php');
    ?>
<script type="text/javascript">
	
	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
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
});
</script>


