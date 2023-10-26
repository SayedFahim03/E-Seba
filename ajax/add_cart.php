<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Menu.php');
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	$login = Session::get('cuslogin');
	$cmrId = Session::get('cmrId');
	$menu = new Menu();
	if($login){
		if (isset($_POST['pid'])) {
   			$data = $menu->insertIntoCart($_POST['pid'],$cmrId,1);
		}
	}
	echo $data;
	
?>