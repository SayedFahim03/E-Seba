<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Seller
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function allSeller(){
		$sql ='SELECT * FROM `sellers`';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	
	public function sellerLogin($data){
		$email = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
		if (empty($email) || empty($password)) {
		 	$loginmsg = "Username or Password must not be empty";
		 }else{
		 	$qry = "SELECT * FROM sellers WHERE 
		 			email = '$email'";
		 	$result=$this->db->select($qry);
		 	if ($result != false) {
		 		$value = $result->fetch_assoc();
		 		if ($password == $value['password']) {
		 			Session::set('sellerlogin',true);
		 			Session::set('sellerId',$value['seller_id']);
		 			Session::set('sellername',$value['f_name']);
		 			Session::set('username',$value['username']);
		 			Session::set('avadar',$value['avadar']);
		 			Session::set('email',$value['email']);
		 			Session::set('gender',$value['gender']);
		 			Session::set('phone',$value['phone']);
		 			//$this->addingProInUser(Session::get('cmrId'));
		 			//$this->delCustomerCart($ssid);
		 			 header("Location: seller");
		 		}else{
		 			$loginmsg = "<span class='text-danger'>Username And Password Not Match !</span>";
		 		}
		 	}else{
		 		$loginmsg ="<span class='text-danger'>Email Not Found.Please register first</span>";
		 	}	
		}
		return $loginmsg;
	}
	
	public function sellerRegister($data){
		$fname = $this->fm->validation($data['name']);
		$lname = $this->fm->validation($data['name']);
		$username = $this->fm->validation($data['username']);

		$gender = $this->fm->validation($data['gender']);
		$phone = $this->fm->validation($data['phone']);
		$email = $this->fm->validation($data['email']);
		// $password_confirmation = $this->fm->validation($data['password_confirmation']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
		if (empty($fname) || empty($lname) || empty($username) || empty($phone) || empty($email) || empty($password)) {
		 	$loginmsg = "Fields must not be empty";
		 }else{
		 	$sql = "INSERT INTO `sellers`(`f_name`, `l_name`, `email`, `username`, `gender`, `phone`, `password`) 
			VALUES ('{$fname}','{$lname}','{$email}','{$username}','{$gender}','{$phone}','{$password}')";
		 	$result=$this->db->insert($sql);
		 	if ($result) {
		 			$loginmsg = "<span class='text-success'>Register Success !</span>";
		 	}else{
		 		$loginmsg ="<span class='text-danger'register Failed</span>";
		 	}	
		}
		return $loginmsg;
	}

	public function deleteSeller($id){
		$sql ="DELETE FROM `sellers` WHERE seller_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}

}