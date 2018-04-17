<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	 $id = $pieces[0];
	 $proj_ID = $pieces[1];

	
	$sqlg ="SELECT * FROM `purchase_transaction` pt INNER JOIN `status` s ON pt.status_ID = s.status_ID inner JOIN payment_term term ON pt.term_ID = term.term_ID WHERE pt.po_ID = $id";
	$sqlg = mysqli_query($connection,$sqlg);
	$down = mysqli_query($connection,"SELECT * FROM `purchase_transaction` WHERE status_ID = 2 AND term_ID = 1 AND po_ID =$id");
	$down = mysqli_num_rows($down);

$boq_sum = mysqli_query($connection,"SELECT sum(boqdet_Amount) as sum FROM `boq_detail`  WHERE proj_ID = $proj_ID");
$boq_sum = mysqli_fetch_array($boq_sum);
 $sum = $boq_sum['sum'];
 $Downpayment =  ($sum * 0.30);
 $Progressbilling = ($sum * 0.60);
 $Retention = ($sum * 0.10);
 $paid_prog = mysqli_query($connection,"SELECT sum(pt_amount) pt_amount FROM `purchase_transaction` WHERE term_ID = 2 AND status_ID = 2 AND po_ID = $id");
 $paid = mysqli_fetch_array($paid_prog);
 $bal = ($Progressbilling - $paid['pt_amount']);
$bal = number_format($bal);
  $paid_reten = mysqli_query($connection,"SELECT sum(pt_amount) pt_amount FROM `purchase_transaction` WHERE term_ID = 3 AND status_ID = 2 AND po_ID = $id");
 $paid_1 = mysqli_fetch_array($paid_reten);
 $bal_ren = ($Retention - $paid_1['pt_amount']);
 $bal_ren = number_format($bal_ren);
?>
<!-- <a class=""><b>Downpayment:</b><u><?php echo $Downpayment;?></u><b>Progressbill:</b><u><?php echo $Progressbilling;?></u><b>Retention:</b><u><?php echo $Retention;?></u></a> -->

<a class=""><b>Downpayment:</b><u><?php if ($down==1) {echo "Paid<br>";}else{echo "<br>";};?></u><b> Progressbill Balance:</b><u><?php 
if($bal == 0)
	{ 
		echo "Paid<br>";
	}
	else
		{
			echo $bal."<br>";
		}?>
			
		</u><b> Retention:</b><u><?php 
if($bal_ren == 0)
	{ 
		echo "Paid<br>";
	}
	else
		{
			echo $bal_ren."<br>";
		}?></u></a>
		<br>

<?php
	if ($down == 1) {
		if ($bal == '0' ) {
			if ($bal_ren == '0' ) {
			
			}
			else{


			?>
		<button type="button" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#modalretension" id="retention" >Retension Bill Payment</button>
		<br><br><br>

		<?php
			}
		}
		else{
		?>
		<button type="button" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#modalprogress_bill" id="progress_bill" >Progress Bill Payment</button>
		<br><br><br>
		<?php
	    }
	}
	else{
		
			?>
		<form method="POST" action="project_action.php?id=<?php  echo $_REQUEST['id']?>">
		<input type="submit" class="btn btn-info  btn-sm" name="submit_receive_down" value="Receive Down">
		</form>
		<br><br><br>
		<?php

		

		
	}
?>
<table class="table table-striped table-bordered table-responsive-md dataTable">
		<thead class="mdb-color darken-3 text-white">
			<tr>
				<th>Amount</th>
				<th>Term</th>
				<th>Date Receive</th>
				<th>Status</th>
				<?php

				if ($down==1) {
				}
				else{
				
				?>
				<th>Action</th>
				<?php
				}
				?>
			</tr>
		</thead>
		<tfoot class="mdb-color darken-3 text-white">
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th><?php if ($down==1) {
				}
				else{
				?>
				<th>Action</th>
				<?php
				}
				?>
			</tr>
		</tfoot>
		<tbody>
			
	<?php
	while ($sqlg_f = mysqli_fetch_array($sqlg)){
		?>
		<TR>
			<td><?php echo number_format($sqlg_f[2])?></td>
			<td><?php echo $sqlg_f[9]?></td>
			<td><?php echo $sqlg_f[3]?></td>
			<td><?php echo $sqlg_f[7]?></td>
		</TR>
		<?php
	}
	?>
</tbody>
</table>
	<?php

 }
  ?>




<div class="modal fade" id="modalprogress_bill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Progressbill Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <center>
                    <form method="post" action="project_action.php?id=<?php echo  $_REQUEST['id']?>" >
                      <!-- <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Description" type="text" id="form5" class="form-control" name="Description"  value="" >
                        </div>
                    </div> -->
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Amount" type="number" id="form5" class="form-control" name="amount"  value="" >
                        </div>
                    </div>
                        <input class="btn btn-primary" type="submit" name="submit_progressbill">
                      
                    </form>
                </center>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalretension" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Retention Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <center>
                    <form method="post" action="project_action.php?id=<?php echo  $_REQUEST['id']?>" >
                      <!-- <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Description" type="text" id="form5" class="form-control" name="Description"  value="" >
                        </div>
                    </div> -->
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Amount" type="number" id="form5" class="form-control" name="amount"  value="" >
                        </div>
                    </div>
                        <input class="btn btn-primary" type="submit" name="submit_retension">
                      
                    </form>
                </center>


            </div>
        </div>
    </div>
</div>