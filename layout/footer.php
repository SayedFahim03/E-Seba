<footer class="container-fluid alert-info">
	<div class="">
		<div class="row">
			<div class="col-md-4">
				<h2 class="mt-2">Important Links</h2>
				<ul class="list-group">
				  <li class="list-group-item text-center"><a class="" href="">Home</a></li>
				  <li class="list-group-item text-center"><a class="" href="">Medicine</a></li>
				  <li class="list-group-item text-center"><a href="">Medicine</a></li>
				  <li class="list-group-item text-center"><a href="">Ambulance</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h2 class="mt-2">Contact Us</h2>
				<ul class="list-group text-info">
				  <li class="list-group-item">Customer Support</li>
				  <li class="list-group-item">6261 3456</li>
				  <li class="list-group-item">7am - 11pm SGT</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h2 class="mt-2">Follow Us</h2>
				<ul class="list-group">
				  <li class="list-group-item"><a href="">Facebook</a></li>
				  <li class="list-group-item"><a href="">Instagram</a></li>
				  <li class="list-group-item"><a href="">Linkin</a></li>
				</ul>
			</div>
		</div>
	</div>
	
</footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/619cd90a6bb0760a4943f212/1fl6avl2t';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script type="text/javascript">
	$(document).ready(function(){

    //Hover Effect
    $(window).scroll(function() {
      var height = $(window).scrollTop();
      if (parseInt(height) == 386) {
        $('.leftP').addClass('animate__animated animate__fadeInLeft')
        $('.rightP').addClass('animate__animated animate__fadeInLeft')
      }
      console.log(height)
    });

    $('.hovering').hover(
      //trigger when mouse hover
      function(){
        $(this).animate({
          marginRight: "-=7%",
        },200);
      },
      //trigger when mouse out
      function(){
        $(this).animate({
          marginRight: "0%",
        },200);
      }
    );


    //medicine
		load_data();
    function load_data(txt)
     {
      $.ajax({
       url:"ajax/medicinelistbyname.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultMedicine').html(data);
       }
      });
     }
  
    $('#search_meditext').keyup(function(){
      //$(this).val()
      //alert($(this).val())
      var txt = $(this).val();
      if (txt != '') {
        load_data(txt);
      }else{
        load_data();
      }
    });


    //Oxygen 
    load_oxygen();
    function load_oxygen(txt)
     {
      $.ajax({
       url:"ajax/oxygenlistbyname.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultOxygen').html(data);
       }
      });
     }
  
    $('#search_oxygentext').keyup(function(){
      //$(this).val()
      //alert($(this).val())
      var txt = $(this).val();
      if (txt != '') {
        load_oxygen(txt);
      }else{
        load_oxygen();
      }
    });

    // load doctors
    load_doctor();
    function load_doctor(txt)
     {
      $.ajax({
       url:"ajax/doctorslistbyname.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultDoctors').html(data);
       }
      });
     }
  
    $('#search_doctext').keyup(function(){
      var txt = $(this).val();
      if (txt != '') {
        load_doctor(txt);
      }else{
        load_doctor();
      }
    });
////////////////////

    // load Blood
    load_blood();
    function load_blood(txt)
     {
      $.ajax({
       url:"ajax/bloodlistbyname.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultBlood').html(data);
       }
      });
     }
  
    $('#search_Blood').keyup(function(){
      var txt = $(this).val();
      if (txt != '') {
        load_blood(txt);
      }else{
        load_blood();
      }
    });


/////////////////

    //ambulance
    load_ambulance();
    function load_ambulance(txt)
     {
      $.ajax({
       url:"ajax/locationsAmbulance.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultAmbulance').html(data);
       }
      });
     }
  
    $('#search_ambulance').change(function(){
      //$(this).val()
      //alert($(this).val())
      var txt = $(this).val();
      if (txt != '') {
        load_ambulance(txt);
      }else{
        load_ambulance();
      }
    });

    //Add to Cart from oxyzen
    $(document).on('click','.addtocartoxygen',function(){
      var getid = $(this).attr('id');
      var carttext = parseInt($('#cartcount').text());
      
      $.ajax({
        url:"ajax/add_cartoxygen.php",
        method:"POST",
        data:{pid:getid},
        success:function(data)
        {
          if (data == 1) {
            alert("Added success in Cart");
            $('#cartcount').text(carttext+1);
          }else{
            alert("Already added in Cart");
          }
          
          
        }
      }); 
    });

    //Add to Cart from medicine
    $(document).on('click','.addtocart',function(){
      var getid = $(this).attr('id');
      var carttext = parseInt($('#cartcount').text());
      //alert(getid + "  " + carttext);
      
      $.ajax({
        url:"ajax/add_cart.php",
        method:"POST",
        data:{pid:getid},
        success:function(data)
        {
          if (data == 1) {
            alert("Added success in Cart");
            $('#cartcount').text(carttext+1);
          }else{
            alert("Already added in Cart");
          }
          
          
        }
      }); 
    });

    $(document).on('click','.bplus',function() {
      $div = $(this).closest('div');
      $tr = $(this).closest('tr');
      var getid = $div.attr("id");
      var getPid = $tr.attr("id");
      var value = parseInt($div.find("input").val())
      var price = parseInt($tr.find("td:nth-child(3)").text());
      cartBackend(value+1,getPid,getid,price)
    })

    function cartBackend(value,getPid,setquantity,price){
      var subtotal = 0
      var total = 0
      $.ajax({
        url:"ajax/update_cart.php",
        method:"POST",
        data:{value:value,productid:getPid},
        success:function(data)
        {
          $("#"+setquantity+" input").val(data);
          $("tr#"+getPid+" td:nth-child(5)").text(price*data);
          $(".subtotal").each(function () {
            subtotal += parseFloat($(this).text());
          });
          total = subtotal*0.1+subtotal
          $("#totalAmount").text(subtotal +" TK");
          $("#finalAmount").text(total);
          
          $("#finalurl").prop("href", "checkout.php?price="+total)
        }
      });
    }

    $(".bminus" ).on('click',function() {
      $div = $(this).closest('div');
      $tr = $(this).closest('tr');
      var getid = $div.attr("id");
      var getPid = $tr.attr("id");
      var value = parseInt($div.find("input").val())
      var price = parseInt($tr.find("td:nth-child(3)").text());

      if(value != 0){
        cartBackend(value-1,getPid,getid,price)
      }
     
    })


    // Appoitments
    $(document).on('click','.appiotments',function() {
      var did = $(this).attr("id")
      $.ajax({
        url:"ajax/appoitmentnow.php",
        method:"POST",
        data:{did:did},
        success:function(data)
        {
          if (data) {
            alert("Request send successfull. Wait couple of minite to approve your request by our admin");
            $("#"+data).text("Pending").addClass("disabled text-danger");
          }else{
            alert("Already added");
          }
          
          
        }
      }); 
      
    })

	})
</script>
  </body>
</html>