<?php 
require_once('dbconfig.php');
if (isset($_REQUEST['id']) ){

	$id = $_REQUEST['id'];
	$pieces = explode(",", $id);
	 $id = $pieces[0];
	 $proj_ID = $pieces[1];

$sql = mysqli_query($connection,"SELECT * FROM `boq_detail` where proj_ID = $proj_ID AND boqdet_ID = $id");
$d = mysqli_fetch_array($sql);
	?>
<!--     <script type="text/javascript">
      function chk(){
      var name=document.getElementById('name').value;
      //var dataString = 'name='+name;
      $.ajax({
          type:"post",
          url:"z.php",
          data: {  'name' :name },
          cache:false,
          success: function (html) {

          alert('Successfully Edited');
          $('#msg').html(html);
          }
      });
      return false;
    }
	</script> -->
	<form class="text-center" action="z.php?id=<?php echo $_REQUEST['id'] ?>" method="post" >
	    <input class="form-control" type="text" name="name" id="name" value="<?php echo $d[1]?>">
	    <div class="btn-group ">
	    <input class="btn btn-info  btn-sm" type="submit" name="" value="Update">
	    </div>
	</form>
	<?php
}

	?>
