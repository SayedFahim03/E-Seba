		
	</div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#sidebarCollapse').on('click',function(){
			$('#sidebar').toggleClass('active');
		})

		// appoitments
		$(document).on('click','.approve',function() {
      var apt_id = $(this).attr("id");
      var status = 1
      appoitmentAjax(apt_id,status)
    })

    function appoitmentAjax(apt_id,status){
    	$.ajax({
        url:"ajax/updateappoitments.php",
        method:"POST",
        data:{apt_id:apt_id,status:status},
        success:function(data)
        {
          if(data){
          	alert("Updated successfull");
          	$("#rep_"+data).html("<h4 class='text-success'>approved</h2>");
          }
        }
    	});
    }

    $(document).on('click','.unapprove',function() {
      var apt_id = $(this).attr("id");
      var status = 2
      appoitmentAjax(apt_id,status)
    })


    /// pharmacy
    $('#search_seller').change(function(){
      
      var txt = $(this).val();
      if (txt != '') {
        load_sellerpharmacy(txt);
      }
    });

    function load_sellerpharmacy(txt)
     {
      $.ajax({
       url:"ajax/sellerByName.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultSeller').html(data);
       }
      });
     }

     /// Oxygen
    $('#search_oxygen').change(function(){
      
      var txt = $(this).val();
      if (txt != '') {
        load_oxygenByseller(txt);
      }
    });

    function load_oxygenByseller(txt)
     {
      $.ajax({
       url:"ajax/oxygenByseller.php",
       method:"POST",
       data:{txt:txt},
       success:function(data)
       {
        $('#resultOxygen').html(data);
       }
      });
     }

	})
</script>
  </body>
</html>