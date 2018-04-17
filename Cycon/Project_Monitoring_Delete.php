
<?php 

if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    ?>    <!-- delete -->
    <form method="POST"  action="project_action.php?id=<?php echo $id ?>">
        <div class="md-form">
            <select  class="browser-default form-control" name="delete_type" style="  
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
                          margin-bottom: 1rem;  width: 300px;" required="" >
                          <option value="3" >On-hold</option>
                          <option value="2" >Terminated</option>
                          <option value="NULL" >Total Deletion</option>

            </select>
                  </div>
        <div class="md-form">
            <center>
                <div class="btn-group">
                    <input type="submit" id="form5" class="btn btn-success" name="submit-delete">
                    <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                </div>
            
            </center>
        </div>
    </form>
    <!-- delete -->
    <?php
}
?>