<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['txt'])) {
		$sql = "SELECT * FROM cylinder_type join sellers 
		on cylinder_type.seller_id=sellers.seller_id 
		join cylinder on cylinder.cylinder_type = cylinder_type.type_id WHERE cylinder_type.seller_id = '".$_POST['txt']."'";
		
	}
	$result = mysqli_query($connect, $sql);
	$output ='';
	if (mysqli_num_rows($result) > 0 ) {
		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$i++;
			$output .='<tr>
						<td>'.$i.'</td>
						<td>'.$row['cylinder_name'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['img'].'</td>
						<td>'.$row['cylinder_price'].'TK</td>
						<td><a href="?deletecylinder='.$row['cylinder_id'].'" class="btn btn-danger">Delete</a></td>
					</tr>';
		}
		
echo $output;
	}else{
		echo '<tr><td colspan="4"><h1 class="text-danger p-5">No search found</h1></td></tr>';
	}
		
 
?>
