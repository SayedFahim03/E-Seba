<?php include "layout/header.php"; ?>
<section class="container-fluid alert-secondary">
	<div class="container p-5">
		<input type="text" id="search_meditext" class="form-control" name="" placeholder="Enter Medicine Name">
	</div>
</section>
<section class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<p class="h2 mt-2 text-center text-info">Oxygen Category</p>
			<ul class="list-group">
			 <?php 
				$result = $Oxygen->allCylinder(); 
				if($result){
					while($value = $result->fetch_assoc()){
						echo ' <li class="list-group-item text-center"><a class="" href="specificoxygenlist.php?oxygen='.$value['type_id'].'">'.$value['cylinder_name'].'</a></li>';
					}
				}
			?>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="">
				<h2 class="text-center text-light bg-danger p-3">Oxygen Lists</h2>
				<div class="row" id="">
				<?php
					$result = $Oxygen->getcylinderByName($_GET['oxygen']); 
					if($result){
						while($row = $result->fetch_assoc()){
				?>

					<div class="col-lg-4">
						<div class="bg-info m-1">
							<img src="images/<?php echo $row['img']; ?>" style="width: 100%;height: 240px;">
							<h5 class="pl-2 pt-1 text-danger text-center" style="min-height:50px"><?php echo $row['name']; ?></h5>
							<h5 class="pl-2 text-center">Unit Price: <?php echo $row['cylinder_price']; ?></h5>
							<div class="d-flex justify-content-between p-2">
								<button class="btn btn-outline-warning mr-1">Add to Cart</button>
								<a href="checkout.php?singleprice=<?php echo $row['cylinder_price']; ?>&mediid=<?php echo $row['cylinder_id'] ?>&type" class="btn btn-outline-danger">Buy Now</a>
							</div>
						</div>
					</div>

				<?php
						}
					}
				?>
			</div>
		</div>
	</div>
</section>
<?php include "layout/footer.php"; ?>