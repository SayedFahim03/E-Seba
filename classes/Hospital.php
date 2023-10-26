<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Hospital
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	

	public function allLocation(){
		$sql ='SELECT * FROM locations';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function singleLoation($id){
		$sql ="SELECT * FROM `locations` WHERE loc_id='{$id}'";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}

	function addLocation($data){
		
	    $query = "INSERT INTO `locations`( `loc_name`) VALUES ('{$data['loc_name']}')";
	    $inserted_rows = $this->db->insert($query);
	    if ($inserted_rows) {
	        $msg = "Added Successfully";
	    }else {
	        $msg = "Added Failed";
	    }
		return $msg;
	}

	function editLocation($data,$id){
		
	    $query = "UPDATE `locations` SET `loc_name`='{$data['loc_name']}' WHERE loc_id ='{$id}'";
	    $inserted_rows = $this->db->update($query);
	    if ($inserted_rows) {
	        $msg = "Updated Successfully";
	    }else {
	        $msg = "Updated Failed";
	    }
		return $msg;
	}

	public function deleteLocations($id){
		$sql ="DELETE FROM `locations` WHERE loc_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}



	public function allHospotial(){
		$sql ='SELECT * FROM hospitals';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function singleHospotial($id){
		$sql ="SELECT * FROM `hospitals` WHERE hos_id='{$id}'";

		$fetchAll = $this->db->select($sql);
		 return $fetchAll;
	}

	function addHospotial($data,$picture){
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
		    $query = "INSERT INTO `hospitals`( `hos_name`, `loca_id`, `image`) VALUES ('{$data['name']}','{$data['loc_id']}','{$unique_image}')";
		    $inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		        $msg = "Added Successfully";
		    }else {
		        $msg = "Added Failed";
		    }
		}
		return $msg;
	}

	function editHospotial($data,$picture,$id){
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
		    $query = "UPDATE `hospitals` SET `hos_name`='{$data['name']}',`loca_id`='{$data['loc_id']}',`image`='{$unique_image}' WHERE hos_id ='{$id}'";
		    $inserted_rows = $this->db->update($query);
		    if ($inserted_rows) {
		        $msg = "Updated Successfully";
		    }else {
		        $msg = "Updated Failed";
		    }
		}
		return $msg;
	}

	public function deleteHospotial($id){
		$sql ="DELETE FROM `hospitals` WHERE hos_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}


}