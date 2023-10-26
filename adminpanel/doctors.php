<?php include "inc/header.php";
	if (isset($_GET['deletedoctor'])) {
		$Doctors->deleteDoctor($_GET['deletedoctor']);
		header("Location: doctors.php");
	} 
	
 ?>
		<div class="container-fluid">
			<div class="container">
			<?php
				if (isset($_GET['type'])) {
					$url = $_GET['type'];
					switch ($url) {
						case 'add_doctors':
							include "inc/add_doctors.php";
							break;
						case 'edit_doctors':
							include "inc/edit_doctors.php";
							break;
						default:
							echo "default";
							break;
					}
				}else{
					include "inc/viewalldoctors.php";
					
				}
					
					
			?>
			</div>
		</div>
<?php include "inc/footer.php";

 ?>