<?php 
if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    $proj_ID = $_REQUEST['proj_ID'];
    
    ?>
<!-- delete -->
<form method="POST" action="project_action.php?id=<?php echo $id ?>&proj_ID=<?php echo $proj_ID ?>">

    <div class="md-form">
        <center>
            <div class="btn-group">
                <input type="submit" id="form5" class="btn btn-success" name="submit-delete-milestone">
                <input type="button" id="form5" class=" btn btn-danger" value="close" data-dismiss="modal">
            </div>

        </center>
    </div>
</form>
<!-- delete -->
<?php
}
?>