<?php 
require_once('dbconfig.php');
if(isset($_POST['submit-project'])){
	
	$ProjectTitle = $_POST['ProjectTitle'];
	$ProjectOwner = $_POST['ProjectOwner'];
	$ProjectLocation = $_POST['ProjectLocation'];
	$ProjectCosting = $_POST['ProjectCosting'];
	$ProjectStart = $_POST['ProjectStart'];
	$ProjectEnd = $_POST['ProjectEnd'];
	$ProjectScope = $_POST['ProjectScope'];
	$ProjectHead = $_POST['ProjectHead'];

	$ProjectTitle = stripslashes($ProjectTitle);
	$ProjectOwner = stripslashes($ProjectOwner);
	$ProjectLocation = stripslashes($ProjectLocation);
	$ProjectCosting = stripslashes($ProjectCosting);
	$ProjectStart = stripslashes($ProjectStart);
	$ProjectEnd = stripslashes($ProjectEnd);
	$ProjectScope = stripslashes($ProjectScope);
	$ProjectHead = stripslashes($ProjectHead);

	$ProjectTitle = mysqli_real_escape_string($connection,$ProjectTitle);
	$ProjectOwner = mysqli_real_escape_string($connection,$ProjectOwner);
	$ProjectLocation = mysqli_real_escape_string($connection,$ProjectLocation);
	$ProjectCosting = mysqli_real_escape_string($connection,$ProjectCosting);
	$ProjectStart = mysqli_real_escape_string($connection,$ProjectStart);
	$ProjectEnd = mysqli_real_escape_string($connection,$ProjectEnd);
	$ProjectScope = mysqli_real_escape_string($connection,$ProjectScope);
	$ProjectHead = mysqli_real_escape_string($connection,$ProjectHead);

	$sql = "INSERT INTO `project_monitoring` (`proj_ID`, `proj_Title`, `proj_Owner`, `proj_Location`, `proj_Costing`, `proj_DateStarted`, `proj_DateEnded`, `proj_Scope`, `proj_Head`, `proj_Status`) VALUES ('','$ProjectTitle', '$ProjectOwner', '$ProjectLocation', '$ProjectCosting', '$ProjectStart', '$ProjectEnd', '$ProjectScope', '$ProjectHead', 'Ongoing');";
	mysqli_query($connection,$sql);
	// geting the last insert created account
	$last_id = mysqli_insert_id($con);
	echo "<script>alert('Successfully Added New Project !	');
										window.location='project_monitoring.php';
									</script>";



}
if(isset($_POST['submit-delete'])){
	$id = $_REQUEST['id'];

	$sql = "DELETE FROM `project_monitoring` WHERE `project_monitoring`.`proj_ID` = $id";
	mysqli_query($connection,$sql);
	echo "<script>alert('Successfully Delete Project !	');
										window.location='project_monitoring.php';
									</script>";

}

else{
	echo "<script>alert('Erro Occured!	');
										window.location='index.php';
									</script>";
}


?>