<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM blood WHERE blood_group LIKE '".$_POST['txt']."%'";;
		
	}else{
		$sql = "SELECT * FROM blood";

	} 
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		
		while ($row = mysqli_fetch_array($result)) {
			$output .='<div class="col-lg-4">
						<div class="bg-secondary m-1" style="height: 260px;background: #79c1e0 !important;">
							<h5 class="pl-2 pt-1 text-white"><span class="text-dark">Name: </span>'.$row['name'].'</h5>
							<h5 class="pl-2">Blood Group: <span class="text-danger h3"><b>'.$row['blood_group'].'</b></span></h5>
							<h5 class="pl-2 text-white"><span class="text-dark">Number : </span>'.$row['mobile'].'</h5>
							<h4 class="pl-2 text-white"><span class="text-dark">Last Donated : </span>'.$row['last_donate'].'</h4>
							<h4 class="pl-2 text-white pb-4"><span class="text-dark">Present Address : </span>'.$row['present_address'].'</h4>
						</div>
					</div>';
		}
		;
echo $output;
	}else{
		echo '<h1 class="text-danger p-5">No search found</h1>';
	}
		
 
?>

