<div class="w-75 mx-auto">
	<h2 class="text-center">Add Doctor</h2>

	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adddoctor'])){
		   $cutomerlog = $Doctors->addDoctor($_POST,$_FILES);
		   echo "<h2 class='text-success text-center'>".$cutomerlog."</h2>";
		}
	?>

	<form action="" method="post" enctype="multipart/form-data">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="doc_name">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Department: </label>
	    	<select class="form-control" name="dept">
	    		<option value="">Select Department</option>
		    	<?php
					$doc = $Doctors->allDept();
					if ($doc) {
						$i = 0;
					  	while($value = $doc->fetch_assoc()){
					  		$i++;
				?>
	    		<option class="form-control" value="<?php echo $value['dept_id']; ?>"><?php echo $value['dept_name']; ?></option>
	    	<?php }} ?>
	    	</select>
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput2">Image</label>
	    	<input type="file" class="form-control" id="formGroupExampleInput2" placeholder="" name="image">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput2">Time</label>
	    	<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="time">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput2">Qualification</label>
	    	<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="doc_qualification">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="adddoctor">Add Doctors</button>
	</form>
</div>
