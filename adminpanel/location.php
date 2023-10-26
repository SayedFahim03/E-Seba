<?php include "inc/header.php";
	if (isset($_GET['deletelocation'])) {
		$Hospital->deleteLocations($_GET['deletelocation']);
		header("Location: location.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php 
							if (isset($_GET['editlocation'])) {
								include "inc/editLocation.php";
							} else {
								include "inc/addLocation.php";
							}
							
						 ?>
					</div>
					<div class="col-md-8">
						<table class="table table-striped">
							  <thead>
							
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
									$doc = $Hospital->allLocation();
									if ($doc) {
										$i = 0;
									  	while($value = $doc->fetch_assoc()){
									  		$i++;
								?>
								    <tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td><?php echo $value['loc_name']; ?>
								      <td><a href="?editlocation&id=<?php echo $value['loc_id']; ?>" class="btn btn-outline-primary">Edit</a> || <a href="?deletelocation=<?php echo $value['loc_id']; ?>" class="btn btn-danger">Delete</a></td>
								    </tr>
							    <?php }} ?>
							  </tbody>
						</table>
					</div>
				</div>
					
			</div>
		</div>
<?php 
	include "inc/footer.php"; 
?>