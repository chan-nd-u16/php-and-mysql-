<?php
session_start();
$userid=$_SESSION['id'];
include('credauth.php');
 $sqlcall=mysqli_query($auth,"SELECT *
        FROM ((cart
        INNER JOIN newuserdata ON cart.user_id = newuserdata.id)
        INNER JOIN products ON cart.product_id = products.id) WHERE user_id=$userid");
//  echo"<div class='card mb-3' style='max-width: 540px;'id=>";
          while($cartonerow=mysqli_fetch_array($sqlcall)){
            // $proname= $cartonerow['productname'];
echo "
<div class='card mb-3' style='max-width: 540px;'>
<div class='row g-0'>
  <div class='col-md-4'>
    <img src='images/$cartonerow[productimage]' class='mg-fluid rounded-start'  style='height:150px;width:120px'>
  </div>
  <div class='col-md-8'>
    <div class='card-body'>
      <h5 class='card-title'>$cartonerow[productname]</h5>
      <p class='card-text'>₹$cartonerow[productprice]</p>
      <p class='card-text'>
            <div class='input-group'>
                <input type='button' value='' class='button-minus' data-field='quantity'>
                <input type='number' step='1' max='' value='$cartonerow[quantity_incart]' name='quantity' class='quantity-field'>
                <input type='button' value='' class='button-plus' data-field='quantity'>
            </div>
            
       </p>
       
       <a href='usercartdelete.php?productid=$cartonerow[product_id]' class='btn btn-warning' style='width:125px;margin-top:2%;'>Remove</a>
            
      
    </div>
  </div>
  </div>
  </div>
";







}
// <a href='usercartupdate.php?productid=$cartonerow[product_id]'  class='btn btn-info' style='width:125px'>Update</a>
// <a href='usercartdelete.php?productid=$cartonerow[product_id]' class='btn btn-warning' style='width:125px;margin-top:2%;'>Remove</a>
// <button id='$cartonerow[product_id]' class='btn btn-info' style='width:125px'>checkout</button>       //   echo "</div>";
        // <input type=\"number\" name='' id='' value=$cartonerow[quantity_incart]>

?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<script>
     function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});
</script>