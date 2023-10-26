<?php include "layout/header.php"; ?>
<section class="container-fluid alert-secondary h-25" style="height:200px;display: block;">
	<div class="container p-5 ">
		<select class="form-control" id="search_ambulance">
			<option value="">Select Location</option>
			<option value="1">Dhaka</option>
			<option value="2">Gazipur</option>
		</select>
	</div>
</section>
<section class="container-fluid">
	<div class="row">
		
		<div class="col-md-10 mx-auto">
			<div class="">
				<h2 class="text-center text-light bg-warning p-3">Ambulance Lists</h2>
				<div class="row" id="resultAmbulance">
					<div class="col-lg-4">
						<div class="bg-info m-1">
							<a href="" style="text-decoration: none;">
								<img src="images/ambulance.jpg" style="width: 100%;height: 100px;">
								<h5 class="pl-2 pt-1 text-danger text-center">Square Hospitals</h5>
								<h5 class="pl-2 text-white text-center">24/7 Hours Available</h5>
								<h5 class="pl-2 text-light text-center pb-3">Inter City</h5>
							</a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="bg-info m-1">
							<a href="" style="text-decoration: none;">
								<img src="images/images.jpg" style="width: 100%;height: 100px;">
								<h5 class="pl-2 pt-1 text-danger text-center">Ad Din</h5>
								<h5 class="pl-2 text-white text-center">24/7 Hours Available</h5>
								<h5 class="pl-2 text-light text-center pb-3">Inside City</h5>
							</a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="bg-info m-1">
							<a href="" style="text-decoration: none;">
								<img src="images/ambulance.jpg" style="width: 100%;height: 100px;">
								<h5 class="pl-2 pt-1 text-danger text-center">Ad Din</h5>
								<h5 class="pl-2 text-white text-center">24/7 Hours Available</h5>
								<h5 class="pl-2 text-light text-center pb-3">Inside City</h5>
							</a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="bg-info m-1">
							<a href="" style="text-decoration: none;">
								<img src="images/images.jpg" style="width: 100%;height: 100px;">
								<h5 class="pl-2 pt-1 text-danger text-center">Ad Din</h5>
								<h5 class="pl-2 text-white text-center">24/7 Hours Available</h5>
								<h5 class="pl-2 text-light text-center pb-3">Inside City</h5>
							</a>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<?php include "layout/footer.php"; ?>