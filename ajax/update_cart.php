<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	$login = Session::get('cuslogin');
	$cmrId = Session::get('cmrId');
	$connect = mysqli_connect("localhost","root","","cse499");
	if($login){
		if (isset($_POST['value'])) {
	 		$sql = "UPDATE cart SET quantity='".$_POST['value']."' WHERE cmr_id='".$cmrId."' AND cart_id= '".$_POST['productid']."'";
		}
	}

	$result = mysqli_query($connect, $sql);
	if ($result) {
		echo $_POST['value'];
	}else{
		echo 'false';
	}

 
?>

