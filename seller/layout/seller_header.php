<?php 
ob_start();
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../../helpers/Format.php');
   include_once ($filepath.'/../../lib/Session.php');
   include_once ($filepath.'/../../classes/User.php');
   include_once ($filepath.'/../classes/Medicine.php');
   include_once ($filepath.'/../classes/Oxygen.php');
   Session::init();
  
    $User = new User();
    $Medicine = new Medicine();
    $Oxygen = new Oxygen();
?>
<?php 

  if(isset($_GET['logout'])){

    session_destroy();
    header("Location: http://localhost/emedicare/");
  }

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
    
  </head>
  <body>
<div class="sticky-top">
  <nav class="navbar bg-info navbar-light navbar-expand-sm" height="200" style="margin-top:-10px" >
      <div class="container">
          <a href="http://localhost/emedicare/seller/" class="navbar-brand d-flex" data-toggle="tooltip" title="E-Medicare">
            <img class="img-fluid mx-auto deming" src="../images/unnamed.jpg" width="50">
            <h2>E-SEBA</h2>
          </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#menu" >
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
             <span class="mr-auto"></span>
              <ul class="navbar-nav">
                   <li class="nav-item active middle_header">
                       <a href="index.php" class="nav-link"><span class="fa fa-home"></span> Home</a>
                   </li>
                    <li class="nav-item middle_header dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-plus-square p-1"></span>Medicine</a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="medicine.php?source=add_pharmacy">Add Pharmacy</a>
                          <a class="dropdown-item" href="medicine.php?source=add_medicine">Add Medicine</a>
                        </div>
                    </li>
                    <li class="nav-item active middle_header">
                       <a href="cylinder.php?source=add_cylinder" class="nav-link"><span class="fa fa-plus-square p-1"></span>Cylinder</a>
                   </li>
                   <li class="nav-item active middle_header">
                       <a href="oxygen.php" class="nav-link"><span class="fa fa-plus-square p-1"></span>Oxygen</a>
                   </li>
            <?php
				    	

				    	$login = Session::get('sellerlogin');
				    	if ($login) {
				    ?>
                   </li>
                   <li class="nav-item middle_header">
                       <div class="dropdown show d-flex alert-secondary p-2">
                       		<img src="../images/pp.jpg" width="30" class="rounded-circle">
												  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    <?php echo Session::get('sellername'); ?>
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









