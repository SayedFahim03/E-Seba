<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM cylinder WHERE name LIKE '%".$_POST['txt']."%'";;
		
	}else{
		$sql = "SELECT * FROM cylinder";

	} 
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		
		while ($row = mysqli_fetch_array($result)) {
			$output .='<div class="col-lg-4">
						<div class="bg-info m-1">
							<img src="images/'.$row['img'].'" style="width: 100%;height: 300px;">
							<h5 class="pl-2 pt-1 text-danger text-center" style="min-height: 50px">'.$row['name'].'</h5>
							<h5 class="pl-2 text-center">Unit Price: '.$row['cylinder_price'].'</h5>
							<div class="d-flex justify-content-between p-2">
								<button class="btn btn-outline-warning mr-1 addtocartoxygen" id="'.$row['cylinder_id'].'">Add to Cart</button>
								<a href="checkout.php?singleprice='.$row['cylinder_price'].'&mediid='.$row['cylinder_id'].'" class="btn btn-outline-danger">Buy Now</a>
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

