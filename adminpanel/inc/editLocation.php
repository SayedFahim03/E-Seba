<h3 class="text-success">Edit Location</h3>
<div>
	<?php
		if (isset($_GET['id'])) {
			$doc = $Hospital->singleLoation($_GET['id']);
			$value = $doc->fetch_assoc();
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editlocation'])){
		   echo $cutomerlog = $Hospital->editLocation($_POST,$_GET['id']);
			header("Location: location.php");
		}
	?>
	<form action="" method="post">
	  	<div class="form-group">
	    	<label for="formGroupExampleInput">Name: </label>
	    	<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="loc_name" value="<?php echo $value['loc_name']; ?>">
	  	</div>
	  	<button type="submit" class="btn btn-primary pull-right" name="editlocation">Update Location</button>
	</form>
</div>