<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){

    $id = $_REQUEST['id'];
    $proj_ID = $_REQUEST['proj_ID'];
    $mstone =  mysqli_query($connection,"SELECT * FROM `project_milestone` WHERE mstone_ID = $id");
    $mstone =  mysqli_fetch_array($mstone);

    $mstone_Title = $mstone['mstone_Title'];
    $mstone_Percent = $mstone['mstone_Percent'];
    $mstone_DateStarted = $mstone['mstone_DateStarted'];
    $mstone_DateEnded = $mstone['mstone_DateEnded'];
    // $status_ID = $mstone['status_ID'];
    
  ?>

<!-- add form -->
<form method="POST" action="project_action.php?id=<?php echo $id?>&proj_ID=<?php echo $proj_ID?>">
    <div class="md-form row">
        <div class="col-6 col-md-6">
            <i class="fa fa-user prefix grey-text"></i>
            <input placeholder="Milestone Title" type="text" id="form5" class="form-control" name="mstone_Title" required="" value="<?php echo $mstone_Title ?>"></div>
        <div class="col-6 col-md-6">
            <input placeholder="Milestone Percent" type="text" id="form5" class="form-control" name="mstone_Percent" required="" value="<?php echo $mstone_Percent ?>"></div>
    </div>

    <div class="md-form row">
        <div class="col-6 col-md-6">
            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="mstone_DateStarted" required="" value="<?php echo $mstone_DateStarted ?>"></div>
        <div class="col-6 col-md-6">
            <input placeholder="Date End" type="date" id="form5" class="form-control" name="mstone_DateEnded" value="<?php echo $mstone_DateEnded ?>"></div>
    </div>
<!--     <div class="md-form row">
        <div class="col-6 col-md-6">
            <i class="fa fa prefix grey-text"></i>
            <select class="browser-default form-control" name="status_ID" style="  
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
                                $sql = mysqli_query($connection,"SELECT * FROM `status` WHERE status_ID = '3' OR status_ID = '4'");
                                while ($u = mysqli_fetch_array($sql)) {
                                   ?>
                                    <option  value="<?php echo $u['status_ID'];?>"> <?php echo $u['status_Name'];?></option>
                                   <?php
                                }
                                ?>
                            </select>

        </div>

    </div> -->
    <div class="md-form">
        <center>
            <div class="btn-group">
                <input type="submit" class="btn btn-dark-green" name="update-milestone">
                <input type="button" id="form5" class=" btn btn-danger" value="close" data-dismiss="modal">
            </div>

        </center>
    </div>
</form>
<!-- add form -->
<?php
}
?>