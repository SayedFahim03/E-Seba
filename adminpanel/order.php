<?php include "inc/header.php";
	if (isset($_GET['deletehos'])) {
		$Hospital->deleteHospotial($_GET['deletehos']);
		header("Location: hospital.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<h2 class="text-center text-success">Order Details</h2>
				<div class="row">
					<div class="col-md-10 mx-auto">
						<table class="table table-striped">
							  <thead>
							
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">Price</th>
							      <th scope="col">Transaction Id</th>
							      <th scope="col">Status</th>
							      <th scope="col">Date</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php
									$doc = $Order->allOrder();
									if ($doc) {
										$i = 0;
									  	while($value = $doc->fetch_assoc()){
									  		$i++;
								?>
								    <tr>
								      <th scope="row"><?php echo $i; ?></th>
								      <td><?php echo $value['name']; ?></td>
								      <td><?php echo $value['price']." TK"; ?></td>
								      <td><?php echo $value['transaction_id']; ?></td>
								      <td><?php
								      		if($value['order_status'] == 1)
								      		{	echo "<p class='text-success'>Completed</p>";
								      		}else{ echo "<p class='text-danger'>Failed</p>";}
								      ?></td>
								      <td><?php echo $value['order_date']; ?></td>
								      <!-- <td><a href="?editorder&id=<?php echo $value['order_id']; ?>" class="btn btn-outline-primary">Edit</a> || <a href="?deletehos=<?php echo $value['order_id']; ?>" class="btn btn-danger">Delete</a></td> -->
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