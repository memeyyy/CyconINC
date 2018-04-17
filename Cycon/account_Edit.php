
<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $sql = mysqli_query($connection,"SELECT * FROM `user_account` WHERE user_ID = $id");
    $acc_view = mysqli_fetch_array($sql);
    ?>    <!-- delete -->
    <form method="POST"  action="project_action.php?id=<?php echo $id ?>">
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Username" type="text" id="form5" class="form-control" name="username" disabled="" value="<?php echo $acc_view['username']?>">
                        </div>
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Password" type="password" id="form5" class="form-control" name="password" required="" value="">
                        </div>
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Password" type="password" id="form5" class="form-control" name="re-password" required="" >
                        </div>
                    </div>
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa prefix grey-text"></i>
                            <select class="browser-default form-control" name="level_ID" style="  
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
                                $sql = mysqli_query($connection,"SELECT * FROM `user_level`");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['level_ID'];?>"> <?php echo $u['level_Name'];?></option>
                                   <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                         <div class="col-6 col-md-6">
                        </div>
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit" class="btn btn-dark-green" name="submit-account-edit">
                                 <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        </center>
                     </div>
                 </center>
                </form>
    <!-- delete -->
    <?php
}
?>