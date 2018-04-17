<?php 
require_once('dbconfig.php');
$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	$id = $pieces[0];
	$proj_ID = $pieces[1];

$name = $_POST['name'];


mysqli_query($connection,"UPDATE `boq_detail` SET `boqdet_Descr` = '$name' WHERE `boq_detail`.`boqdet_ID` = $id AND `proj_ID` = $proj_ID");

echo "<script>alert('Bill Of Quantity Detail Updated!	');
										window.location='project_transaction';
									</script>";
?>
