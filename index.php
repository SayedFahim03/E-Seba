<?php 
session_start();

if (isset($_SESSION['cuslogin'])) {
  header("Location: home.php");
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

    <title>Hello, world!</title>
    <style type="text/css">
    	.header{
    		height: 100vh;background:url(images/header-background.png);background-size: cover;
    		position: relative;overflow: hidden;
    	}
    	.header:after{
    		content: "";
    		position: absolute;bottom: 0;left: 0;width: 100%;
    		background-image: url(https://uradi.me/assets/index/svg/wave-static-02.svg);
    		background-repeat: no-repeat;
    		height: 200px;
    	}
    	#btnhover:hover{
    		font-size: 20px;
    		padding: 20px;
    		color: white !important;
    	}
    </style>
  </head>
  <body>
    <div class="header">
    	<div style="position: absolute;top: 30%;left: 20%;width: 60%;" >
    		<div class="p-4 border" style="background: rgba(86, 175, 80, 0.3);border-radius: 25px;">
    			<h1 class="text-white text-center"><b>E-SEBA is an online medical service.</b></h1>
	    		<h4 class="text-white text-center mt-2">Your wellness is our main priority.</h4>
	    		<div class="text-center mt-3">
	    			<a type="submit" href="login.php" class=" btn btn-lg btn-outline-danger text-dark" id="btnhover">Join Users</a>
            <a type="submit" href="sellerlogin.php" class=" btn btn-lg btn-outline-danger text-dark">Join Sellers</a>
	    		</div>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>