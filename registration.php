<?php 
ob_start();
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/helpers/Format.php');
   include_once ($filepath.'/lib/Session.php');
   Session::init();
     spl_autoload_register(function ($class) {
     include 'classes/' . $class . '.php';
    });
     $ssid = session_id();
  $Menu = new Menu();
  $User = new User();
  $Medicine = new Medicine();
  $Doctors = new Doctors();
?>
<?php 

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>home page</title>
    <style type="text/css">
      .header{
        height: 100vh;background:url(images/ambg.jpg);background-size: cover;
        position: relative;overflow: hidden;
      }
      .header:after{
        content: "";
        position: absolute;bottom: 0;left: 0;width: 100%;
        background-image: url(https://uradi.me/assets/index/svg/wave-static-02.svg);
        background-repeat: no-repeat;
        height: 200px;
      }
    </style>
  </head>
  <body>


<section class="container-fluid header">
  <div class="container mt-3">
    <div class="row">

<?php 
 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg'])){
      $cutomerreg = $User->cutomerregister($_POST);
      //print_r($_POST);
    }

 ?>


<div class="col-md-5 border border-secondary rounded mb-1 p-3 mx-auto pt-5">
      <h4 class="text-center text-white p-3 bg-success rounded">Sign Up and Start Something!</h4>
      <div><?php if (isset($cutomerreg)) {
          // echo '<h5 class="text-danger">'.$cutomerreg.'</h5>';
          header("Location: donation.php");
        } ?></div>
      <h6 class="text-success text-center"><?php if(isset($_GET['success'])) { echo "Registration Succesfull" ; } ?></h6>
      <form id="formSignup" method="post" action="">
        <div class="row">
            <div class="col">
              <input type="text" name="fname" class="form-control" placeholder="First name" >
            </div>
            <div class="col">
              <input type="text" name="lname" class="form-control" placeholder="Last name" >
            </div>
        </div>
        <br>
          <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
            <small id="emailHelp" class="form-text text-danger"></small>
          </div>
          <div class="form-group">
            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" >
          </div>
          
        <fieldset class="form-group border p-1">
            <div class="row">
              <legend class="col-form-label col-sm-3 pt-0"><strong>Gender :</strong></legend>
              <div class="col-sm-9">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="m">
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
            <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter Number" maxlength="11" />
          </div>
        <div class="form-group">
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password"  />
        </div>
        <div class="form-group">
            <input type="password" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Repeat password" />
        </div>
          <button type="submit" name="reg" class="btn btn-outline-primary">Sign Up</button>
          <a href="login.php" class="text-muted ml-3">Already have an account? Login here</a>
      </form>
    </div>

      </div>
      </div>
      
    </div>
  </div>
</section>

