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
  $Blood = new Blood();
  $User = new User();
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
      $cutomerreg = $Blood->insertIntoBlood($_POST);
    }

 ?>


<div class="col-md-5 border border-secondary rounded mb-1 p-3 mx-auto pt-5">
      <h4 class="text-center text-secondary p-3 bg-success rounded">Blood Donation Form</h4>
      <div><?php if (isset($cutomerreg)) {
          echo '<h5 class="text-danger">Registration Succesfull</h5>';
        } ?></div>
      <h6 class="text-success text-center"><?php if(isset($_GET['success'])) { echo "Registration Succesfull" ; } ?></h6>
      <form id="formSignup" method="post" action="">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Enter Name" >
        </div>
        <div class="row">
          <div class="col">
            <label>Blood Group : </label>
          </div>
            <div class="col">
              <select class="form-control" name="blood">
                <option>Select Country</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
            </div>
        </div>
        <br>
          <div class="form-group">
            <input type="text" name="present_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address number" >
          </div>
          <div class="form-group">
            <input type="text" name="last_donate" class="form-control" placeholder="Enter Last Blood Donation Date" >
          </div>
          <div class="form-group">
            <input type="text" name="mobile" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter Number" maxlength="11" />
          </div>
        
          <button type="submit" name="reg" class="btn btn-outline-primary">Submit</button>
          <a href="login.php" class="text-muted ml-3">Login here</a>
      </form>
    </div>

      </div>
      </div>
      
    </div>
  </div>
</section>

