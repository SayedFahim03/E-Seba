<?php include "layout/header.php"; ?>
<section class="container-fluid">
        <div style="background-image: url(images/32.jpg);background-size: cover;width: 100%;">
          <h3 class="p-5 text-center">Cart</h3>
        </div>
</section>
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="row">
          <table class="table">
          	<thead class="bg-warning text-light">
          		<th>Iteam</th>
          		<th>Title</th>
          		<th>Price</th>
          		<th>Quantity</th>
          		<th>Total</th>
          	</thead>
          	<tbody>
    <?php
      $getValue = $Menu->getAllCartItemBycusid(Session::get('cmrId'));
      if ($getValue) {
        $count_one = 0;
        $count_two = 100;
        $subtotal = 0;
        $total = 0;
        while ($row = mysqli_fetch_array($getValue)) {
          $count_one++;
          $count_two++;
          $itemtotalprice = $row['price']*$row['quantity'];
          $subtotal += $itemtotalprice;
          
    ?>
              <tr id="<?php echo $row['cart_id']; ?>">
                <td><img width="80" src="images/<?php echo $row['image']; ?>"></td>
                <td><?php
                        if(strlen($row['name']) > 10){
                          $pieces = explode(" ", $row['name']);
                          for ($i=0; $i < count($pieces); $i++) { 
                            if($i === 2){
                              echo "<br>".$pieces[$i];
                            }elseif($i === 4){
                              echo "<br>".$pieces[$i];
                            }else{
                              echo " ".$pieces[$i];
                            }
                          }
                          //echo str_replace(" ","<br>",$pieces[2]);
                        }else{
                          echo $row['name'];
                        } 
                      ///echo strlen($row['name']); 
                    ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                  <div class="input-group main" id="<?php echo $row['cart_id']+1; ?>">
                    <span class="input-group-btn">
                        <button type="button" id="9" class="btn btn-danger bminus"  data-type="minus">
                          <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="quant" class="qnty" value="<?php echo $row['quantity']; ?>" min="1" max="100" size="2" readonly>
                    <span class="input-group-btn">
                        <button type="button" id="89" class="btn btn-success bplus" data-type="plus">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
                </td>
                <td class="subtotal"><?php echo $itemtotalprice; ?></td>
              </tr>
          <?php }
          $total = (0.1 * $subtotal) + $subtotal;
        }
        else{
          header("Location: home.php");
        }
    ?>
          	</tbody>
          </table>
        </div>
      </div>
      <div class="col-md-5">
        <form method="post">
          <div class="pl-3">
            <ul class="list-group">
              <li class="list-group-item list-group-item-secondary">Cart Sub total <span class="pull-right" id="totalAmount"><?php echo $subtotal; ?> Tk</span></li>
              <li class="list-group-item mt-3 list-group-item-secondary">Tax <span class="pull-right">10%</span></li>
              <li class="list-group-item mt-3 list-group-item-secondary">Shipping cost <span class="pull-right">Free</span></li>
              <li class="list-group-item mt-3 list-group-item-secondary">Total <span class="pull-right" id="finalAmount"><?php echo $total; ?></span></li>
            </ul>
          </div>
          <br>
          <br>
          <a href="checkout.php?price=<?php echo $total; ?>" id="finalurl" class="btn btn-primary pull-right" name="save">checkout</a>
        </form>
        
      </div>
  </div>
</section>
<?php include "layout/footer.php"; ?>
