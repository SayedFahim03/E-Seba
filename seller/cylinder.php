<?php include "layout/seller_header.php"; ?>
<?php 
	if(isset($_GET['delete_phar'])){

		$cutomerlog = $Medicine->deletePharmacy($_GET['delete_phar']);
	  if($cutomerlog){
	  	header("Location: medicine.php?source=add_pharmacy");
	  };
	}
	if(isset($_GET['delete_medicine'])){

		$cutomerlog = $Medicine->deleteMedicine($_GET['delete_medicine']);
	    if($cutomerlog){
	  	    header("Location: medicine.php?source=add_medicine");
	    };
	}
	$url = $_GET['source'];
	switch ($url) {
		case 'add_cylinder':
			include "layout/add_cylinder.php";
			break;
		case 'edit_cylinder':
			include "layout/edit_cylinder.php";
			break;
		default:
			// code...
			break;
	}

 ?>

<?php include "layout/seller_footer.php"; ?>

