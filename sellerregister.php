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
  $Seller = new Seller();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <title>Registration</title>
</head>

<body>

  <section class="container-fluid mt-5 mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
<?php 
 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg'])){
    $cutomerreg = $Seller->sellerRegister($_POST);
    //print_r($_POST);
    echo $cutomerreg;
  }

?>
        
          <form class="bg-secondary p-3" method="post">
            <h2 class="text-center text-warning mb-3">Sign Up!</h2>
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Enter name">
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username" placeholder="Enter username">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Enter email">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="EnterPassword">
              </div>
            </div>
            <div class="form-group row">
              <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-3">
                <input type="radio" class="" name="gender" value="m">
                <label>Male</label>
              </div>
              <div class="col-sm-3">
                <input type="radio" class="" name="gender" value="f">
                <label>Female</label>
              </div>
            </div>
            <div class="form-group row">
              <label for="Mobile" class="col-sm-2 col-form-label">Mobile Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" placeholder="Enter Number">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="adress" placeholder="Enter Address">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" name="reg">Submit</button>
                <a href="sellerlogin.php" class="text-white ml-3">Already have an account? Login here</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3">
      </div>
    </div>
    </div>


  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>