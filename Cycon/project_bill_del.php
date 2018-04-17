<?php
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
	$id = $_REQUEST['id'];
?>

  <form method="POST" action="project_action.php?id=<?php echo $id?>" >
  	<div class="md-form row">
        <div class="col-12 col-md-12">
        	<center>
        	<div class="btn-group">
            <input type="submit" class="btn btn-warning" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger" name="del-boq-h" value="Delete">
           </div>
           </center>
        </div>
    </div>
  </
<?php

	}