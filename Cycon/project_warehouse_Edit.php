
<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $sql = mysqli_query($connection,"SELECT * FROM `equipment` WHERE equip_ID = $id");
    $data = mysqli_fetch_array($sql);
    $equip_Name = $data['equip_Name'];
    $equip_Quantity =  $data['equip_Quantity'];
    $unit_ID =  $data['unit_ID'];
    

    ?>    
    <!-- edit form -->
               <form method="POST"  action="project_action.php?id=<?php echo $id;?>">
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Name" type="text" id="form5" class="form-control" name="equip_Name"  value="<?php echo $equip_Name?>" >
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                          <select class="browser-default form-control" name="unit_ID" style="  
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
                          margin-bottom: 1rem;  ">
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
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Equipment Qty" type="number" id="form5" class="form-control" name="equip_Qty" value="<?php echo $equip_Quantity?>" >
                        </div>
                    </div>
                     <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="submit-equip-update" >
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        
                        </center>
                      </div>
                 </center>
                </form>
                <!-- edit form -->

<?php 
}
