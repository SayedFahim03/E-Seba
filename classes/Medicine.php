<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Medicine
{
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	function getMedicineByName($pharid){
		$sql ='SELECT * FROM medicine WHERE phar_id="'.$pharid.'"';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	function getMedicineBySellerId($sellerid){
		$sql ="SELECT * FROM `medicine` JOIN pharmacy ON medicine.phar_id=pharmacy.phar_id WHERE pharmacy.seller_id='{$sellerid}'";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	function addMedicine($data,$picture){
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
		    $query = "INSERT INTO `medicine`(`name`, `unit`, `image`, `indredi`, `company`, `price`, `phar_id`) VALUES ('{$data['medicine']}','{$data['unit']}','{$unique_image}','{$data['indredi']}','{$data['company']}','{$data['price']}','{$data['pharmacy']}')";
		    $inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		        $msg = "Added Successfully";
		    }else {
		        $msg = "Added Failed";
		    }
		}
		return $msg;
	}

	public function deleteMedicine($id){
		$sql ="DELETE FROM `medicine` WHERE medi_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}

	//

	public function allPharmacy(){
		$sql ='SELECT * FROM `pharmacy` join sellers ON sellers.seller_id= pharmacy.seller_id';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function singlePharmacy($id){
		$sql ="SELECT * FROM pharmacy WHERE seller_id='{$id}'";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function editPharmacy($data,$seller){
		$sql ="UPDATE `pharmacy` SET `phar_name`='{$data['pharmacy']}',`seller_id`='{$seller}' WHERE `phar_id`='{$data['phar_id']}'";
		$fetchAll = $this->db->update($sql);
		return $fetchAll;
	}

	public function addPharmacy($name,$seller){
		$sql ="INSERT INTO `pharmacy`(`phar_name`, `seller_id`) VALUES ('{$name}','{$seller}')";
		$fetchAll = $this->db->insert($sql);
		return $fetchAll;
	}

	public function deletePharmacy($id){
		$sql ="DELETE FROM `pharmacy` WHERE phar_id='{$id}'";
		$fetchAll = $this->db->delete($sql);
		return $fetchAll;
	}


}