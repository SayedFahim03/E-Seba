<h3 class="text-success">Add Department</h3>
<div>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adddept'])){
		   $cutomerlog = $Doctors->addDept($_POST);
			echo "<h2 class='text-success text-center'>".$cutomerlog."</h2>";
		}
	?>
	<form action="" method="post">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="dept_name" value="">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="adddept">Add Department</button>
	</form>
</div>