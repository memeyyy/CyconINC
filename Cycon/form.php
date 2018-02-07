<?php
include('header.php');
?>

<title>Form</title>
<body class="bg">




<div class="container" >    
        <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-9 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
 					<h1>Sample Forms</h1>


                    <div class="panel panel-success" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="panel-heading" style="background-color: #76b852; color: white;">
                        <div class="panel-title" >Personal Detail</div>
                      
                    </div>     

                    <div style="padding-top:30px" class="panel-body " >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form role="form" method="post">
                                    

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
	                                    <div class="row">
											<form method="post" class="col-lg-12">
											<div class="form-group col-lg-4">
											  <label >First Name:</label>
											  <input type="text" class="form-control" name="fName" value="">

											</div>
											<div class="form-group col-lg-4">
											  <label >Middle Name:</label>
											  <input type="text" class="form-control" name="mName" value="">

											</div>
											<div class="form-group col-lg-4">
											  <label >Last Name:</label>
											  <input type="text" class="form-control" name="lName" value="">

											</div>
											<div class="form-group col-lg-4">
											    <label>Gender</label>
											        <select class="form-control" value="" name="gender">
											            <option>Male</option>
											            <option>Female</option>
											        </select>
											</div>
											<div class="form-group col-lg-4">
											    <label>Marital Status</label>
											        <select class="form-control" value="" name="gender">
											            <option>Single</option>
											            <option>Married</option>
											            <option>Divorse</option>
											        </select>
											</div>
											<div class="form-group col-lg-4">
											    <label>Religion</label>
											        <select class="form-control" value="" name="gender">
											            <option>Christian</option>
											            <option>Gnostic</option>
											            <option>Islam</option>
											            <option>Judaism</option>
											            <option>Buddhism</option>
											            <option>Hinduism</option>
											            <option>Others</option>
											        </select>
											</div>
											<div class="form-group col-lg-6">
											  <label>Father's Name:</label>
											  <input type="text" class="form-control" name="password" value="">
											</div>
											<div class="form-group col-lg-6">
											  <label>Mother's Name:</label>
											  <input type="text" class="form-control" name="password" value="">
											</div>
											<div class="form-group col-lg-12">
											  <label>Wife's Name:</label>  <i>If Married</i>
											  <input type="text" class="form-control" name="email" value="">
											</div>
											<div class="form-group col-lg-12">
											  <label>Email:</label>
											  <input type="email" class="form-control" name="email" value="">
											</div>
											<div class="form-group col-lg-12">
											  <label >Address:</label>
											  <input type="text" class="form-control" name="Address" value="">
											</div>
											<div class="form-group col-lg-4">
											  <label >Nationality</label>
											  <select class="form-control" value="" name="gender">
											            <option>Afghan</option>
											            <option>Argentine / Argentinian</option>
											            <option>Australian</option>
											            <option>Belgian</option>
											            <option>Bolivian</option>
											            <option>Brazilian</option>
											            <option>Cambodian</option>
											            <option>Cameroonian</option>
											            <option>Canadian</option>
											            <option>Chilean</option>
											            <option>Chinese</option>
											            <option>Colombian</option>
											            <option>Costa Rican</option>
											            <option>Cuban</option>
											            <option>Danish (Dane)</option>
											            <option>Dominican</option>
											            <option>Ecuadorian</option>
											            <option>Egyptian</option>
											            <option>Salvadorian</option>
											            <option>English</option>
											            <option>Estonian</option>
											            <option>Ethiopian</option>
											            <option>Finnish</option>
											            <option>French</option>
											            <option>German</option>
											            <option>Ghanaian</option>
											            <option>Greek</option>
											            <option>Guatemalan</option>
											            <option>Haitian</option>
											            <option>Honduran</option>
											            <option>Indonesian</option>
											            <option>Iranian</option>
											            <option>Irish</option>
											            <option>Israeli</option>
											            <option>Italian</option>
											            <option>Japanese</option>
											            <option>Jordanian</option>
											            <option>Kenyan</option>
											            <option>Laotian</option>
											            <option>Latvian</option>
											            <option>Lithuanian</option>
											            <option>Malaysian</option>
											            <option>Mexican</option>
											            <option>Moroccan</option>
											            <option>Dutch</option>
											            <option>New Zealander</option>
											            <option>Nicaraguan</option>
											            <option>Norwegian</option>
											            <option>Panamanian</option>
											            <option>Paraguayan</option>
											            <option>Peruvian</option>
											            <option>Filipino</option>
											            <option>Polish</option>
											            <option>Polish</option>
											            <option>Portuguese</option>
											            <option>Puerto Rican</option>
											            <option>Romanian</option>
											            <option>Russian</option>
											            <option>Saudi</option>
											            <option>Scottish</option>
											            <option>Korean</option>
											            <option>Spanish</option>
											            <option>Swedish</option>
											            <option>Swiss</option>
											            <option>Taiwanese</option>
											            <option>Tajik</option>
											            <option>Thai</option>
											            <option>Turkish</option>
											            <option>Ukrainian</option>
											            <option>British</option>
											            <option>American **	</option>
											            <option>Uruguayan</option>
											            <option>Venezuelan</option>
											            <option>Vietnamese</option>
											            <option>Welsh</option>
											        </select>
											</div>
											<div class="form-group col-lg-4">
											  <label >Date Of Birth:</label>
											  <input type="date" class="form-control" name="Address" value="">
											</div>

											<div class="form-group col-lg-4">
											  <label >Contact:</label>
											  <input type="text" class="form-control" name="contact" value="">

											</div>
											
											<div class="form-group col-lg-12">
											

											</div>
											    

											</form>

            							</div>




                                    <div class="col-sm-12 controls">
                                    
                                    <button type="submit" class="btn btn-default pull-right btn-lg"name="submit" style="border-radius: 0px; background-color: #76b852; color: white; ">Submit</button>
                                     
                                     

                                    </div>
                                    <div id="error-login-username" style="color:white;font-family:arial;text-align:left;margin-left:40px;position:absolute;">&nbsp</div>
                                </div>

                            </form>
                         </div>
                    </div>
  


        </div>

  </div> <!-- /container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>