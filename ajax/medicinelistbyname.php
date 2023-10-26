<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM medicine WHERE name LIKE '%".$_POST['txt']."%'";;
		
	}else{
		$sql = "SELECT * FROM medicine";

	} 
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		
		while ($row = mysqli_fetch_array($result)) {
			$output .='<div class="col-lg-4">
						<div class="bg-info m-1">
							<img src="images/'.$row['image'].'" style="width: 100%;height: 300px;">
							<h5 class="pl-2 pt-1 text-danger text-center">'.$row['name'].'</h5>
							<h5 class="pl-2 text-white text-center">'.$row['unit'].'</h5>
							<h5 class="pl-2 text-light text-center">'.$row['indredi'].'</h5>
							<h5 class="pl-2 text-center">'.$row['company'].'</h5>
							<h5 class="pl-2 text-center">Unit Price: '.$row['price'].'</h5>
							<div class="d-flex justify-content-between p-2">
								<button class="btn btn-outline-warning mr-1 addtocart" id="'.$row['medi_id'].'">Add to Cart</button>
								<a href="checkout.php?singleprice='.$row['price'].'&mediid='.$row['medi_id'].'" class="btn btn-outline-danger">Buy Now</a>
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

