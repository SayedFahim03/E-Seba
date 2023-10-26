<h3 class="text-success">Edit Hospital</h3>
<div>
	<?php
		if (isset($_GET['id'])) {
			$doc = $Hospital->singleHospotial($_GET['id']);
			$value = $doc->fetch_assoc();
			
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edithospital'])){
		   $cutomerlog = $Hospital->editHospotial($_POST,$_FILES,$_GET['id']);
		   header("Location: hospital.php");
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="name" value="<?php echo $value['hos_name'] ?>">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Location: </label>
	    	<select class="form-control" name="loc_id">
	    		<option value="">Select Country</option>
	    	<?php
				$doc = $Hospital->allLocation();
				if ($doc) {
					$i = 0;
				  	while($value = $doc->fetch_assoc()){
				  		$i++;
			?>
	    		<option value="<?php echo $value['loc_id'] ?>" ><?php echo $value['loc_name']; ?></option>
	    	<?php }} ?>
	    	</select>
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="image">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="edithospital">Update Hospital</button>
	</form>
</div>