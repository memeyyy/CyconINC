
<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $sql = mysqli_query($connection,"SELECT * FROM `project_monitoring` WHERE proj_ID = $id");
    $data = mysqli_fetch_array($sql);
    ?>    <!-- delete -->
   

        <div class="md-form">
              <form method="POST"  action="project_action.php?id=<?php echo $id ?>">
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Project Title" type="text" id="form5" class="form-control" name="ProjectTitle" required="" value="<?php echo $data['proj_Title']?>"></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Project Owner" type="text" id="form5" class="form-control" name="ProjectOwner"  required="" value="<?php echo $data['proj_Owner']?>"  onkeyup="letter(this);"></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Project Location" type="text" id="form5" class="form-control" name="ProjectLocation"  required="" value="<?php echo $data['proj_Location']?>"></div>
                        
                    </div>
                   
                   <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="ProjectStart"  required="" value="<?php echo $data['proj_DateStarted']?>"></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Date End" type="date" id="form5" class="form-control" name="ProjectEnd" value="<?php echo $data['proj_DateEnded']?>"></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Project Scope" type="text" id="form5" class="form-control" name="ProjectScope"  required="" value="<?php echo $data['proj_Scope']?>"></div>
                        
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Project Head" type="text" id="form5" class="form-control" name="ProjectHead" value="<?php echo $data['proj_Head']?>"></div>
                        
                    </div>
                     <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa prefix grey-text"></i>
                            <input placeholder="Project Expenses" type="number" id="form5" class="form-control" name="proj_Expenses" value="<?php echo $data['proj_Expenses']?>"></div>
                        
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                            	

                                <input type="submit"  class="btn btn-dark-green" name="update-project">
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                            <br>
                        <a class="btn btn-info" onclick="window.location='project_Monitoring_Edit?proj_ID=<?php echo $id; ?>'">Update Milestone</a>
                        </center>
                    </div>
                </form>
        </div>
  
    <!-- delete -->
    <?php
}
?>