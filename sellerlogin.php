<?php 
ob_start();
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/helpers/Format.php');
   include_once ($filepath.'/lib/Session.php');
   Session::init();
     spl_autoload_register(function ($class) {
     include 'classes/' . $class . '.php';
    });
  $Seller = new Seller();
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
        height: 100vh;background:url(images/effect.jpg);background-size: cover;
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


<section class="container-fluid mb-3 header">
  <div class="container">
    <div class="row">

<?php 
 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
      $cutomerlog = $Seller->sellerLogin($_POST);
      //print_r($_POST);
    }

 ?>


      <div class="col-md-5 border border-secondary rounded p-5 ml-3 mx-auto mt-5 mb-5" style="background: rgba(87, 175, 191, 0.3);border-radius: 25px;">
        <h4 class="text-center text-light p-3 bg-success rounded ">Sign In!</h4>
        <div><?php if (isset($cutomerlog)) {
          echo '<h5 class="text-danger">'.$cutomerlog.'</h5>';
        } ?></div>
        <form method="post" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input type="checkbox" class="" name="checkbox" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="form-check form-check-inline float-right">
              <h6><a href="">Forget Password?</a></h6>
            </div>
          </div>
          <button type="submit" name="login" class="btn btn-outline-info text-light">Login</button>
          <a href="sellerregister.php" class="bg-white text-dark ml-3">Don't have an account? Click here</a>
        </form>
      </div>

      </div>
    </div>
</section>

  </body>
</html>
