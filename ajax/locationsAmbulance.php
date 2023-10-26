<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM hospitals WHERE loca_id = '".$_POST['txt']."'";
		
	}else{
		$sql = "SELECT * FROM hospitals";

	} 
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		
		while ($row = mysqli_fetch_array($result)) {
			$output .='<div class="col-lg-4">
						<div class="bg-info m-1">
							<a href="ambulancedetails.php?amu='.$row['hos_id'].'" style="text-decoration: none;">
								<img src="images/'.$row['image'].'" style="width: 100%;height: 100px;">
								<h5 class="pl-2 pt-1 text-danger text-center">'.$row['hos_name'].'</h5>
								<h5 class="pl-2 text-white text-center">24/7 Hours aVALIABE</h5>
								<h6 class="pl-2 text-light text-center pb-3">Service: Inner City</h6>
							</a>
						</div>
					</div>';
		}
		
echo $output;
	}else{
		echo '<h1 class="text-danger p-5">No search found</h1>';
	}
		
 
?>