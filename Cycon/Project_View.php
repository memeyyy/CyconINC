
<?php 

if (isset($_REQUEST['id']) ){
    $id = $_REQUEST['id'];
    ?>    <!-- edit form -->
                <!-- <form method="POST" >
                    <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Project Title" type="text" id="form5" class="form-control" name="ProjectTitle" required=""></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Project Owner" type="text" id="form5" class="form-control" name="ProjectOwner"  required=""></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Project Location" type="text" id="form5" class="form-control" name="ProjectLocation"  required=""></div>
                        
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Amount of Contract" type="text" id="form5" class="form-control" name="ProjectCosting"  required=""></div>
                        
                    </div>
                   <div class="md-form row">
                        <div class="col-6 col-md-6">
                            <i class="fa fa-calendar-o prefix grey-text" aria-hidden="true"></i>
                            <input placeholder="Date Started" type="date" id="form5" class="form-control" name="ProjectStart"  required=""></div>
                        <div class="col-6 col-md-6">
                            <input placeholder="Date End" type="date" id="form5" class="form-control" name="ProjectEnd"></div>
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-address prefix grey-text"></i>
                            <input placeholder="Project Scope" type="text" id="form5" class="form-control" name="ProjectScope"  required=""></div>
                        
                    </div>
                    <div class="md-form row">
                        <div class="col-12 col-md-12">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input placeholder="Project Head" type="text" id="form5" class="form-control" name="ProjectHead" ></div>
                        
                    </div>
                    <div class="md-form">
                        <center>
                            <div class="btn-group">
                                <input type="submit"  class="btn btn-dark-green" name="submit-project" >
                                <input type="button"  id="form5" class=" btn btn-danger" value="close"  data-dismiss="modal">
                            </div>
                        
                        </center>
                    </div>
                </form> -->
                
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Project</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-controls="settings">Settings</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane fade in  active" id="home" role="tabpanel">123123</div>
  <div class="tab-pane fade in " id="profile" role="tabpanel">x</div>
  <div class="tab-pane fade in " id="messages" role="tabpanel">z</div>
  <div class="tab-pane fade in " id="settings" role="tabpanel">3</div>
</div>

<script>
  $(function () {
    $('#myTab a:last').tab('show')
  })
</script>

                <!-- edit form -->
    <?php
}
?>