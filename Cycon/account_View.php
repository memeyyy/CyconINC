
<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $sql = mysqli_query($connection,"SELECT * FROM `user_account` ua
LEFT JOIN  user_level ul ON ua.level_ID = ul.level_ID WHERE ua.user_ID = $id");
    $acc_view = mysqli_fetch_array($sql);
    $sql = mysqli_query($connection,"SELECT * FROM `user_account` ua
INNER  JOIN user_log ul ON ul.user_ID = ua.user_ID WHERE ua.user_ID =  $id  ORDER BY ua.`user_created` DESC LIMIT 25 ");
    
    ?>    <!-- delete -->
    <b>Username:</b> <?php echo $acc_view[1]?><br>
    <b>Level:</b>  <?php echo $acc_view['level_Name']?><br>
    

            <!--Table-->
<table id="equipment_invent" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
    <thead class="mdb-color darken-3 text-white" >
        <tr>
            <th>Action Log</th>
            <th>Date</th>
        </tr>
    </thead>
    <tfoot class="mdb-color darken-3 text-white" >
        <tr>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
    <tbody>
        
        <?php 
    while($log = mysqli_fetch_array($sql)){

?>  <tr>
    <td><?php  
    if($log[6]== NULL)
        {
            echo "Login";
        }
    else{
        echo "Logout";
        } ?></td>
    <td><?php echo $log[7]; ?></td>
    </tr>
<?php
    }
    ?>

    </tbody>
</table>
    <form method="POST"  action="project_action.php?id=<?php echo $id ?>">

        <div class="md-form">

            <center>

                <div class="btn-group">
                    <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                </div>
            
            </center>
        </div>
    </form>
    <!-- delete -->
    <?php
}
?>