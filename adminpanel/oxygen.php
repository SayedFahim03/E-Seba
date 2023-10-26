<?php include "inc/header.php";
	if (isset($_GET['deletecylinder'])) {
		$Oxygen->deleteOxygen($_GET['deletecylinder']);
		header("Location: oxygen.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-10 mx-auto">
						<div class="p-5 d-flex border">
							<label class="pr-3 w-40 h4">Select Seller : </label>
							<select class="form-control w-50" id="search_oxygen">
								<option value="">choose anyone</option>
								<?php 
								$doc = $Seller->allSeller();
									if ($doc) {
										$i = 0;
									  	while($res = $doc->fetch_assoc()){
									  		echo "<option value='".$res['seller_id']."'>".$res['f_name']."</option>";
									  }
									}
								 ?>
							</select>
						</div>
						<table class="table table-striped">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Cylinder Name</th>
							      <th scope="col">Oxugen Name</th>
							      <th scope="col">Image</th>
							      <th scope="col">price</th>
							    </tr>
							  </thead>
							  <tbody id="resultOxygen">
							  	<tr>
							  		<td colspan="4"><h2>Select any seller to see his Oxygen List</h2></td>
							  	</tr>
							  	
							  </tbody>
						</table>
					</div>
				</div>
					
			</div>
		</div>
<?php 
	include "inc/footer.php"; 
?>
