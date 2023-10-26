<?php include "layout/header.php"; ?>
<section class="container-fluid alert-secondary">
	<div class="container p-5">
		<input type="text" id="search_meditext" class="form-control" name="" placeholder="Enter Medicine Name">
	</div>
</section>
<section class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<p class="h2 mt-2 text-center text-info">Pharmacy</p>
			<ul class="list-group">
			<?php 
				$result = $Medicine->allPharmacy(); 
				if($result){
					while($value = $result->fetch_assoc()){
						echo ' <li class="list-group-item text-center"><a class="" href="pharmacy.php?pharmacy='.$value['phar_id'].'">'.$value['phar_name'].'</a></li>';
					}
				}
			?>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="">
				<h2 class="text-center text-light bg-danger p-3">Medicine Lists</h2>
				<div class="row" id="resultMedicine">

					
			</div>
		</div>
	</div>
</section>
<?php include "layout/footer.php"; ?>