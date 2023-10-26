<?php 
ob_start();
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../helpers/Format.php');
   include_once ($filepath.'/../lib/Session.php');
   Session::init();
     spl_autoload_register(function ($class) {
     include 'classes/' . $class . '.php';
    });
     $ssid = session_id();
  $Menu = new Menu();
  $User = new User();
  $Medicine = new Medicine();
  $Oxygen = new Oxygen();
  $Doctors = new Doctors();
  $Order = new Order();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome to E-SEBA!</title>
    <style type="text/css">
    	.header_top {
  display: block;
    background: none repeat scroll 0 0 #F0F0E9;
}
.top_btn {
  background-color: lightslategray;
  border: none;
  color: white;
  padding: 7px 11px;
  font-size: 16px;
  cursor: pointer;
  margin: 5px;
}
.top_btn:hover {
  background-color: rosybrown;
}
.info ul li{
  color: white;
    padding: 7px 11px;
    font-size: 16px;
}
.middle_header:hover{
  background-color: lightslategray;
}
    	#btnhover:hover{
    		font-size: 20px;
    		padding: 20px;
    		color: white !important;
    	}
      
    </style>
  </head>
  <body>
<div class="sticky-top">
  <div class="bg-warning ">
    <h2 class="text-center text-danger p-3 animate__animated animate__heartBeat animate__infinite">Our Service @24Hours Available</h2>
  </div>

<!-- <div class="header_top">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="info">
            <ul class="nav nav-pills">
              <li><a href="" class="text-dark"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
              <li><a href="" class="text-dark"><i class="fa fa-envelope"></i> info@domain.com</a></li>
            </ul>
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="pull-right">
            <button class="btn top_btn"><i class="fa fa-facebook"></i></button>
            <button class="btn top_btn"><i class="fa fa-twitter"></i></button>
            <button class="btn top_btn"><i class="fa fa-linkedin"></i></button>
            <button class="btn top_btn"><i class="fa fa-google-plus"></i></button>
            <button class="btn top_btn"><i class="fa fa-linkedin"></i></button>
            <input type="text" placeholder="Search..">
          </div>
        </div>
      </div>
    </div>
</div> -->

    <nav class="navbar bg-info navbar-light navbar-expand-sm" height="200" style="margin-top:-10px" >
        <div class="container">
            <a href="home.php" class="navbar-brand d-flex" data-toggle="tooltip" title="E-Medicare">
              <img class="img-fluid mx-auto deming" src="images/unnamed.jpg" width="50">
              <h2>E-SEBA</h2>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
               <span class="mr-auto"></span>
                <ul class="navbar-nav">
                     <li class="nav-item active middle_header">
                         <a href="home.php" class="nav-link"><span class="fa fa-home"></span> Home</a>
                     </li>
                     <li class="nav-item active middle_header">
                         <a href="ambulance.php" class="nav-link"><span class="fa fa-ambulance"></span> Ambulance</a>
                     </li>
                     <li class="nav-item active middle_header">
                         <a href="doctors.php" class="nav-link"><span class="fa fa-user-md"></span> Doctors</a>
                     </li>
                     <li class="nav-item active middle_header">
                         <a href="bloodbank.php" class="nav-link"><span class="fa fa-user-md"></span> Blood Bank</a>
                     </li>
                     <li class="nav-item active middle_header">
                         <a href="medicine.php" class="nav-link"><span class="fa fa-plus-square p-1"></span>Medicine</a>
                     </li>
                     <li class="nav-item active middle_header">
                         <a href="oxygen.php" class="nav-link"><span class="fa fa-plus-square p-1"></span>Oxygen</a>
                     </li>
              <?php
					    	if (isset($_GET['logout'])) {
				        	//$delid = $ct->delCustomerCart();
				        	Session::destroy();
				     		}

					    	$login = Session::get('cuslogin');
					    	if ($login) {
					    ?>
                     <li class="nav-item middle_header">
                         <a href="cart.php" class="nav-link"><span class="fa fa-cart-plus"></span>Cart(<span class="text-danger" id="cartcount"><?php echo $Menu->CountCartItem();?></span>)</a>
                     </li>
                     <li class="nav-item middle_header">
                         <div class="dropdown show d-flex alert-secondary p-2">
                         		<img src="images/pp.jpg" width="30" class="rounded-circle">
													  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													    <?php echo Session::get('cmrname'); ?>
													  </a>

													  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
													    <a class="dropdown-item" href="profile.php">Profile</a>
													    <a class="dropdown-item" href="order.php">Order</a>
                              <a class="dropdown-item" href="appoitments.php">Appoitments</a>
													    <a class="dropdown-item" href="?logout">logout</a>
													  </div>
													</div>
                     </li>
                  <?php } ?>
                 </ul>
            </div>
         
        </div>
    </nav>
  </div>










