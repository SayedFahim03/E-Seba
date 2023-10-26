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
		case 'add_pharmacy':
			include "layout/add_pharmacy.php";
			break;
		case 'edit_pharmacy':
			include "layout/edit_pharmacy.php";
			break;
		case 'add_medicine':
			include "layout/add_medicine.php";
			break;
		default:
			// code...
			break;
	}

 ?>

<?php include "layout/seller_footer.php"; ?>

