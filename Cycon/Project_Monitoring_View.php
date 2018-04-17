
<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $sql = mysqli_query($connection,"SELECT pm.*,s.status_Name FROM `project_monitoring` pm INNER JOIN `status` s ON pm.status_ID = s.status_ID WHERE pm.proj_ID =  $id");
    $data = mysqli_fetch_array($sql);
    $proj_Title = $data['proj_Title'];
    $proj_Owner =  $data['proj_Owner'];
    $proj_Location =  $data['proj_Location'];
    $proj_Costing =  $data['proj_Costing'];
    $proj_DateStarted =  $data['proj_DateStarted'];
    $proj_DateEnded =  $data['proj_DateEnded'];
    $proj_Scope =  $data['proj_Scope'];
    $proj_Head =  $data['proj_Head'];
    $proj_Expenses =  $data['proj_Expenses'];
    

    ?>    
    <!-- edit form -->
     <?php 

 $sql1 = mysqli_query($connection,"SELECT mstone_Title,mstone_Percent,mstone_DateStarted,mstone_DateEnded FROM `project_milestone` pm  WHERE proj_ID =$id");
 $total_mstone = mysqli_query($connection,"SELECT SUM(mstone_Percent) sum FROM `project_milestone` WHERE proj_ID = $id");
   $total_mstone = mysqli_fetch_array($total_mstone);
   $total_mstone = $total_mstone['sum'];

           
?>

 <a class="float-right btn btn-primary" data-toggle="modal" data-target="#modalviewoveral">Overall Progress </a>
 <br>
 <br>
                <form >
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                          <i class="fa fa prefix grey-text"></i>
                          <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>Project Title</strong></label>
                            <input placeholder="Project Title" type="text" id="form5" class="form-control" name="ProjectOwner"  disabled="" value="<?php echo $proj_Title ?>"></div>
                    </div>
                     <div class="md-form row">
                       
                        <div class="col-6 col-md-6">
                          <i class="fa fa-user prefix grey-text"></i>
                          <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>Project Owner</strong></label>
                            <input placeholder="Project Owner" type="text" id="form5" class="form-control" name="ProjectOwner"  disabled="" value="<?php echo $proj_Owner ?>"></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>Location</strong></label>
                            <input placeholder="Project Location" type="text" id="form5" class="form-control" name="ProjectLocation"  disabled="" value="<?php echo $proj_Location ?>"></div>
                        
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>Amount of Contract</strong></label>
                            <input placeholder="Amount of Contract" type="text" id="form5" class="form-control" name="ProjectCosting"  disabled="" value="<?php echo $proj_Costing ?>">

                           
                          </div>
                    </div>
                   <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
                            <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>Start</strong></label>
                            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="ProjectStart"  disabled="" value="<?php echo $proj_DateStarted ?>"></div>
                        <div class="col-6 col-md-6">
                          <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>End</strong></label>
                            <input placeholder="Date End" type="date" id="form5" class="form-control" name="ProjectEnd" disabled="" value="<?php echo $proj_DateEnded ?>"></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black; */"><strong>Project Scope</strong></label>
                            <input placeholder="Project Scope" type="text" id="form5" class="form-control" name="ProjectScope"  disabled="" value="<?php echo $proj_Scope ?>"></div>
                        
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <label for="ProjectCosting" style="top:0px !important; margin-right: 10px !important; color: black;*/" ><strong>Project Expenses</strong></label>
                            <input placeholder="" type="text" id="form5" class="form-control" name="ProjectHead" disabled="" value="<?php echo $proj_Expenses ?>"></div>
                        
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="button"  class="btn btn-dark-green" name="View-more" value="View Project Milestone" data-toggle="modal" data-target="#milestone" data-id="" >
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                            <br>
                            <div class="btn btn-info btn-lg " data-toggle="modal" data-target="#modalviewusedequipment">View Equipment Used</div>
                        
                        </center>
                    </div>
                </form>


                <!-- edit form -->

<div class="modal fade" id="milestone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Milestones</h5>
               
            </div>
           
            <a class="btn btn-info btn-lg active" >Percentage: <?php 
 if  ($total_mstone >100){
   echo "<script>alert('You reach the maximum percentage of the project milestone');</script>";
   echo "100";
 }
 else{
  echo intval($total_mstone);
 }
 ?>%</a>
            <div class="modal-body mx-3">

                <table id="project_monitoring" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                  <thead class="mdb-color darken-3 text-white" >
                      <tr>
                        <th>Milestone Title</th>
                        <th>Milestone Percent</th>
                        <th>Milestone DateStarted</th>
                        <th>Milestone DateEnded</th>
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
                     while ($data1 = mysqli_fetch_array($sql1)){
                      $mstone_Title = $data1['mstone_Title'];
                      $mstone_Percent = $data1['mstone_Percent'];
                      $mstone_DateStarted = $data1['mstone_DateStarted'];
                      $mstone_DateEnded = $data1['mstone_DateEnded'];
                    ?>
                      <tr>
                          <td><?php echo $mstone_Title;?></td>
                          <td><?php echo $mstone_Percent ;?></td>
                          <td><?php echo $mstone_DateStarted;?></td>
                          <td><?php echo $mstone_DateEnded?></td>
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
?>


<div class="modal fade" id="modalviewusedequipment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Equipment Use In This Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <?php 
               $eq_u =  mysqli_query($connection,"SELECT e.equip_Name `equipment`,
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
WHERE eu.proj_ID = $id
GROUP BY eu.usage_ID");
                ?>
                <table class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                    <thead class="mdb-color darken-3 text-white" >
                      <tr>
                        <th>Equip Name</th>
                        <th>Unit</th>
                        <th>Usage Quantity</th>
                        <th>Return Quantity</th>
                        <th>Date Use</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot class="mdb-color darken-3 text-white" >
                      <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    while ($eq_u_data = mysqli_fetch_array($eq_u)) {
                      if ($eq_u_data[6] == "0") 
                      {
                       
                      }
                      else
                      {
                        ?>
                        <tr>
                            <td><?php echo $eq_u_data[0];?></td>
                            <td><?php echo $eq_u_data[1];?></td>
                            <td><?php echo $eq_u_data[6];?></td>
                            <td><?php echo $eq_u_data[5];?></td>
                            <td><?php echo $eq_u_data[3];?></td>
                            <td>
                              <button type="button" class="btn btn-warning  btn-sm" data-toggle="modal" data-target="#returneq" data-id="<?php echo $eq_u_data[4];?>" id="return"><i class="fa fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Return"></i></button>
                            </td>
                        </tr>
                        <?php
                      }
                        
                    }
                    ?>
                    
                  </tbody>

                </table>
                
            
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="returneq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Return Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
               <div id="return-loader" style="display: none; text-align: center;">
                 <img src="assets/img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="return-content"></div>
                
                
            
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalviewoveral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 font-bold">Overall Progress Percent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
              <?php  if  ($total_mstone >100){
                 echo "100";
               }
               else{
                echo intval($total_mstone);
               }
               ?>%
            </div>
        </div>
    </div>
</div>