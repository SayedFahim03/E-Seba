<?php include "layout/seller_header.php"; ?>
<section class="container-fluid container">
	<?php 
		if (isset($_GET['delete_cylinder'])) {
			$cutomerlog = $Oxygen->deleteOxygen($_GET['delete_cylinder']);
			if($cutomerlog){
			  	header("Location: oxygen.php");
			}
		}

	 ?>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addpharmacy'])){
		   $cutomerlog = $Oxygen->addOxyzen($_POST,$_FILES);

			echo "<script type='text/javascript'>alert('".$cutomerlog."')</script>";
		}
	?>
	<div class="row p-3">
		<div class="col-md-4">
			<h2 class="text-center text-primary p-4"> Add Oxygen</h2>
			<hr>
			<div>
				<form class="d-flex flex-column" action="" method="post" enctype="multipart/form-data">
					<div>
						<label><b>Cylinder name :</b></label>
						<input class="form-control" type="text" name="name" />
					</div>
					<div>
						<label><b>Cylinder Type :</b></label>
						<select class="form-control" name="pharmacy">
							<option value="">Select Options</option>
						<?php 
							$result = $Oxygen->singlecylinder($_SESSION['sellerId']); 
							if($result){
								$i = 0;
								while($value = $result->fetch_assoc()){
									$i++;
						?>
					       <option value="<?php echo $value['type_id']; ?>"><?php echo $value['cylinder_name'] ?></option>
					    <?php }} ?>
    					</select>
					</div>
					<div>
						<label><b>Image :</b></label>
						<input class="form-control" type="file" name="image" />
					</div>	
					<div>
						<label><b>Price :</b></label>
						<input class="form-control" type="text" name="price" />
					</div>	

					<button type="submit" name="addpharmacy" class="btn btn-primary p-1">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<h2 class="text-center text-primary p-4">Oxygen List</h2>
			<table class="table">
				<thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Name</th>
					  <th scope="col">image</th>
					  <th scope="col">price</th>
					</tr>
				</thead>
			  	<tbody>
			  	<?php 
					$result = $Oxygen->getOxygenBySellerId($_SESSION['sellerId']); 
					if($result){
						$i = 0;
						while($value = $result->fetch_assoc()){
							$i++;
				?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo $value['name']; ?></td>
				      <td>
					  <img src="../images/<?php echo $value['img']; ?>" width="100" />
					</td>
				      <td><?php echo $value['cylinder_price']; ?>TK</td>
				      <td><a href="edit_cylinder.php?cylinder_id=<?php echo $value['cylinder_id']; ?>" class="btn btn-primary">Edit</a></td>
				      <td><a href="?delete_cylinder=<?php echo $value['cylinder_id']; ?>" class="btn btn-danger">Delete</a></td>
				    </tr>
				<?php }} ?>
			  	</tbody>
			</table>
		</div>
	</div>
</section>
<?php include "layout/seller_footer.php"; ?>