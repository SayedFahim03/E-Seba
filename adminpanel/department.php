<?php include "inc/header.php";
	if (isset($_GET['deletedept'])) {
		$Doctors->deleteDept($_GET['deletedept']);
		header("Location: department.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php 
							if (isset($_GET['editdept'])) {
								include "inc/editdept.php";
							} else {
								include "inc/adddept.php";
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
									$doc = $Doctors->allDept();
									if ($doc) {
										$i = 0;
									  	while($value = $doc->fetch_assoc()){
									  		$i++;
								?>
								    <tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td><?php echo $value['dept_name']; ?>
								      <td><a href="?editdept&id=<?php echo $value['dept_id']; ?>" class="btn btn-outline-primary">Edit</a> || <a href="?deletedept=<?php echo $value['dept_id']; ?>" class="btn btn-danger">Delete</a></td>
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