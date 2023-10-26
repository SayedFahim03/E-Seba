<?php include "layout/header.php"; ?>
<section class="container-fluid bg-success">
	<div class="container p-5">
		<h1 class="text-center text-secondary">Doctors</h1>
	</div>
</section>

<section class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<p class="h2 mt-2 text-center text-info">Departments</p>
			<ul class="list-group">
				<?php 
					$result = $Doctors->allDept(); 
					if($result){
						while($value = $result->fetch_assoc()){
							echo '<li class="list-group-item text-center"><a class="" href="departments.php?dept='.$value['dept_id'].'">'.$value['dept_name'].'</a></li>';
						}
					}
				?>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="">
				<h2 class="text-center text-light bg-secondary p-3">Our Honarable doctor's</h2>
				<div class="row">
					<?php
						$result = $Doctors->doctorbyDept($_GET['dept']); 
						if($result){
							while($row = $result->fetch_assoc()){
					?>

					<div class="col-lg-4">
						<div class="bg-secondary m-1">
							<img src="images/cap.jpg" style="width: 100%;height: 100px;">
							<h5 class="pl-2 pt-1 text-danger">Name: <?php echo $row['doc_name']; ?></h5>
							<h5 class="pl-2 text-white">Qualification: <?php echo $row['doc_qualification']; ?></h5>
							<h4 class="pl-2">Time : <?php echo $row['time']; ?></h4>
							<div class="d-flex justify-content-between p-2">
								<button class="btn btn-outline-warning mr-1">Details</button>
								<button class="btn btn-outline-info">Appoitment Now</button>
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
	</div>
</section>
<?php include "layout/footer.php"; ?>