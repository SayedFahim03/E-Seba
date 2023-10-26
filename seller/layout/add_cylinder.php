<section class="container-fluid container">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addpharmacy'])){
		  $cutomerlog = $Oxygen->addCylinder($_POST['pharmacy'],$_SESSION['sellerId']);
		  if ($cutomerlog) {
		  	echo "insert success";
		  }
		}
	?>
	<div class="row p-3">
		<div class="col-md-6">
			<h2 class="text-center text-primary p-4">Add cylinder
			</h2>
			<hr>
			<div>
				<form class="d-flex align-items-center" action="" method="post">
					<label><b>cylinder name :</b></label>
					<input type="text" name="pharmacy" />
					<button type="submit" name="addpharmacy" class="btn btn-primary p-1">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<h2 class="text-center text-primary p-4">cylinder List</h2>
			<table class="table">
				<thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">cylinder Name</th>
					</tr>
				</thead>
			  	<tbody>
			  	<?php 
					$result = $Oxygen->allCylinder(); 
					if($result){
						$i = 0;
						while($value = $result->fetch_assoc()){
							$i++;
				?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo $value['cylinder_name']; ?></td>
				      <td><a href="?source=edit_cylinder&cylinder_id=<?php echo $value['type_id']; ?>" class="btn btn-primary">Edit</a></td>
				      <td><a href="?delete_cylinder=<?php echo $value['type_id']; ?>" class="btn btn-danger">Delete</a></td>
				    </tr>
				<?php }} ?>
			  	</tbody>
			</table>
		</div>
	</div>
</section>
