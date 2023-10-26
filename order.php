<?php include "layout/header.php"; ?>
<section class="container-fluid alert-secondary h-25" style="height:200px;display: block;">
	<div class="container p-5 ">
		<h1 class="text-center">Order List</h1>
	</div>
</section>
<section class="container-fluid">
	<div class="row">
		
		<div class="col-md-10 mx-auto">
			<table class="table">
			  	<thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Price</th>
				      <th scope="col">Payment Type</th>
				      <th scope="col">Transaction ID</th>
				      <th scope="col">Order Date</th>
				    </tr>
			  	</thead>
				<tbody>
				<?php 
					$result = $Order->getAllOrderBycusid(Session::get('cmrId')); 
					if($result){
						while($value = $result->fetch_assoc()){
				?>
				    <tr>
				      	<th scope="row"><?php echo $value['order_id']; ?></th>
				      	<td><?php echo $value['name']; ?></td>
				      	<td><?php echo $value['quantity']; ?></td>
				      	<td><?php echo $value['price']; ?></td>
				      	<td><?php echo $value['pay_type']; ?></td>
				      	<td><?php echo $value['transaction_id']; ?></td>
				      	<td><?php echo $value['order_date']; ?></td>
				      	<td>
				      		<?php 
				      			if ($value['order_status'] == 0) {
				      				echo "<p class='text-success'>success</p>";
				      			} else {
				      				echo "success"; 
				      			}
				      			
				      			
				      		?>
				      	</td>
				    </tr>
				<?php }} ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php include "layout/footer.php"; ?>