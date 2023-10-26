<?php 
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['apt_id'])) {
		$sql = "UPDATE `appoitment` SET `status`='".$_POST['status']."' WHERE app_id='{$_POST['apt_id']}'";
		
	}
	$result = mysqli_query($connect, $sql);

	if ($result) {
		echo $_POST['apt_id'];
	}
		
 
?>