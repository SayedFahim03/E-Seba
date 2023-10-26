<?php include "inc/header.php";
	if (isset($_GET['deleteseller'])) {
		$Seller->deleteSeller($_GET['deleteseller']);
		header("Location: seller.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-10 mx-auto">
						<table class="table table-striped">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col"> Name</th>
							      <th scope="col"> Email</th>
							      <th scope="col"> Gender</th>
							      <th scope="col"> Phone</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
									$doc = $Seller->allSeller();
									if ($doc) {
										$i = 0;
									  	while($value = $doc->fetch_assoc()){
									  		$i++;
								?>
								    <tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td><?php echo $value['f_name'] . ' '. $value['l_name']; ?></td>
								      <td><?php echo $value['email']; ?></td>
								      <td><?php
								      	if ($value['gender'] == 'm') {
								      		echo "Male";
								      	} else {
								      		echo "Female";
								      	}
								      	
								       ?></td>
								      <td><?php echo $value['phone']; ?></td>
								      <td><a href="?deleteseller=<?php echo $value['seller_id']; ?>" class="btn btn-danger">Delete</a></td>
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