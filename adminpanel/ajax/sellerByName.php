<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM pharmacy join sellers 
		on pharmacy.seller_id=sellers.seller_id 
		join medicine on pharmacy.phar_id = medicine.phar_id WHERE pharmacy.seller_id = '".$_POST['txt']."'";
		
	}
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$i++;
			$output .='<tr>
						<td>'.$i.'</td>
						<td>'.$row['phar_name'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['image'].'</td>
						<td>'.$row['company'].'</td>
						<td>'.$row['price'].'TK</td>
						<td><a href="?deletemedi='.$row['medi_id'].'" class="btn btn-danger">Delete</a></td>
					</tr>';
		}
		
echo $output;
	}else{
		echo '<tr><td colspan="4"><h1 class="text-danger p-5">No search found</h1></td></tr>';
	}
		
 
?>
