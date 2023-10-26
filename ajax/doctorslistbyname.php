<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM doctors WHERE doc_name LIKE '%".$_POST['txt']."%'";;
		
	}else{
		$sql = "SELECT * FROM doctors";

	} 
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		
		while ($row = mysqli_fetch_array($result)) {
			$output .='<div class="col-lg-4">
						<div class="bg-secondary m-1">
							<img src="images/'.$row['doc_image'].'" style="width: 100%;height: 300px;">
							<h5 class="pl-2 pt-1 text-danger">Name: '.$row['doc_name'].'</h5>
							<h5 class="pl-2 text-white">Qualification: '.$row['doc_qualification'].'</h5>
							<h4 class="pl-2">Time : '.$row['time'].'</h4>
							<div class="d-flex justify-content-between p-2">
								<button class="btn btn-outline-warning mr-1">Details</button>
								<button id="'.$row['doc_id'].'" class="btn btn-outline-info appiotments">Appoitment Now</button>
							</div>
						</div>
					</div>';
		}
		;
echo $output;
	}else{
		echo '<h1 class="text-danger p-5">No search found</h1>';
	}
		
 
?>

