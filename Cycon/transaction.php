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


$sql1 = mysqli_query($connection,"SELECT pt.pt_amount as pt_amount,term.term_ID as term_ID,pt.pt_status as pt_status FROM project_monitoring pm
INNER JOIN purchase_order po ON pm.proj_ID = po.proj_ID
INNER JOIN purchase_transaction pt ON po.po_ID = pt.po_ID
INNER JOIN payment_term term ON pt.pt_term = term.term_ID WHERE pm.proj_ID = '".$p_id."'");
$ProgressPaid = 0;
while ($check = mysqli_fetch_array($sql1)){

	echo  "<br>"; 
	$term_ID = $check['term_ID'];
	$pt_amount = $check['pt_amount'];
	$pt_status  = $check['pt_status'];
	echo  "<br>"; 
	if ($Downpayment == $pt_amount AND $term_ID == 1 AND $pt_status == 'receive') {
			//PWEDE NG MAG ADD NG PROGRESS BILLING 

			echo "confirm 30% done";


		}
	if ($term_ID == 2 AND $pt_status == 'receive') {
		

		 $ProgressPaid += $pt_amount;
		
	}
	if ($term_ID == 3 AND $ProgressPaid == $Progressbilling AND $pt_status == 'receive' ) {
		

		 echo "RETENTION";
		
	}
}
echo  "<br>"; 
echo "Progress Bill 60%";
echo  "<br>"; 
echo  $progressbillPercent = ($ProgressPaid/$Downpayment)*100 . "%";
?>