<h3 class="text-success">Edit Department</h3>
<div>
	<?php
		if (isset($_GET['id'])) {
			$doc = $Doctors->singleDept($_GET['id']);
			$value = $doc->fetch_assoc();
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editdept'])){
			//print_r($_POST);
		   echo $cutomerlog = $Doctors->editDept($_POST,$_GET['id']);
			header("Location: Department.php");
		}
	?>
	<form action="" method="post">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="name" value="<?php echo $value['dept_name']; ?>">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="editdept">Update Department</button>
	</form>
</div>