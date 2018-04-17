<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){

	    $id = $_REQUEST['id'];
	   $mstone =  mysqli_query($connection,"SELECT * FROM `project_milestone` WHERE mstone_ID = $id");
	  $mstone =  mysqli_fetch_array($mstone);

		$mstone_Title = $mstone['mstone_Title'];
		$mstone_Percent = $mstone['mstone_Percent'];
		$mstone_DateStarted = $mstone['mstone_DateStarted'];
		$mstone_DateEnded = $mstone['mstone_DateEnded'];
		$status_ID = $mstone['status_ID'];
		
	?>

	  <!-- add form -->
                <form method="POST"  >
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Milestone Title" type="text" id="form5" class="form-control" name="mstone_Title" disabled="" value="<?php echo $mstone_Title ?>"></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Milestone Percent" type="text" id="form5" class="form-control" name="mstone_Percent"  disabled="" value="<?php echo $mstone_Percent ?>"></div>
                    </div>
                   
                   <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="mstone_DateStarted"  disabled="" value="<?php echo $mstone_DateStarted ?>"></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Date End" type="date" id="form5" class="form-control" name="mstone_DateEnded" disabled=""  value="<?php echo $mstone_DateEnded ?>"></div>
                    </div>
                    <div class="md-form row">
                    <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Date End" type="text" id="form5" class="form-control" name="mstone_DateEnded" disabled=""  value="<?php echo $status_ID ?>"></div>
                            
                        </div>
                        
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        
                        </center>
                    </div>
                </form>
                <!-- add form -->
	<?php
}
?>