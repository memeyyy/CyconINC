<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
	 $id = $_REQUEST['id'];
	

?>
<form method="post" action="project_action.php?id=<?php echo $id?>" >
	<label>Number of Return</label>
	<input type="number" name="return">
	<input type="submit" name="submit-return" value="Submit" class="btn btn-primary  btn-sm" >
</form>
<?php

}
?> 