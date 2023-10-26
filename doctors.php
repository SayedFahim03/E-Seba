<?php include "layout/header.php"; ?>
<section class="container-fluid bg-success">
	<div class="container p-5">
		<input type="text" id="search_doctext" class="form-control" name="" placeholder="Enter Name">
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
							echo ' <li class="list-group-item text-center"><a class="" href="departments.php?dept='.$value['dept_id'].'">'.$value['dept_name'].'</a></li>';
						}
					}
				?>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="">
				<h2 class="text-center text-light bg-secondary p-3">Our Honarable doctor's</h2>
				<div class="row" id="resultDoctors">
					
			</div>
		</div>
	</div>
</section>
<?php include "layout/footer.php"; ?>