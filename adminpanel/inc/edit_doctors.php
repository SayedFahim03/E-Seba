<div class="w-75 mx-auto">
	<h2 class="text-center">Edit Doctor</h2>

	<?php
		if (isset($_GET['id'])) {
			$doc = $Doctors->singleDoctor($_GET['id']);
			$value = $doc->fetch_assoc();
			
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editdoctor'])){
		   $cutomerlog = $Doctors->editDoctor($_POST,$_FILES,$_GET['id']);
			header("Location: doctors.php");
		}
	?>

	<form action="" method="post" enctype="multipart/form-data">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="doc_name" value="<?php echo $value['doc_name']; ?>">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Department: </label>
	    	<select class="form-control" name="dept">
	    		<option value="">Select Department</option>
		    	<?php
					$doc = $Doctors->allDept();
					if ($doc) {
						$i = 0;
					  	while($value1 = $doc->fetch_assoc()){
					  		$i++;
				?>
	    			<option class="form-control" value="<?php echo $value1['dept_id']; ?>"><?php echo $value1['dept_name']; ?></option>
	    		<?php }} ?>
	    	</select>
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput2">Image</label>
	    	<input type="file" class="form-control" id="formGroupExampleInput2" placeholder="" name="image">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput2">Time</label>
	    	<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="time" value="<?php echo $value['time']; ?>">
	  	</div>
	  	<div class="form-group">
	    	<label for="formGroupExampleInput2">Qualification</label>
	    	<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="doc_qualification" value="<?php echo $value['doc_qualification']; ?>">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="editdoctor">update Doctors</button>
	</form>
</div>
