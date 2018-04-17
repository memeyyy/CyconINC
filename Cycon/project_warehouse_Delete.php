
<?php 
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    ?>   
    <form method="POST"  action="project_action.php?id=<?php echo $id ?>">

        <div class="md-form">
            <center>
                <div class="btn-group">
                    <input type="submit" id="form5" class="btn btn-success" name="submit-eq-delete">
                    <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                </div>
            
            </center>
            
        </div>
    </form>
    
    <?php
    exit();
}
else
{
    exit();
}
?>