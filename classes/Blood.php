<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Blood
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	

	function insertIntoBlood($data){
		$sql ="INSERT INTO `blood`(`name`, `blood_group`, `mobile`, `last_donate`, `present_address`) VALUES ('".$data['name']."','".$data['blood']."','".$data['mobile']."','".$data['last_donate']."','".$data['present_address']."')";
		$value = $this->db->insert($sql);
		if ($value) {
			$msg = 1;
		}else{
			$msg = 0;
		}
		return $msg;
	}


}