<?php
//   while($onerow=mysqli_fetch_array(mysqli_query($auth,"SELECT * FROM `cart` ")))
session_start();
$userid=$_SESSION['id'];
include('credauth.php');
 $sqlcall=mysqli_query($auth,"SELECT *
        FROM ((cart
        INNER JOIN newuserdata ON cart.user_id = newuserdata.id)
        INNER JOIN products ON cart.product_id = products.id) WHERE user_id=$userid");
//  echo"<div class='card mb-3' style='max-width: 540px;'id=>";
          while($cartonerow=mysqli_fetch_array($sqlcall)){
            $total=$cartonerow['productprice']*$cartonerow['quantity_incart'];

        echo "<div class='card rounded-3 mb-4'>
          <div class='card-body p-4'>
            <div class='row d-flex justify-content-between align-items-center'>
              <div class='col-md-2 col-lg-2 col-xl-2'>
                <img
                  src='images/$cartonerow[productimage]'
                  class='img-fluid rounded-3' alt='Cotton T-shirt'>
              </div>
              <div class='col-md-3 col-lg-3 col-xl-3'>
                <p class='lead fw-normal mb-2'>$cartonerow[productname]</p>
                <p><span class='text-muted'>₹$cartonerow[productprice]</p>
              </div>
              <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                <button class='btn btn-link px-2'
                  onclick='this.parentNode.querySelector('input[type=number]').stepDown()'>
                  <!-- <i class='fas fa-minus'></i> -->
                </button>

                <input id='form1' min='0' name='quantity' value='$cartonerow[quantity_incart]' type='number'
                  class='form-control form-control-sm'/>

                <button class='btn btn-link px-2'
                  onclick='this.parentNode.querySelector('input[type=number]').stepUp()'>
                  <!-- <i class='fas fa-plus'></i> -->
                </button>
              </div>
              <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                <h5 class='mb-0'>₹$total</h5>
              </div>
              <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                <button style='border: none;' id='$cartonerow[product_id]' class='text-danger'><i class='fas fa-trash fa-lg'></i></button>
              </div>
            </div>
          </div>
        </div>

<script>

 console.log('$cartonerow[product_id]')
   $('#$cartonerow[product_id]').click(function(e){

e.preventDefault();
$.ajax({
  url:'deletefromcartpage.php',
  type:'post',
  data:{id:$cartonerow[product_id]}
  

})
})
</script>";
       


          }
          
          ?>
        