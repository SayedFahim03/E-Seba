<?php include "inc/header.php";

 ?>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-12 mx-auto">
						<h2 class="text-center text-primary">Appoitments List</h2>
						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Doctors</th>
						      <th scope="col">Time</th>
						      <th scope="col">Serial no</th>
						      <th scope="col">Requested By</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php 

						  		$rst = $Doctors->doctorAppoitmentList();
						  		if ($rst) {
						  			while($value = $rst->fetch_assoc()){
						  				
						  		?>
						    <tr>
						      <th scope="row">1</th>
						      <td><?php echo $value['doc_name']; ?></td>
						      <td><?php echo $value['time']; ?></td>
						      <td><?php echo $value['serial_no']; ?></td>
						      <td><?php echo $value['f_name']. " " . $value['l_name']; ?></td>
						      <td id="rep_<?php echo $value['app_id']; ?>"><?php 
						      		if ($value['status'] == 0) {
						      			echo '<button class="btn btn-primary approve" id="'.$value['app_id'].'">Approve</button> || <button class="btn btn-primary unapprove" id="'.$value['app_id'].'">Decline</button>' ;
						      		} elseif($value['status'] == 1) {
						      			echo "<h4 class='text-success'>Approved</h2>";
						      		}else{
						      			echo "<h4 class='text-success'>Declined</h2>";
						      		}
						      		
						       ?></td>
						    </tr>
						    <?php 	}
						  		}
						  	 ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<?php include "inc/footer.php";

 ?>