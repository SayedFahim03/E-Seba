<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Menu
{
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	function getAllCartItemBycusid($dd){ //retrieve all cart product by id
		$sql ="(SELECT cart_id,name,quantity,cylinder_price AS price ,img AS image FROM cylinder JOIN cart ON cart.product_id = cylinder.cylinder_id WHERE cmr_id='".$dd."' AND type=1) UNION
(SELECT cart_id,name,quantity,price,image FROM medicine JOIN cart ON cart.product_id = medicine.medi_id WHERE cmr_id='".$dd."' AND type=0)";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	function allItems(){
		$sql ='SELECT * FROM items';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	function CountCartItem(){
		$logCheck = Session::get('cuslogin');
		$cus_id = Session::get('cmrId');
		if (!$logCheck) {
			
		}else{
			$sql ='SELECT count(*) as count FROM cart WHERE cmr_id="'.$cus_id.'"';
			$fetchAll = $this->db->select($sql);
		}
		$result = $fetchAll->fetch_assoc();
		return $result['count'];
		
	}
	function allRestaurants(){
		$sql ='SELECT * FROM restaurants';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
	function insertIntoCart($pid,$cmrid, $quantity){
		$sql ='SELECT * FROM cart WHERE cmr_id="'.$cmrid.'" AND product_id ="'.$pid.'"';
		$value = $this->db->select($sql);
		if ($value) {
			$msg = 0;
		}else{
			$sql ="insert into cart(cmr_id, quantity,product_id) 
			value('".$cmrid."', '".$quantity."','".$pid."')";
			$insert = $this->db->insert($sql);
			if ($insert) {
				$msg = 1;
			}
		}
		return $msg;
	}
	public function delCustomerCart($cmrid){
		$qry = "DELETE FROM cart WHERE cmr_id = '$cmrid'";
		$deldata = $this->db->delete($qry);
	}

	public function addingProInUser($cmrid){
		$sid = session_id();
		$qry = "SELECT * FROM tbl_cart WHERE ssid='$sid' ORDER BY cart_id DESC";
    	$getCat = $this->db->select($qry);
    	if ($getCat) {
    		while ($result = $getCat->fetch_assoc()) {
    			$productId = $result['product_id'];
    			$productName = $result['product_name'];
    			$quantity = $result['quantity'];
    			$product_price = $result['product_price'];
    			$product_image = $result['product_image'];
    			if (!$this->checkUserCartTable($productId,$cmrid)) {
    				$query = "INSERT INTO tbl_customer_cart(cus_id,product_id,product_name,quantity,product_image,product_price) ";
					$query .="VALUES('$cmrid','$productId','$productName','$quantity','$product_image','$product_price')";
		    		$inserted_rows = $this->db->insert($query);

    			}
    			
    		}
   	}
	}
	public function cutomerLogin($data){
		$email = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['password']);

		$email = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
		if (empty($email) || empty($password)) {
		 	$loginmsg = "Username or Password must not be empty";
		 }else{
		 	$qry = "SELECT * FROM tbl_customer WHERE 
		 			cus_email = '$email'";
		 	$result=$this->db->select($qry);
		 	if ($result != false) {
		 		$value = $result->fetch_assoc();
		 		if ($password == $value['cus_pass']) {
		 			Session::set('cuslogin',true);
		 			Session::set('cmrId',$value['cus_id']);
		 			Session::set('cmrname',$value['cus_name']);
		 			Session::set('avadar',$value['avadar']);
		 			Session::set('email',$value['email']);
		 			Session::set('gender',$value['gender']);
		 			Session::set('phone',$value['phone']);
		 			setcookie("info", $_SERVER['HTTP_USER_AGENT'],time()+3600,"/","",0);
		 			//$this->addingProInUser(Session::get('cmrId'));
		 			//$this->delCustomerCart($ssid);
		 			 header("Location: index.php");
		 		}else{
		 			$loginmsg = "<span class='text-danger'>Username And Password Not Match !</span>";
		 		}
		 	}else{
		 		$loginmsg ="<span class='text-danger'>Email Not Found.Please register first</span>";
		 	}	
		}
		return $loginmsg;
	}
	public function checkuserCartTable($cmrid,$productid){
		$qry = "SELECT * FROM tbl_customer_cart WHERE product_id='$productid' AND cus_id='$cmrid'";
    	$getCat = $this->db->select($qry);
    	return $getCat;
	}
	public function addToCart($cmrid,$quantity,$productid){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $productid);
		
		$sqry = "SELECT * FROM tbl_product WHERE product_id = '$productid' LIMIT 1";
		$result = $this->db->select($sqry)->fetch_assoc();

		 $product_name = $result['product_name'];
		 $product_price = $result['product_price'];
		 $product_image = $result['product_image'];

		$getresult = $this->checkuserCartTable($cmrid,$productid);

		if ($getresult) {
			$msg = "product already Exists in Cart";
			return $msg;
		} else {
			$sid = session_id();
			$query = "INSERT INTO tbl_customer_cart(cus_id,product_id,product_name,quantity,product_image,product_price) ";
					$query .="VALUES('$cmrid','$productid','$product_name','$quantity','$product_image','$product_price')";
		    		$inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		        $msg = "product Added in Cart";
		    }else {
		        $msg = "product Not Added in Cart";
		    }
		    return $msg;
		}
	}
	public function delAllCustomerCart($cus_id){
		$qry = "SELECT cus_cart_id FROM tbl_customer_cart WHERE cus_id='$cus_id'";
    	$getCat = $this->db->select($qry);
    	if ($getCat) {
    		while ($value = $getCat->fetch_assoc()) {
    			$qry = "DELETE FROM tbl_customer_cart WHERE cus_id='".$value['cus_cart_id']."'";
				$deldata = $this->db->delete($qry);
    		}
    	}
	}

}