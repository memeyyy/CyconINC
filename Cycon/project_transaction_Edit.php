<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	$id = $pieces[0];
	$proj_ID = $pieces[1];
		$sql = mysqli_query($connection,"SELECT * FROM purchase_order WHERE po_ID = $id");
		$data = mysqli_fetch_array($sql);
		$po_lock = $data[5];
		?>
		<B>PAYMENT PERCENT</B><BR>
		<B>Downpayment:</B> <?php 
		$down = mysqli_query($connection,"SELECT pt.pt_amount,pt.pt_date,term.term_Name,s.status_Name,pt.po_ID,pt.status_ID FROM `purchase_transaction` pt
inner join payment_term term ON pt.term_ID = term.term_ID
INNER JOIN `status` s ON pt.status_ID = s.status_ID WHERE pt.po_ID = $id  and term.term_ID = 1");
		$down = mysqli_fetch_array($down);
		if ($down <= 0) {
			echo "Pending";
		}
		else{

		echo "100%";
		}

		?>
		<B>Progressbilling:</B>
		<?php 
		$down = mysqli_query($connection,"SELECT pt.pt_amount,pt.pt_date,term.term_Name,s.status_Name,pt.po_ID,pt.status_ID FROM `purchase_transaction` pt
inner join payment_term term ON pt.term_ID = term.term_ID
INNER JOIN `status` s ON pt.status_ID = s.status_ID WHERE pt.po_ID = $id  and term.term_ID = 1");
		$down = mysqli_fetch_array($down);
		if ($down <= 0) {
			echo "Pending";
		}
		else{

		echo "100%";
		}

		?>
		<B>Retention:</B>
		<?php 
		$down = mysqli_query($connection,"SELECT pt.pt_amount,pt.pt_date,term.term_Name,s.status_Name,pt.po_ID,pt.status_ID FROM `purchase_transaction` pt
inner join payment_term term ON pt.term_ID = term.term_ID
INNER JOIN `status` s ON pt.status_ID = s.status_ID WHERE pt.po_ID = $id  and term.term_ID = 1");
		$down = mysqli_fetch_array($down);
		if ($down <= 0) {
			echo "Pending";
		}
		else{

		echo "100%";
		}

		?>
		<HR>
		<?php
		if ($po_lock == 1 ) {
				?>
				<form method="POST" action="project_action.php?proj_ID=<?php echo $proj_ID?>&id=<?php echo $id?>">
				<div class="btn-group float-right">
				<input type="submit" class="btn btn-primary float-right" name="submit-boq-lock" value="LOCK BOQ">
				</input>
				<a class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#modaladdboq">Add BOQ</a>
				<a class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#modalviewboq">View BOQ</a>
				</div>
				</form>
			<?php
		}
		else{
			?><div class="btn-group float-right">
				<?php 
				$pt = mysqli_query($connection,"SELECT * FROM `purchase_transaction` WHERE po_ID = $id AND term_ID = 1  & status_ID = 1");
				if (mysqli_num_rows($pt) <=0) {
					?>
					<a class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#modaladdtrans">Add Transaction</a>
					<?php
				}
				else{

				}
				?>
				
				<a class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#modalviewboq">View BOQ</a>
				</div>
			<?php
		}
		$po = mysqli_query($connection,"SELECT pt.pt_amount,pt.pt_date,term.term_Name,s.status_Name,pt.po_ID,pt.status_ID FROM `purchase_transaction` pt
inner join payment_term term ON pt.term_ID = term.term_ID
INNER JOIN `status` s ON pt.status_ID = s.status_ID WHERE pt.po_ID = $id");
		 $row_cnt =  mysqli_num_rows($po);
		if ($row_cnt <= 0) {
		}
		else{
			?>
			<table id="project_monitoring" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                  <thead class="mdb-color darken-3 text-white" >
                      <tr>
                        <th>Amount</th>
                        <th>Term</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                  </thead>
                  <tfoot class="mdb-color darken-3 text-white" >
                      <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                     while ($data1 = mysqli_fetch_array($po)){
                      $pt_amount = $data1['pt_amount'];
                      $term_Name = $data1['term_Name'];
                      $status_Name = $data1['status_Name'];
                      $pt_date = $data1['pt_date'];
                      $status_ID= $data1['status_ID'];
                      
                    ?>
                      <tr>
                          <td><?php echo $pt_amount;?></td>
                          <td><?php echo $term_Name ;?></td>
                          <td><?php echo $status_Name;?></td>
                          <td><?php echo $pt_date?></td>
                          <?php 
                          if ($status_ID == 2) {
                          	?>
                          	<td>
	                		<div class="btn-group" data-toggle="buttons">
	                          <button class="btn btn-primary  btn-sm" >
	                          	<i class="fa fa-check" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Received"></i>
	                          </button>
	                          
	                        </div>
	            			</td>
                          	<?php
                          }
                          else{
                          	?>
                          	<td>
                		<div class="btn-group" data-toggle="buttons">
                          <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#modaldownreceive"  id="receiveDown"><i class="fa fa-question" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Receive"></i></button>
                          
                        </div>
            			</td>
                          	<?php
                          }
                          ?>
                      </tr>
                    <?php
                      
                    }
                    ?>
                    
                  </tbody>
                </table>
			<?php
		}
	}
	?>
<div class="modal fade" id="modaladdboq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-bold">ADD BOQ</h4>


            </div>
            <div class="modal-body mx-3">

                <form method="POST"  action="project_action.php?proj_ID=<?php echo $proj_ID;  ?>">
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Material Name" type="text" id="form5" class="form-control" name="material_Name" required="">
                        </div>
                        <div class="md-form row">
                            <i class="fa fa prefix grey-text"></i>
                          <select class="browser-default form-control " name="unit_ID" style="  
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
                          margin-bottom: 1rem;  " >
                                <option value="" disabled selected>Choose your option</option>
                                <?php 
                                $sql = mysqli_query($connection,"SELECT * FROM `unit`");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['unit_ID'];?>"> <?php echo $u['unit_Name'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                        
                    	</div>
                        <div class="col-6 col-md-6">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Quantity" type="number" id="form5" class="form-control" name="material_Qty" required="">
                        </div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Price " type="number" id="form5" class="form-control" name="material_Price"  required="">
                        </div>
                    </div>
                     <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="submit-boq">
                            </div>
                        
                        </center>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalviewboq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-primary">
                <h4 class="modal-title w-100 font-bold">VIEW BOQ</h4>
               

            </div>
            <div class="modal-body mx-3">

             <?php 
             	$boq = mysqli_query($connection,"SELECT bml.material_Name,u.unit_Name,bml.material_Qty,bml.material_Price FROM `boq_material_list` bml INNER JOIN unit u ON bml.unit_ID = u.unit_ID WHERE proj_ID = $proj_ID");
             	$boq_sum = mysqli_query($connection,"SELECT sum(material_Price * material_Qty) sum FROM `boq_material_list` WHERE proj_ID = $proj_ID");
             	$boq_sum = mysqli_fetch_array($boq_sum);
             	if (mysqli_num_rows($boq) <= 0 ) {
             		echo "<center><h1>NO BOQ LISTED</h1></center>";
             	}
             	else{
             		?>

				<a class="btn btn-info float-right">Total Cost: <?php
				echo $boq_sum['sum'];
				?></a>
             		<table id="project_monitoring" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                  <thead class="mdb-color darken-3 text-white" >
                      <tr>
                        <th>Material Name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Price</th>
                      </tr>
                  </thead>
                  <tfoot class="mdb-color darken-3 text-white" >
                      <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                     while ($boq_data = mysqli_fetch_array($boq)){
                      $material_Name = $boq_data['material_Name'];
                      $unit_Name = $boq_data['unit_Name'];
                      $material_Qty = $boq_data['material_Qty'];
                      $material_Price = $boq_data['material_Price'];
                    ?>
                      <tr>
                          <td><?php echo $material_Name;?></td>
                          <td><?php echo $unit_Name ;?></td>
                          <td><?php echo $material_Qty;?></td>
                          <td><?php echo $material_Price?></td>
                      </tr>
                    <?php
                      
                    }
                    ?>
                    
                  </tbody>
                </table>
             		<?php
             	}
             ?>
             
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaladdtrans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-info">
                <h4 class="modal-title w-100 font-bold">ADD PAYMENT </h4>
               

            </div>
            <div class="modal-body mx-3">
            	<form action="project_action.php?proj_ID=<?php echo $proj_ID;?>&po_ID=<?php echo $id;?>" method="POST">
            		
                <div class="col-6 col-md-6">
                    <i class="fa fa- prefix grey-text"></i>
                    <input placeholder="Amount" type="number" id="amount" class="form-control" name="amount" required="">
                 </div>

                <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="submit_transaction" value="Submit">
                            </div>
                        
                        </center>
                    </div>
            	</form>
             
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaldownreceive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-info">
                <h4 class="modal-title w-100 font-bold">RECEIVED ?</h4>
    
            </div>
            <div class="modal-body mx-3">

            	<form action="project_action.php?proj_ID=<?php echo $proj_ID?>&po_ID=<?php echo $id;?>" method="POST">
            		

                <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit" name="submit_receive" value="Receive" class="btn btn-dark-green">
                            </div>
                        
                        </center>
                    </div>
            	</form>
             
            </div>
        </div>
    </div>
</div>