<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
	Session::init();
	$cmrId = Session::get('cmrId');
	$connect = mysqli_connect("localhost","root","","cse499");
	if (isset($_POST['did'])) {
		$sql = "INSERT INTO `appoitment`(`doctor_id`, `cmr_id`, `serial_no`) VALUES ('".$_POST['did']."','".$cmrId."','".rand()."')";
		
	}
	$result = mysqli_query($connect, $sql);

	if ($result) {
		echo $_POST['did'];
	}
		
 
?>

