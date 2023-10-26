 
<?php 
ob_start();
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../../helpers/Format.php');
   include_once ($filepath.'/../../lib/Session.php');
   Session::init();
     spl_autoload_register(function ($class) {
     include '../classes/' . $class . '.php';
    });
     $ssid = session_id();
  $Menu = new Menu();
  $User = new User();
  $Seller = new Seller();
  $Medicine = new Medicine();
  $Doctors = new Doctors();
  $Hospital = new Hospital();
  $Oxygen = new Oxygen();
  $Order = new Order();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>admin Panel</title>
  </head>
 <body>
<?php

	if(isset($_GET['logout'])){
		session_destroy();
		header("Location: http://localhost/emedicare/adminlog.php");
	}

 ?>
<div class="wrapper">
	<nav id="sidebar">
		<div class="sidebar-header">
			<img src="../images/pp.jpg" width="100" class="rounded-circle mx-auto d-block img-fluid">
			<h5 class="text-center"><b class="text-warning "><?php echo $_SESSION['f_name'] ." ". $_SESSION['l_name']; ?></b></h5>
		</div>
		<ul class="lisst-unstyled components">
			<p>Role : admin</p>
			<li class="active">
				<a href="/index.php" data-toggle="collapse">home</a>
			</li>
			<li >
				<a href="#pdfmenu" data-toggle="collapse" arial-expanded="false" class="dropdown-toggle text-muted"><i class="fa fa-align-left "></i>Doctors</a>
				<ul class="collapse lisst-unstyled" id="pdfmenu">
					<li>
						<a href="doctors.php"><i class="fa fa-align-left"></i>View All question</a>
					</li>
					<li>
						<a href="doctors.php?type=add_doctors">Add Doctors</a>
					</li>
					<li>
						<a href="department.php">Department</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="location.php" class="text-muted"><i class="fa fa-align-left"></i>Location</a>
			</li>
			<li>
				<a href="hospital.php" class="text-muted"><i class="fa fa-align-left"></i>Hospital</a>
			</li>
			<li>
				<a href="apointment.php" class="text-muted"><i class="fa fa-align-left"></i>ApointMent</a>
			</li>
			<li>
				<a href="pharmacy.php" class="text-muted"><i class="fa fa-align-left"></i>Pharmacy</a>
			</li>
			<li>
				<a href="oxygen.php" class="text-muted"><i class="fa fa-align-left"></i>Oxygen</a>
			</li>
			<li>
				<a href="seller.php" class="text-muted"><i class="fa fa-align-left"></i>Seller</a>
			</li>
		</ul>
	</nav>
	<div id="content">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<button type="button" id="sidebarCollapse" class="btn btn-info">
					<i class="fa fa-align-left"></i>
					<span>||</span>
				</button>
				<div style="float: left">
					<div class="dropdown mr-3" style="position: relative;">
				        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;padding: 2px">
				          <img class="nav-user-photo rounded-circle" width="50" src="../images/pp.jpg">
				        </button>
				        <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton" style="position: absolute;left: -90px">
				          <a class="dropdown-item position-relative" href="profile.php">profile</a>
				          <a class="dropdown-item position-relative" href="order.php">Order</a>
				          <a class="dropdown-item position-relative" href="?logout">Logout</a>
				        </div>
				      </div>
				</div>
			</div>
		</nav>
		<hr>