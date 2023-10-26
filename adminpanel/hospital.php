<?php include "inc/header.php";
	if (isset($_GET['deletehos'])) {
		$Hospital->deleteHospotial($_GET['deletehos']);
		header("Location: hospital.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php 
							if (isset($_GET['edithospitals'])) {
								include "inc/edithospitals.php";
							} else {
								include "inc/addhospitals.php";
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
									$doc = $Hospital->allHospotial();
									if ($doc) {
										$i = 0;
									  	while($value = $doc->fetch_assoc()){
									  		$i++;
								?>
								    <tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td><?php echo $value['hos_name']; ?>
								      <td><a href="?edithospitals&id=<?php echo $value['hos_id']; ?>" class="btn btn-outline-primary">Edit</a> || <a href="?deletehos=<?php echo $value['hos_id']; ?>" class="btn btn-danger">Delete</a></td>
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