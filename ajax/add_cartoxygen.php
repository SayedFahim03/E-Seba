<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Oxygen.php');
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	$login = Session::get('cuslogin');
	$cmrId = Session::get('cmrId');
	$Oxygen = new Oxygen();
	if($login){
		if (isset($_POST['pid'])) {
   			$data = $Oxygen->insertIntoCart($_POST['pid'],$cmrId,1);
		}
	}
	echo $data;
	
?>