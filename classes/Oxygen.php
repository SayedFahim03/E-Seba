<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Oxygen
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function allOxygen(){
		$sql ='SELECT * FROM cylinder';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	
	function getcylinderByName($pharid){
		$sql ='SELECT * FROM cylinder WHERE cylinder_type="'.$pharid.'"';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function allCylinder(){
		$sql ='SELECT * FROM cylinder_type';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function addCylinder($name,$seller){
		$sql ="INSERT INTO `cylinder_type`(`cylinder_name`, `seller_id`) VALUES ('{$name}','{$seller}')";
		$fetchAll = $this->db->insert($sql);
		return $fetchAll;
	}

	function getOxygenBySellerId($sellerid){
		$sql ="SELECT * FROM `cylinder` JOIN `cylinder_type` ON cylinder.cylinder_type=cylinder_type.type_id WHERE cylinder_type.seller_id='{$sellerid}'";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	function addOxyzen($data,$picture){
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
		    $query = "INSERT INTO `cylinder`(`name`, `cylinder_type`, `cylinder_price`, `img`) VALUES ('{$data['name']}','{$data['pharmacy']}','{$data['price']}','{$unique_image}')";
		    $inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		        $msg = "Added Successfully";
		    }else {
		        $msg = "Added Failed";
		    }
		}
		return $msg;
	}

	public function deleteOxygen($id){
		$sql ="DELETE FROM `cylinder` WHERE cylinder_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}


	public function singleOxygen($id){
		$sql ="SELECT * FROM cylinder WHERE cylinder_id='{$id}'";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function singlecylinder($id){
		$sql ="SELECT * FROM cylinder_type WHERE seller_id='{$id}'";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function updateOxygen($data,$id){
		$sql ="UPDATE `cylinder` SET `name`='{$data['name']}',`cylinder_type`='{$data['pharmacy']}',`cylinder_price`='{$data['price']}' WHERE cylinder_id='{$id}'";
		$fetchAll = $this->db->update($sql);
		return $fetchAll;
	}




}