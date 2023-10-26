<?php 
include_once 'connect.php';
session_start()

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Admin Login!</title>
  </head>
  <body>
<section class="container-fluid">
	<h1 class="text-center text-primary p-3 bg-dark" id="submit">Welcome Admin's</h1>
</section>

<div class="container-fluid container">
	<?php 

	if (isset($_POST['lsubmit'])) {
		
		$sql = "SELECT * FROM admin WHERE email='{$_POST['emailSign']}'";
		$result = mysqli_query($connect, $sql);
		if (mysqli_num_rows($result) > 0 ) {
			$row = mysqli_fetch_array($result);
			
			if(password_verify($_POST['passwordSign'],$row['password'])){
				$_SESSION['id'] = $row['doc_id'];
				$_SESSION['f_name'] = $row['f_name'];
				$_SESSION['l_name'] = $row['l_name'];
				$_SESSION['gender'] = $row['gender'];
				$_SESSION['email'] = $row['email'];
				header("Location: adminpanel");
			}else{
				echo "<h2 class='text-center text-danger'>password is not match</h2>";
			}
		}else{
			echo "<h2 class='text-center text-danger'>Username And Password is not find</h2>";
		}
	}
 ?>
	<div class="row">
		<div class="col-md-5 mr-3 border border-secondary rounded mb-1 p-3">
			<h4 class="text-center text-center p-3 bg-success rounded">Sign Up and Start Something!</h4>
			<h6 class="text-success text-center"><?php if(isset($_GET['success'])) { echo "Registration Succesfull" ; } ?></h6>
			<form id="formSignup" method="post" action="action/adminreg.php">
				<div class="row">
				    <div class="col">
				      <input type="text" name="fname" class="form-control" placeholder="First name" required>
				    </div>
				    <div class="col">
				      <input type="text" name="lname" class="form-control" placeholder="Last name" required>
				    </div>
				</div>
				<br>
			  	<div class="form-group">
			    	<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
			    	<small id="emailHelp" class="form-text text-danger"></small>
			  	</div>
			  	<div class="form-group">
			    	<input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
			  	</div>
			  	
				<fieldset class="form-group border p-1">
				    <div class="row">
				      <legend class="col-form-label col-sm-3 pt-0"><strong>Gender :</strong></legend>
				      <div class="col-sm-9">
				        <div class="form-check form-check-inline">
				          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="m" required>
				          <label class="form-check-label" for="gridRadios1">
				            MALE
				          </label>
				        </div>
				        <div class="form-check form-check-inline">
				          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="f">
				          <label class="form-check-label" for="gridRadios2">
				            FEMALE
				          </label>
				        </div>
				      </div>
				    </div>
				</fieldset>
				<div class="form-group">
			    	<input type="text" name="phone" id="phone" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter Number" maxlength="11" required>
			  	</div>
				<div class="form-group">
				    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required />
				</div>
				<div class="form-group">
				    <input type="password" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Repeat password" required />
				</div>
			  	<button type="submit" name="dsubmit" class="btn btn-outline-primary">Sign Up</button>
			</form>
		</div>



		<!-- login -->
		<div class="col-md-5 border border-secondary rounded p-3 ml-3">
			<h4 class="text-center text-center p-3 bg-success rounded">Sign In!</h4>
			<form method="post" action="" id="formSignin">
				<div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="emailSign" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="passwordSign" class="form-control" placeholder="Password">
        </div>
	      
        <div class="form-group">
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="checkbox" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <div class="form-check form-check-inline float-right">
            <h6><a href="">Forget Password?</a></h6>
          </div>
        </div>
        <button type="submit" name="lsubmit" class="btn btn-outline-info">Login</button>
			</form>
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