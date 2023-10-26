<?php 

 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');
class Order
{
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	function getAllOrderBycusid($cmrid){
		$sql ='SELECT * FROM medicine JOIN orders ON orders.product_id = medicine.medi_id WHERE orders.cmr_id="'.$cmrid.'"';
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}

	public function AddOrder($product_id, $quantity, $cmr_id , $price, $product_type)
	{
		$sql ="INSERT INTO orders( product_id, quantity, cmr_id, price, product_type) 
			value('".$product_id."', '".$quantity."','".$cmr_id."', '".$price."','". $product_type."')";
			$insert = $this->db->insert($sql);
			if ($insert) {
				$msg = 1;
			}
	}

	public function UpdateOrder($pay_type, $tran_id, $cmr_id)
	{
		$sql ="UPDATE orders SET `pay_type`='".$pay_type."',`transaction_id`='".$tran_id."',`payment_status`='1' WHERE cmr_id='".$cmr_id."'";
		$update = $this->db->update($sql);
		if ($update) {
			$msg = 1;
		}
	}

	function allOrder(){
		$sql ="SELECT * FROM medicine JOIN orders ON orders.product_id = medicine.medi_id WHERE orders.product_type=0 limit 6";
		$fetchAll = $this->db->select($sql);
		return $fetchAll;
	}
}

?>