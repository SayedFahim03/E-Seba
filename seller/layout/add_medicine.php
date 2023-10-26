<section class="container-fluid container">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addpharmacy'])){
		   $cutomerlog = $Medicine->addMedicine($_POST,$_FILES);
			echo "<script type='text/javascript'>alert('".$cutomerlog."')</script>";
		}
	?>
	<div class="row p-3">
		<div class="col-md-4">
			<h2 class="text-center text-primary p-4"> Add Medicine</h2>
			<hr>
			<div>
				<form class="d-flex flex-column" action="" method="post" enctype="multipart/form-data">
					<div>
						<label><b>Medicine name :</b></label>
						<input class="form-control" type="text" name="medicine" />
					</div>
					<div>
						<label><b>pharmacy name :</b></label>
						<select class="form-control" name="pharmacy">
							<option value="">Select Options</option>
						<?php 
							$result = $Medicine->singlePharmacy($_SESSION['sellerId']); 
							if($result){
								$i = 0;
								while($value = $result->fetch_assoc()){
									$i++;
						?>
					       <option value="<?php echo $value['phar_id']; ?>"><?php echo $value['phar_name'] ?></option>
					    <?php }} ?>
    					</select>
					</div>
					<div>
						<label><b>Unit :</b></label>
						<input class="form-control" type="text" name="unit" />
					</div>
					<div>
						<label><b>Image :</b></label>
						<input class="form-control" type="file" name="image" />
					</div>
					<div>
						<label><b>Indredi :</b></label>
						<input class="form-control" type="text" name="indredi" />
					</div>	
					<div>
						<label><b>Company :</b></label>
						<input class="form-control" type="text" name="company" />
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
			<h2 class="text-center text-primary p-4">Medicine List</h2>
			<table class="table">
				<thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Name</th>
					  <th scope="col">Unit</th>
					  <th scope="col">image</th>
					  <th scope="col">indredi</th>
					  <th scope="col">company</th>
					  <th scope="col">price</th>
					</tr>
				</thead>
			  	<tbody>
			  	<?php 
					$result = $Medicine->getMedicineBySellerId($_SESSION['sellerId']); 
					if($result){
						$i = 0;
						while($value = $result->fetch_assoc()){
							$i++;
				?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo $value['name']; ?></td>
				      <td><?php echo $value['unit']; ?></td>
				      <td>
						  <img src="../images/<?php echo $value['image']; ?>" width="100" alt=""></td>
				      <td><?php echo $value['indredi']; ?></td>
				      <td><?php echo $value['company']; ?></td>
				      <td><?php echo $value['price']; ?>TK</td>
				      <td><a href="?source=edit_pharmacy&phar_id=<?php echo $value['medi_id']; ?>" class="btn btn-primary">Edit</a></td>
				      <td><a href="?delete_medicine=<?php echo $value['medi_id']; ?>" class="btn btn-danger">Delete</a></td>
				    </tr>
				<?php }} ?>
			  	</tbody>
			</table>
		</div>
	</div>
</section>
