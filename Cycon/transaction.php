<?php 
require_once('dbconfig.php');
$p_id =  "1";
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
$pt_down = mysqli_query($connection,"SELECT SUM(pt_amount) AS pt_amount FROM `purchase_transaction` WHERE po_ID = '".$p_id."' AND term_ID = 1 AND status_ID = 2");
$pt_down_stat = mysqli_fetch_array($pt_down);


$user_amount = 500;
echo "<br>";
//check if downpayment percentage is = to payment receive
if ($Downpayment == $pt_down_stat['pt_amount'] ) {
	// if downpayment was done 
	//process to process billing
	$Downpayment_percent =  100;
	$pt_pbill = mysqli_query($connection,"SELECT SUM(pt_amount) AS pt_amount FROM `purchase_transaction` WHERE po_ID = '".$p_id."' AND term_ID = 2 AND status_ID = 2");
	$pt_pbill_stat = mysqli_fetch_array($pt_pbill);
	echo "<br>";
	if ($Progressbilling == $pt_pbill_stat['pt_amount'] ) {
		//if progress billing was done display 
		//process to retention payment
		$Progressbilling_percent =  100;

		$pt_retention = mysqli_query($connection,"SELECT SUM(pt_amount) AS pt_amount FROM `purchase_transaction` WHERE po_ID = '".$p_id."' AND term_ID = 3 AND status_ID = 2");

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




?>