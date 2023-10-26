<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Doctors
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function allDoctor(){
		$sql ="SELECT * FROM doctors";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}

	public function singleDoctor($id){
		$sql ="SELECT * FROM `doctors` WHERE doc_id='{$id}'";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}

	function addDoctor($data,$picture){
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $picture['image']['name'];
		$file_size = $picture['image']['size'];
		$file_temp = $picture['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "../images/".$unique_image;
		$msg = "";
		if ($file_size >1048567) {
		    $msg = "Image Size should be less then 1MB!";
		} elseif (in_array($file_ext, $permited) === false) {
		    $msg = "You can upload only:-".implode(', ', $permited);
		} else{
		    move_uploaded_file($file_temp, $uploaded_image);
		    $query = "INSERT INTO `doctors`(`doc_name`, `dept_id`, `doc_image`, `time`, `doc_qualification`) VALUES ('{$data['doc_name']}','{$data['dept']}','{$unique_image}','{$data['time']}','{$data['doc_qualification']}')";
		    $inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		        $msg = "Added Successfully";
		    }else {
		        $msg = "Added Failed";
		    }
		}
		return $msg;
	}

	public function deleteDoctor($id){
		$sql ="DELETE FROM `doctors` WHERE doc_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}

	function editDoctor($data,$picture,$id){
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $picture['image']['name'];
		$file_size = $picture['image']['size'];
		$file_temp = $picture['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "../images/".$unique_image;
		$msg = "";
		if ($file_size >1048567) {
		    $msg = "Image Size should be less then 1MB!";
		} elseif (in_array($file_ext, $permited) === false) {
		    $msg = "You can upload only:-".implode(', ', $permited);
		} else{
		    move_uploaded_file($file_temp, $uploaded_image);
		    $query = "UPDATE `doctors` SET `doc_name`='{$data['doc_name']}',`dept_id`='{$data['dept']}',`doc_image`='{$unique_image}',`time`='{$data['time']}',`doc_qualification`='{$data['doc_qualification']}' WHERE doc_id='{$id}'";
		    $inserted_rows = $this->db->update($query);
		    if ($inserted_rows) {
		        $msg = "Updated Successfully";
		    }else {
		        $msg = "Updated Failed";
		    }
		}
		return $msg;
	}
	
	public function allDept(){
		$sql ='SELECT * FROM departments';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	public function addDept($data){
		$sql ="INSERT INTO `departments`(`dept_name`) VALUES ('{$data['dept_name']}')";
		$inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		        $msg = "Added Successfully";
		    }
		return $msg;
	}
	public function singleDept($id){
		$sql ="SELECT * FROM departments Where dept_id='{$id}'";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}
	public function editDept($data,$id){
		$query = "UPDATE `departments` SET `dept_name`='{$data['name']}' WHERE `dept_id`='{$id}'";
		    $inserted_rows = $this->db->update($query);
		    if ($inserted_rows) {
		        $msg = "Updated Successfully";
		    }else {
		        $msg = "Updated Failed";
		    }
		return $msg;
	}

	public function deleteDept($id){
		$sql ="DELETE FROM `departments` WHERE dept_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}
	//================

	public function doctorbyDept($id){
		$sql ="SELECT * FROM doctors Where dept_id='{$id}'";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}

	public function doctorAppoitmentList(){
		$sql ="SELECT * FROM doctors JOIN appoitment ON appoitment.doctor_id = doctors.doc_id JOIN customer ON customer.cus_id = appoitment.cmr_id";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}
	
	public function cutomerregister($data){
		$fname = $this->fm->validation($data['fname']);
		$lname = $this->fm->validation($data['lname']);
		$username = $this->fm->validation($data['username']);

		$gender = $this->fm->validation($data['gender']);
		$phone = $this->fm->validation($data['phone']);
		$email = $this->fm->validation($data['email']);
		$password_confirmation = $this->fm->validation($data['password_confirmation']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
		if (empty($fname) || empty($lname) || empty($username) || empty($phone) || empty($email) || empty($password)) {
		 	$loginmsg = "Fields must not be empty";
		 }else{
		 	$sql = "INSERT INTO `customer`(`f_name`, `l_name`, `email`, `username`, `gender`, `phone`, `password`) 
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

}