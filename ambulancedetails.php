<?php include "layout/header.php"; ?>
<section class="container-fluid alert-secondary">
	<img src="images/amu1.jpg" style="width: 100%;height: 300px;">
</section>
<section class="container-fluid">
	<div class="row">
<?php 
$connect = mysqli_connect("localhost","root","","cse499");
// if (isset($_GET['amu'])) {
//     $getValue = $Menu->getAllCartItemBySsid($ssid);
//   }
	if (isset($_GET['amu'])) {
		$sql = "SELECT * FROM ambulance WHERE hos_id = '{$_GET['amu']}'";
		
	}else{
		header("Location:index.php");
	}
	$result = mysqli_query($connect, $sql);


 ?>
		<div class="col-md-10 mx-auto">
			<div class="">
				<h2 class="text-center text-light bg-warning p-3">our Service</h2>
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<table class="table">
							<thead class="thead-dark">
							    <tr>
							      <th scope="col">price</th>
							      <th scope="col">Mobile Number</th>
							      <th scope="col">Destination</th>
							      <th scope="col">Location</th>
							    </tr>
							</thead>
							 <tbody>
							<?php 
								if (mysqli_num_rows($result) > 0 ) {
		
									while ($row = mysqli_fetch_array($result)) {

							 ?>
							    <tr>
							      <td class="text-danger"><?php echo $row['price']."TK"; ?></td>
							      <td><?php echo $row['mobile']; ?></td>
							      <td><?php echo $row['sub_locations']; ?></td>
							      <td><?php echo $row['locations']; ?></td>
							    </tr>
							<?php }} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "layout/footer.php"; ?>