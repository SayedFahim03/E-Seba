<h3 class="text-success">Add Location</h3>
<div>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addhospital'])){
		   $cutomerlog = $Hospital->addHospotial($_POST,$_FILES);
			echo "<h2 class='text-success text-center'>".$cutomerlog."</h2>";
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name" value="">
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
	    	<input type="file" class="form-control" id="formGroupExampleInput" placeholder="" name="image" value="">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="addhospital">Add Hospital</button>
	</form>
</div>