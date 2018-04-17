<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $sql = mysqli_query($connection,"SELECT 
eq.equip_ID ,
eq.equip_Name ,
eq.equip_Quantity,
un.unit_Name
FROM `equipment` eq
INNER JOIN unit un ON eq.unit_ID = un.unit_ID WHERE eq.equip_ID =  $id");
    $data = mysqli_fetch_array($sql);
    $equip_Name = $data['equip_Name'];
    $equip_Quantity =  $data['equip_Quantity'];
    $unit_Name =  $data['unit_Name'];
    if ($equip_Quantity > 1) {
        $s = 's';
    }
    else{
        $s = '';
    }
    

    ?>
<!-- view form -->
<form method="POST" action="project_action.php">
    <div class="md-form row">
        <div class="col-12 col-md-12">
            <i class="fa fa prefix grey-text"></i>
            <input placeholder="Equipment Name" type="text" id="form5" class="form-control" name="equip_Name" disabled="" value="<?php echo $equip_Name?>">
        </div>
    </div>
    <div class="md-form row">
        <div class="col-6 col-md-6">
            <i class="fa fa prefix grey-text"></i>
            <input placeholder="Equipment Name" type="text" id="form5" class="form-control" name="equip_Name" disabled="" value="<?php echo $unit_Name.$s?>">

        </div>
        <div class="col-6 col-md-6">
            <i class="fa fa prefix grey-text"></i>
            <input placeholder="Equipment Qty" type="text" id="form5" class="form-control" name="equip_Qty" disabled="" value="<?php echo $equip_Quantity?>">
        </div>
    </div>
    <div class="md-form">
        <center>
            <div class="btn-group">
                <input type="button" class="btn btn-dark-green" name="View-more" value="View-more" data-toggle="modal" data-target="#Usage" data-id="">
                <input type="button" id="form5" class=" btn btn-danger" value="close" data-dismiss="modal">
            </div>

        </center>
    </div>
    </center>
</form>


<!-- view form -->

<div class="modal fade" id="Usage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Equipment Usage</h5>

            </div>
<!--             <?php 
            $sql = mysqli_query($connection,"SELECT SUM(ug.usage_ID)  usage_1 FROM `equipment_usage` as ug
INNER JOIN equipment eq ON ug.equip_ID = eq.equip_ID
INNER JOIN project_monitoring pm ON ug.proj_ID = pm.proj_ID WHERE ug.equip_ID = $id");
            $data = mysqli_fetch_array($sql);
            $sum_usage = $data['usage_1'];

            $sql2 = mysqli_query($connection,"SELECT equip_Quantity FROM `equipment` WHERE equip_ID = $id");
            $d2 = mysqli_fetch_array($sql2);
            $total_eq = $d2['equip_Quantity'];
            $sql1 = mysqli_query($connection,"
SELECT * FROM `equipment_usage` ug
INNER JOIN equipment eq ON ug.equip_ID = eq.equip_ID
INNER JOIN project_monitoring pm ON ug.proj_ID = pm.proj_ID WHERE ug.equip_ID  = $id");
            $available = $total_eq - $sum_usage;

            
            ?>

            <div class="modal-body mx-3">
                <center>
                    <a class="btn btn-info btn-lg active">Total Quantity: <?php echo "$total_eq"; ?> | Total Usage: <?php if ($sum_usage == 0 || $sum_usage == null)
    { echo "0";}
    else{echo $sum_usage;} ?>| Total Available: <?php echo "$available"; ?>  </a></center>
            </div> -->
            <?php 
            $sql = mysqli_query($connection,"
SELECT e.equip_ID,
e.equip_Name,
u.unit_Name,
e.equip_Quantity,
e.equip_Quantity - COALESCE(eu.usage_quantity, 0)+ (COALESCE(er.return_quantity, 0)) as available_quantity,
(COALESCE(eu.usage_quantity, 0)) - 
(COALESCE(er.return_quantity, 0))  usage_quantity,
COALESCE(er.return_quantity, 0) as return_quantity
FROM equipment e 
INNER JOIN unit u
ON u.unit_ID = e.unit_ID LEFT JOIN
(SELECT eu.equip_id, 
 SUM(eu.usage_Quantity) as usage_Quantity
FROM equipment_usage eu
GROUP BY eu.equip_ID
) eu
ON eu.equip_ID = e.equip_ID LEFT JOIN
(SELECT eu.equip_id, SUM(er.return_Quantity) as return_Quantity
FROM equipment_return er JOIN
equipment_usage eu
ON er.usage_ID = eu.usage_ID
GROUP BY eu.equip_id
) er
ON er.equip_ID = e.equip_ID where e.equip_ID = $id");
            $d = mysqli_fetch_array($sql);
            ?>
             <div class="modal-body mx-3">
                <center>
                    <a class="btn btn-info btn-lg active">
                        <b>Total Equip Quantity:</b><?php echo $d[3]?>
                        <b>Available Quantity:</b><?php echo $d[4]?>
                        <b>Usage Quantity:</b><?php echo $d[5]?>
                        <b>Return Quantity:</b><?php echo $d[6]?>
                    </a>
                </center>
                <table class="table table-striped table-bordered table-responsive-md dataTable">
                    <thead class="mdb-color darken-3 text-white">
                        <tr>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot class="mdb-color darken-3 text-white">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                            <?php 
                               $vue_q = mysqli_query($connection,"SELECT pm.proj_Title,eu.*,eq.*,u.* FROM `equipment_usage` eu
INNER JOIN equipment eq ON eq.equip_ID = eu.equip_ID 
INNER JOin project_monitoring pm ON pm.proj_ID = eu.proj_ID
INNER JOIN unit u ON u.unit_ID = eq.unit_ID 
WHERE eu.equip_ID = $id");
                              while($vue_d = mysqli_fetch_array($vue_q) ){
                                ?>
                                <tr>
                                    <td><?php echo $vue_d[0]?></td>
                                    <td><?php echo $vue_d[4]?></td>
                                    <td><?php echo $vue_d[11]?></td>
                                    <td><?php echo $vue_d[5]?></td>

                                </tr>
                                <?php
                              }
                            ?>
                            
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<?php
    
}