<?php 
require_once('dbconfig.php');
/*
ADD NEW PROJECT
FUNCTION
*/
if(isset($_POST['submit-project'])){
	
	$ProjectTitle = $_POST['ProjectTitle'];
	$ProjectOwner = $_POST['ProjectOwner'];
	$ProjectLocation = $_POST['ProjectLocation'];
	$ProjectStart = $_POST['ProjectStart'];
	$ProjectEnd = $_POST['ProjectEnd'];
	$ProjectScope = $_POST['ProjectScope'];
	$ProjectHead = $_POST['ProjectHead'];

	$ProjectTitle = stripslashes($ProjectTitle);
	$ProjectOwner = stripslashes($ProjectOwner);
	$ProjectLocation = stripslashes($ProjectLocation);
	$ProjectStart = stripslashes($ProjectStart);
	$ProjectEnd = stripslashes($ProjectEnd);
	$ProjectScope = stripslashes($ProjectScope);
	$ProjectHead = stripslashes($ProjectHead);

	$ProjectTitle = mysqli_real_escape_string($connection,$ProjectTitle);
	$ProjectOwner = mysqli_real_escape_string($connection,$ProjectOwner);
	$ProjectLocation = mysqli_real_escape_string($connection,$ProjectLocation);
	$ProjectStart = mysqli_real_escape_string($connection,$ProjectStart);
	$ProjectEnd = mysqli_real_escape_string($connection,$ProjectEnd);
	$ProjectScope = mysqli_real_escape_string($connection,$ProjectScope);
	$ProjectHead = mysqli_real_escape_string($connection,$ProjectHead);




	$sql ="INSERT INTO `project_monitoring` 
(`proj_ID`,
 `proj_Title`,
  `proj_Owner`,
   `proj_Location`,
     `proj_DateStarted`,
      `proj_DateEnded`,
       `proj_Scope`,
        `proj_Head`,
         `status_ID`) 
VALUES (NULL,
 '$ProjectTitle',
  '$ProjectOwner',
   '$ProjectLocation',
    '$ProjectStart',
     '$ProjectEnd',
      '$ProjectScope',
       '$ProjectHead',
         3)";
	mysqli_query($connection,$sql);
	// geting the last insert created account
	$last_id = mysqli_insert_id($connection);
	$sql = "INSERT INTO `purchase_order` (`po_ID`, `po_ORNum`, `proj_ID`, `po_Date`, `status_ID`, `po_lock`) VALUES (NULL, '', '$last_id', CURRENT_TIMESTAMP, 3, NULL);";


	mysqli_query($connection,$sql);

	echo "<script>alert('Successfully Added New Project & Project Order!	');
										window.location='project_monitoring';
									</script>";



}
/*
UPDATE PROJECT
FUNCTION
*/
if (isset($_POST['update-project'])) {

	$id = $_REQUEST['id'];
	$ProjectTitle = $_POST['ProjectTitle'];
	$ProjectOwner = $_POST['ProjectOwner'];
	$ProjectLocation = $_POST['ProjectLocation'];
	$ProjectStart = $_POST['ProjectStart'];
	$ProjectEnd = $_POST['ProjectEnd'];
	$ProjectScope = $_POST['ProjectScope'];
	$ProjectHead = $_POST['ProjectHead'];
	$proj_Expenses = $_POST['proj_Expenses'];

	$ProjectTitle = stripslashes($ProjectTitle);
	$ProjectOwner = stripslashes($ProjectOwner);
	$ProjectLocation = stripslashes($ProjectLocation);
	$ProjectStart = stripslashes($ProjectStart);
	$ProjectEnd = stripslashes($ProjectEnd);
	$ProjectScope = stripslashes($ProjectScope);
	$ProjectHead = stripslashes($ProjectHead);
	$proj_Expenses = stripslashes($proj_Expenses);

	$ProjectTitle = mysqli_real_escape_string($connection,$ProjectTitle);
	$ProjectOwner = mysqli_real_escape_string($connection,$ProjectOwner);
	$ProjectLocation = mysqli_real_escape_string($connection,$ProjectLocation);
	$ProjectStart = mysqli_real_escape_string($connection,$ProjectStart);
	$ProjectEnd = mysqli_real_escape_string($connection,$ProjectEnd);
	$ProjectScope = mysqli_real_escape_string($connection,$ProjectScope);
	$ProjectHead = mysqli_real_escape_string($connection,$ProjectHead);
	$proj_Expenses = mysqli_real_escape_string($connection,$proj_Expenses);



	// geting the last insert created account
	$sql = "UPDATE `project_monitoring` SET 
	`proj_Title`= '$ProjectTitle',
	`proj_Owner` = '$ProjectOwner',
`proj_Location` = '$ProjectLocation',
`proj_DateStarted` = '$ProjectStart',
`proj_DateEnded` = '$ProjectEnd',
`proj_Scope` = '$ProjectScope',
`proj_Head` = '$ProjectHead',
`proj_Expenses` = '$proj_Expenses' 

WHERE `project_monitoring`.`proj_ID` = $id;";

	mysqli_query($connection,$sql);
	echo "<script>alert('Update Project');
										window.location='project_monitoring';
									</script>";
	
}
/*
ADD EQUIPMENT USAGE
FUNCTION
*/
if (isset($_POST['addusage'])) {
	
echo $proj_ID = $_POST['proj_ID'];
echo $equip_ID = $_POST['equip_ID'];
echo $Quantity= $_POST['Quantity'];

$sql = mysqli_query($connection,"SELECT * FROM `equipment` WHERE equip_ID = $equip_ID");
$d = mysqli_fetch_array($sql);
$available = $d['equip_Quantity']  -$Quantity;
if ($available <0 ) {
	echo "<script>alert('Equipment Out of Stock');
										window.location='project_warehouse';
									</script>";
}
else{
	mysqli_query($connection,"INSERT INTO `equipment_usage` 
	(`usage_ID`, 
	`equip_ID`,
	 `proj_ID`, 
	 `usage_Quantity`)
	  VALUES (
	  NULL, 
	  $equip_ID,
	   $proj_ID,
	    $Quantity);");
	echo "<script>alert('Equipment Usage Added to Project');
										window.close();
									</script>";
}

} 
/*
DELETE PARENT PROJECT
FUNCTION
*/
if(isset($_POST['submit-delete'])){
	$id = $_REQUEST['id'];
	$delete_type = $_POST['delete_type'];
	// $sql = "DELETE FROM `equipment_usage` WHERE `equipment_usage`.`proj_ID` =$id";
	// mysqli_query($connection,$sql);
	// $sql = "DELETE FROM `purchase_order` WHERE `purchase_order`.`proj_ID` =$id";
	// mysqli_query($connection,$sql);

	// $sql = "DELETE FROM `boq_material_list` WHERE `boq_material_list`.`proj_ID` =$id";
	// mysqli_query($connection,$sql);
	// $sql = "DELETE FROM `purchase_order` WHERE `purchase_order`.`proj_ID` = $id";
	// mysqli_query($connection,$sql);
	
	// $sql = "DELETE FROM `project_milestone` WHERE `project_milestone`.`proj_ID` = $id";
	// mysqli_query($connection,$sql);

	// $sql = "DELETE FROM `project_monitoring` WHERE `project_monitoring`.`proj_ID` = $id";
	// mysqli_query($connection,$sql);

	$sql = "UPDATE `project_monitoring` SET `visibility` = $delete_type WHERE `project_monitoring`.`proj_ID` =$id";
	mysqli_query($connection,$sql);
	$sql = "UPDATE `purchase_order` SET `visibility` = $delete_type WHERE `purchase_order`.`po_ID` = =$id;";
	mysqli_query($connection,$sql);
	echo "<script>alert('Successfully Delete Project !	');
										window.location='project_monitoring';
									</script>";


}
/*
ADD NEW EQUIPMENT
FUNCTION
*/
if (isset($_POST['submit-equipment'])) {
	$equip_Name = $_POST['equip_Name'];
	$unit_ID = $_POST['unit_ID'];
	$equip_Qty = $_POST['equip_Qty'];

	$sql = mysqli_query($connection,"SELECT * FROM equipment WHERE equip_Name LIKE '$equip_Name'");
	$u = mysqli_fetch_array($sql);
		$v_equip_ID = $u['equip_ID'];
		$v_equip_Name = $u['equip_Name'];
		$v_equip_Quantity = $u['equip_Quantity'];
		$v_equip_Quantity += $equip_Qty;
	if ($v_equip_Name == $equip_Name) 
	{
		mysqli_query($connection,"UPDATE `equipment` SET `equip_Quantity` = '$v_equip_Quantity' WHERE `equipment`.`equip_ID` = $v_equip_ID;");
		mysqli_query($connection,"INSERT INTO `equipment_added` (`eadd_ID`, `equip_ID`, `eadd_Quantity`, `eadd_Date`) VALUES (NULL, '$v_equip_ID', '$v_equip_Quantity', CURRENT_TIMESTAMP)");
		echo "<script>alert('This equipment exits!, add quantity only');
										window.location='project_warehouse';
									</script>";
		exit();							
	}
	else{
		mysqli_query($connection,"INSERT INTO `equipment` (`equip_ID`, `equip_Name`, `equip_Quantity`, `unit_ID`) VALUES (NULL, '$equip_Name', '$equip_Qty', '$unit_ID');");
		$last_id = mysqli_insert_id($connection);
		mysqli_query($connection,"INSERT INTO `equipment_added` (`eadd_ID`, `equip_ID`, `eadd_Quantity`, `eadd_Date`) VALUES (NULL, '$last_id', '$equip_Qty', CURRENT_TIMESTAMP)");
		echo "<script>alert(' Unique equipment Added!	');
										window.location='project_warehouse';
									</script>";
		exit();							
	}	
	
}
/*
DELETE EQUIPMENT
FUNCTION
*/
if (isset($_POST['submit-eq-delete'])) {
	$id = $_REQUEST['id'];
	
	mysqli_query($connection,"DELETE FROM `equipment_added` WHERE `equipment_added`.`equip_ID` =  $id");
	mysqli_query($connection,"DELETE FROM `equipment_usage` WHERE `equip_ID` = $id");
	mysqli_query($connection,"DELETE FROM `equipment` WHERE `equipment`.`equip_ID` = $id");
	echo "<script>alert(' delete equipment	');
										window.location='project_warehouse';
									</script>";
	exit();								
}
/*
UPDATE EQUIPMENT
FUNCTION
*/
if (isset($_POST['submit-equip-update'])) {
	$id = $_REQUEST['id'];
	$equip_Name = $_POST['equip_Name'];
	$unit_ID = $_POST['unit_ID'];
	$equip_Qty = $_POST['equip_Qty'];
	mysqli_query($connection,"UPDATE `equipment` SET `equip_Name` = '$equip_Name', `equip_Quantity` = '$equip_Qty', `unit_ID` = '$unit_ID' WHERE `equipment`.`equip_ID` = $id");
	echo "<script>alert(' Equipment	Successfully Updated');
										window.location='project_warehouse';
									</script>";
	exit();								
}
/*DELETE MILESTONE PROJECT
FUNCTION
*/
if (isset($_POST['submit-delete-milestone'])) {
	$id = $_REQUEST['id'];
	 $proj_ID = $_REQUEST['proj_ID'];
	mysqli_query($connection,"DELETE FROM `project_milestone` WHERE `project_milestone`.`mstone_ID` = $id");
	echo "<script>alert('Successfully Milestone Delete');
										window.location='project_Monitoring_Edit?proj_ID=$proj_ID';
									</script>";
	exit();								
}
/*
ADD NEW PROJECT
FUNCTION
*/
if (isset($_POST['submit-milestone'])) {

	$proj_ID = $_REQUEST['proj_ID'];
	$mstone_Percent = $_POST['mstone_Percent'];

	$total_mstone = mysqli_query($connection,"SELECT SUM(mstone_Percent) sum FROM `project_milestone` WHERE proj_ID = $proj_ID");
            $total_mstone = mysqli_fetch_array($total_mstone);
            $total_mstone = $total_mstone['sum'];
            $temp = $total_mstone + $mstone_Percent; 
            if ($temp > 100) {
            	echo "<script>alert('You Exceed The Maximum Percentage Total Percentage Of You Submission is $temp%');
										window.location='project_Monitoring_Edit?proj_ID=$proj_ID';
									</script>";
            }
            else{

	$mstone_Title = $_POST['mstone_Title'];
	$mstone_DateStarted = $_POST['mstone_DateStarted'];
	$mstone_DateEnded = $_POST['mstone_DateEnded'];
	mysqli_query($connection,"INSERT INTO `project_milestone` (`proj_ID`, `mstone_ID`, `mstone_Title`, `mstone_Percent`, `mstone_DateStarted`, `mstone_DateEnded`) VALUES ('$proj_ID', NULL, '$mstone_Title', '$mstone_Percent', '$mstone_DateStarted', '$mstone_DateEnded')");
	echo "<script>alert('Successfully Added New Milestone');
										window.location='project_Monitoring_Edit?proj_ID=$proj_ID';
									</script>";
            }
	exit();								

}
/*
UPDATE MILESTONE OF THE PROJECT
FUNCTION
*/
if (isset($_POST['update-milestone'])) {
	$id = $_REQUEST['id'];
	$proj_ID = $_REQUEST['proj_ID'];
	$mstone_Title = $_POST['mstone_Title'];
	$mstone_Percent = $_POST['mstone_Percent'];
	$mstone_DateStarted = $_POST['mstone_DateStarted'];
	$mstone_DateEnded = $_POST['mstone_DateEnded'];
	// $status_ID = $_POST['status_ID'];
	// if (empty($status_ID)) {
	// 	$status_ID = 3;
	// }
	mysqli_query($connection,"UPDATE `project_milestone` 
		SET `mstone_Title` = '$mstone_Title',
		 `mstone_Percent` = '$mstone_Percent',
		  `mstone_DateStarted` = '$mstone_DateStarted',
		   `mstone_DateEnded` = '$mstone_DateEnded'
		   WHERE `mstone_ID` = '$id'");
	echo "<script>alert('Successfully Updated Milestone');
										window.location='project_Monitoring_Edit?proj_ID=$proj_ID';
									</script>";

}
/*
ADD BILL OF QUANTITY
FUNCTION
*/
if (isset($_POST['submit-boq'])) {
	$proj_ID = $_REQUEST['proj_ID'];
	$material_Name = $_POST['material_Name'];
	$unit_ID = $_POST['unit_ID'];
	$material_Qty = $_POST['material_Qty'];

	
	mysqli_query($connection,"INSERT INTO `boq_material_list` (`boq_ID`, `proj_ID`, `material_Name`, `unit_ID`, `material_Qty`, `material_Price`) VALUES (NULL, '$proj_ID', '$material_Name', '$unit_ID', '$material_Qty', '$material_Price')");

	echo "<script>alert('ADD BOQ');
	window.location='project_transaction.php';
									</script>";

}
/*
SUBMIT BOQ/PURCHASE ORDER LOCK
FUNCTION
*/
if (isset($_POST['submit-boq-lock'])) {
	 $proj_ID = $_REQUEST['proj_ID'];
	 $id =  $_REQUEST['id'];
	mysqli_query($connection,"UPDATE `purchase_order` SET `po_lock` = '1' WHERE `purchase_order`.`po_ID` = $id");
	$boq_sum = mysqli_query($connection,"SELECT sum(boqdet_Amount) as sum FROM `boq_detail`  WHERE proj_ID = $proj_ID");
    $boq_sum = mysqli_fetch_array($boq_sum);
$sum = $boq_sum['sum'];
	$Downpayment =  ($sum * 0.30);
	$Progressbilling = ($sum * 0.60);
	$Retention =  ($sum * 0.10);
	mysqli_query($connection,"UPDATE `project_monitoring` SET `proj_Costing` = '$sum' WHERE `project_monitoring`.`proj_ID` = $proj_ID");
	

	mysqli_query($connection,"INSERT INTO `purchase_transaction` (`pt_ID`, `po_ID`, `pt_amount`, `pt_date`, `term_ID`, `status_ID`) VALUES (NULL, '$id', '$Downpayment',  CURRENT_TIMESTAMP, 1, 1)");


	echo "<script>alert('BOQ LOCK');
	window.location='project_transaction.php';
									</script>";
}
/*
RECEIVE DOWN PAYMENT
FUNCTION
*/
if (isset($_POST['receive-project-down'])) {
	 $id = $_REQUEST['id'];
	 // $pieces = explode(",", $id);
	 // $id = $pieces[0];
	 // $proj_ID = $pieces[1];
	 

	$pt_ID = mysqli_query($connection,"UPDATE `purchase_transaction` SET `status_ID` = '2' WHERE `purchase_transaction`.`pt_ID` = $id");
	
	
	echo "<script>alert('Project Downpayment Rceived!	');
										window.location='project_transaction.php';
									</script>";

}
/*
ADD NEW ACCOUNT
FUNCTION
*/
if (isset($_POST['submit-account'])) {
	 $username =  $_POST['username'];
	$pass = $_POST['password'];
	$repass = $_POST['re-password'];
	$level_ID = $_POST['level_ID'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$bday = $_POST['bday'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	 $imagename = mysqli_real_escape_string($connection,$_FILES["imagex"]["name"]);
	$imagedata = mysqli_real_escape_string($connection,file_get_contents($_FILES["imagex"]["tmp_name"]));
	 $imageType = mysqli_real_escape_string($connection,$_FILES["imagex"]["type"]);
	if ($pass == $repass) {
	mysqli_query($connection,"INSERT INTO `user_account` (`user_ID`, `username`, `password`, `level_ID`, `user_created`) 
		VALUES (NULL, $username, $pass, $level_ID, NULL);");

	$last_id = mysqli_insert_id($connection);
mysqli_query($connection,"INSERT INTO `user_detail` (`detail_ID`, `user_ID`, `detail_img`, `detail_Fname`, `detail_Mname`, `detail_Lname`, `gender_ID`, `detail_email`, `detail_address`, `detail_dob`) VALUES (NULL, '$last_id', '$imagedata', '$fname', '$mname', '$lname', '$gender', '$email', '$address', '$bday')");
	echo "<script>alert('Successfully Added!	');
										window.location='account';
									</script>";
	}
	else{
		echo "<script>alert('Password Not match!	');
										window.location='account';
									</script>";
	}
	

}
/*
DELETE ACCOUNT
FUNCTION
*/
if (isset($_POST['submit-delete-account'])) {
	$accID = $_REQUEST['id'];
	mysqli_query($connection,"DELETE FROM `user_account` WHERE `user_account`.`user_ID` = $accID");
	echo "<script>alert('Successfully Deleted!	');
										window.location='account';
									</script>";
	exit();
}
/*
SUBMIT ACCOUNT EDIT/UPDATE
FUNCTION
*/
if (isset($_POST['submit-account-edit'])) {
	$accID = $_REQUEST['id'];
	$pass = $_POST['password'];
	$repass = $_POST['re-password'];
	$level_ID = $_POST['level_ID'];
	if($pass == $repass){
		mysqli_query($connection,"UPDATE `user_account` SET password = '$pass',
				`level_ID` =  '$level_ID' WHERE 
				`user_ID` = '$accID'");
		;
	}
	echo "<script>alert('Successfully Updated!	');
										window.location='account';
									</script>";
	exit();
}
/*
SUBMIT TRANSACTION
FUNCTION
*/
if (isset($_POST['submit_transaction'])) {



$p_id =  $_REQUEST['proj_ID'];
$po_ID = $_REQUEST['po_ID'];

$sql = mysqli_query($connection,"SELECT proj_costing FROM `project_monitoring` WHERE proj_ID = '".$p_id."' ");
$projc = mysqli_fetch_array($sql);
$proj_costing  = $projc['proj_costing'];

$Downpayment =  ($proj_costing * 0.30);
$Progressbilling = ($proj_costing * 0.60);
$Retention =  ($proj_costing * 0.10);

echo "Total cost: ".$proj_costing."<br>"; 
echo "Downpayment cost: ".$Downpayment."<br>";
echo "Progressbilling cost: ".$Progressbilling."<br>";
echo "Retention cost: ".$Retention."<br>";
$pt_down = mysqli_query($connection,"SELECT SUM(pt_amount) AS pt_amount FROM `purchase_transaction` WHERE po_ID = '".$po_ID."' AND term_ID = 1 AND status_ID = 2");
$pt_down_stat = mysqli_fetch_array($pt_down);


$user_amount = 500;
echo "<br>";
//check if downpayment percentage is = to payment receive
if ($Downpayment == $pt_down_stat['pt_amount'] ) {
	// if downpayment was done 
	//process to process billing
	$Downpayment_percent =  100;
	$pt_pbill = mysqli_query($connection,"SELECT SUM(pt_amount) AS pt_amount FROM `purchase_transaction` WHERE po_ID = '".$po_ID."' AND term_ID = 2 AND status_ID = 2");
	$pt_pbill_stat = mysqli_fetch_array($pt_pbill);
	echo "<br>";
	if ($Progressbilling == $pt_pbill_stat['pt_amount'] ) {
		//if progress billing was done display 
		//process to retention payment
		$Progressbilling_percent =  100;

		$pt_retention = mysqli_query($connection,"SELECT SUM(pt_amount) AS pt_amount FROM `purchase_transaction` WHERE po_ID = '".$po_ID."' AND term_ID = 3 AND status_ID = 2");

		$pt_retention_stat = mysqli_fetch_array($pt_retention);
		if ($Retention == $pt_retention_stat['pt_amount']){
			$Retention_percent =  100;
			echo "update po to done";
			//UPDATE `purchase_order` SET `status_ID` = '4' WHERE `purchase_order`.`po_ID` = 8;
		}
		else{
			$Retention_percent ="Pending";
		}
	}
	else{
		echo "Balance:<br>";
		echo $balance = $Progressbilling - $pt_pbill_stat['pt_amount'];

		$Progressbilling_percent = ($pt_pbill_stat['pt_amount']/$Progressbilling)*100;
		echo  doubleval($Progressbilling_percent);
		$chkbal = $balance - $user_amount;
		if ($chkbal>=0) {
			// insert transaction

		}
		else{
			//amount exceed
		}
		
	}
}



// $sql = "SELECT COUNT(*) FROM `purchase_transaction` WHERE po_ID = 1 AND term_ID = 1 AND status_ID=2"
// $c = mysqli_num_rows($sql);
// IF($c > 0){
// "SELECT sum(material_Price * material_Qty) sum FROM `boq_material_list` WHERE proj_ID = 1"


// "INSERT INTO `purchase_transaction` (`pt_ID`, `po_ID`, `pt_amount`, `pt_date`, `term_ID`, `status_ID`) VALUES (NULL, NULL, NULL, CURRENT_TIME(), NULL, NULL)"






		// echo "<script>alert('Transaction Successfully!	');
		// 								window.location='project_transaction';
		// 							</script>";
}

/*
ADD BILL OF QUANTITY MATERIALS
FUNCTION
*/
if (isset($_POST['boq_material'])) {

$id = $_REQUEST['id'];
$pieces = explode(",", $id);
echo $id = $pieces[0];
echo $p_id = $pieces[1];



	$number = COUNT($_POST["item"]);//count how many arrays available
	if($number > 0)  
	{  
	  for($i=0; $i<$number; $i++)//loop thru each arrays
	  {
	    echo $item =$_POST['item'][$i];
	    echo $amount =$_POST['amount'][$i];
	    echo $unit =$_POST['unit'][$i];
		echo $qty = $_POST['qty'][$i];
	    //ur code in here
		echo $sql = "INSERT INTO `boq_material_list` (
		`boq_ID`, 
		`proj_ID`, 
		`material_Name`, 
		`unit_ID`,
		 `material_Qty`,
		  `material_Price`,
		   `boqdet_ID`) 
		   VALUES (NULL,
		    '$p_id', 
		    '$item',
		     '$unit', 
		     '$qty',
		      '$amount',
		       '$id');";
		       mysqli_query($connection,$sql);

	  }
	}

	echo "<script>alert('Successfully Added!	');
										window.location='project_transaction';
									</script>";
		
}

/*
ADD BILL OF QUANTITY
FUNCTION
*/
if (isset($_POST['add_boq'])) {
	$proj_ID = $_REQUEST['proj_ID'];
	$Description= $_POST['Description'];
	$amount= $_POST['amount'];
	$sql = "INSERT INTO `boq_detail` (
	`boqdet_ID`, 
	`boqdet_Descr`, 
	`boqdet_Amount`, 
	`proj_ID`) 
	VALUES (
	NULL, 
	'$Description', 
	'$amount', 
	'$proj_ID');";
	mysqli_query($connection,$sql);
	echo "<script>alert('Successfully Added!	');
										window.location='project_transaction';
									</script>";
	
}

/*
SUBMIT RECEIVE
FUNCTION
*/

if (isset($_POST['submit_receive_down'])){
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	 echo $id = $pieces[0];
	  echo $proj_ID = $pieces[1];
	  mysqli_query($connection,"UPDATE `purchase_transaction` SET `status_ID` = '2' WHERE `term_ID` = 1  AND po_ID = $id ;");
	echo "<script>alert('Successfully Receive Downpayment!	');
										window.location='project_transaction';
									</script>";
	
}
// else{
// 	echo "<script>alert('Erro Occured!	');
// 										window.location='index';
// 									</script>";
// 	exit();								
// }


if (isset($_POST['submit_progressbill'])) {
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	 $id = $pieces[0];
	 $proj_ID = $pieces[1];
	$amount = $_POST['amount'];
	$boq_sum = mysqli_query($connection,"SELECT sum(boqdet_Amount) as sum FROM `boq_detail`  WHERE proj_ID = $proj_ID");
    $boq_sum = mysqli_fetch_array($boq_sum);
$sum = $boq_sum['sum'];
	$Downpayment =  ($sum * 0.30);
	 $Progressbilling = ($sum * 0.60);
	 if ($amount > $Progressbilling) {
	 	echo "<script>alert('Out of Progressbill Range!	');
										window.location='project_transaction';
									</script>";
	 }
	 else{
	 	$chkbal = $Progressbilling - $amount;
	 	if ($chkbal>=0) {
	 		$sql = "INSERT INTO `purchase_transaction` (`pt_ID`, `po_ID`, `pt_amount`, `pt_date`, `term_ID`, `status_ID`) VALUES (NULL, $id, $amount, CURRENT_TIMESTAMP, 2, 2)";
	 	mysqli_query($connection,$sql);
	 	echo "<script>alert('Transaction Complete!	');
										window.location='project_transaction';
									</script>";
	 	}
	 	else{
	 		echo "<script>alert('Out of Progressbill Range!	');
										window.location='project_transaction';
									</script>";
	 	}
	 	
	 }
	$Retention =  ($sum * 0.10);
	
}

if (isset($_POST['del-boq-h'])) {
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	$id = $pieces[0];
	$proj_ID = $pieces[1];
  
	$sql = "DELETE FROM `boq_detail` WHERE `boq_detail`.`boqdet_ID` = $id ";
	mysqli_query($connection,$sql);
		echo "<script>alert('Successfully Delete!	');
										window.location='project_transaction';
									</script>";
}


if (isset($_POST['submit_retension'])) {
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	 $id = $pieces[0];
	 $proj_ID = $pieces[1];
	$amount = $_POST['amount'];
	$boq_sum = mysqli_query($connection,"SELECT sum(boqdet_Amount) as sum FROM `boq_detail`  WHERE proj_ID = $proj_ID");
    $boq_sum = mysqli_fetch_array($boq_sum);
   $sum = $boq_sum['sum'];
	$Downpayment =  ($sum * 0.30);
	 $Progressbilling = ($sum * 0.60);
	 $retention = ($sum * 0.10);
	 if ($amount > $retention) {
	 	echo "<script>alert('Out of Progressbill Range!	');
										window.location='project_transaction';
									</script>";
	 }
	 else{
	 	$chkbal = $retention - $amount;
	 	if ($chkbal>=0) {
	 		$sql = "INSERT INTO `purchase_transaction` (`pt_ID`, `po_ID`, `pt_amount`, `pt_date`, `term_ID`, `status_ID`) VALUES (NULL, $id, $amount, CURRENT_TIMESTAMP, 3, 2)";
	 	mysqli_query($connection,$sql);
	 	mysqli_query($connection,"UPDATE `purchase_order` SET `status_ID` = '4' WHERE `purchase_order`.`proj_ID` = $proj_ID;");	
	 	echo "<script>alert('Transaction Complete!	');
										window.location='project_transaction';
									</script>";			
	 	}
	 	else{
	 		echo "<script>alert('Out of Progressbill Range!	');
										window.location='project_transaction';
									</script>";
	 	}
	 	
	 }
	$Retention =  ($sum * 0.10);
	
}

if (isset($_POST['submit-return'])) {
	$id = $_REQUEST['id'];
	$sql = mysqli_query($connection,"SELECT e.equip_Name `equipment`,
u.unit_Name,
eu.usage_Quantity as `usage`,
eu.date_added,
eu.usage_ID,
(SELECT SUM(return_Quantity) FROM `equipment_return` WHERE usage_ID = eu.usage_ID) return_Quantity,
(SELECT IF((eu.usage_Quantity - 
    (SELECT SUM(return_Quantity) FROM `equipment_return` WHERE usage_ID = eu.usage_ID)) IS NOT NULL,(eu.usage_Quantity - (SELECT SUM(return_Quantity) FROM `equipment_return` WHERE usage_ID = eu.usage_ID)),eu.usage_Quantity)) as `usagelessreturn`
FROM `equipment_usage` eu
INNER JOIN equipment e ON eu.equip_ID = e.equip_ID 
INNER JOIN unit u ON e.unit_ID = u.unit_ID
LEFT JOIN equipment_return er ON er.usage_ID = eu.usage_ID
WHERE   eu.usage_ID =  $id
GROUP BY eu.usage_ID");
	$d = mysqli_fetch_array($sql);
	echo $use = $d['usagelessreturn'];
	echo $return = $_POST['return'];
	echo $temp = ($use - $return);
	if ($temp >=0) {
		mysqli_query($connection,"INSERT INTO `equipment_return` (`return_ID`, `usage_ID`, `return_Quantity`, `return_Date`) VALUES (NULL, '$id' , '$return', CURRENT_TIMESTAMP);");
		echo "<script>alert('Successfully Return!	');
										window.location='project_monitoring';
									</script>";

	}
	else{
		echo "<script>alert('Out of Return Range!	');
										window.location='project_monitoring';
									</script>";
	}
}

?>