<?php
session_start();
$orderid=$_SESSION['orderid'];
include('credauth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jsPDF/dist"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.horizontal-timeline .items {
border-top: 2px solid #ddd;
}

.horizontal-timeline .items .items-list {
position: relative;
margin-right: 0;
}

.horizontal-timeline .items .items-list:before {
content: "";
position: absolute;
height: 8px;
width: 8px;
border-radius: 50%;
background-color: #ddd;
top: 0;
margin-top: -5px;
}

.horizontal-timeline .items .items-list {
padding-top: 15px;
}
body{
  background-color: #eeeeee;
}
    
    </style>
</head>
<body>
    <div>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card border-top border-bottom border-3" id="content" style="border-color: #f37a27 !important;">
          <div class="card-body p-5">

            <p class="lead fw-bold mb-5" style="color: #f37a27;">Order Reciept</p>

            <div class="row">
              <div class="col mb-3">
                <p class="small text-muted mb-1">Date</p>
                <?php
                $getdate=mysqli_fetch_array(mysqli_query($auth,"SELECT * FROM orders WHERE id=$orderid"));

                ?>
                <p><?php echo $getdate['order_date'];?></p>
              </div>
              <div class="col mb-3">
                <p class="small text-muted mb-1">Order No.</p>
                <p><?php echo $orderid; ?></p>
              </div>
            </div>
            <?php
            $totalpriceincart=0;
           
            $userid=$_SESSION['id'];
            
             $sqlcall=mysqli_query($auth,"SELECT *
                    FROM ((cart
                    INNER JOIN newuserdata ON cart.user_id = newuserdata.id)
                    INNER JOIN products ON cart.product_id = products.id) WHERE user_id=$userid");
            //  echo"<div class='card mb-3' style='max-width: 540px;'id=>";
            $totalpriceincart=0;
                      while($cartonerow=mysqli_fetch_array($sqlcall)){

            ?>
            <div class=" border mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
              <div class="row">
                <div class="col-md-8 col-lg-9">
                  <p><?php  echo $cartonerow['productname'];?>    - <?php  echo $cartonerow['quantity_incart'];?></p>
                  <p>
                    ₹
                  <?php  echo $cartonerow['productprice'];?>
                  </p>
                </div>
                <div class="col-md-4 col-lg-3">
                  <p>₹<?php  $tot=$cartonerow['quantity_incart']*$cartonerow['productprice'];$totalpriceincart+=$tot; echo $tot;?></p>
                </div>
              </div>
              
            </div>
            <?php
            }
            ?>

            <div class="row my-4">
              <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                <p class="lead fw-bold mb-0" style="color: #f37a27;">₹ <?php  echo $totalpriceincart;?></p>
              </div>
            </div>

            <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

            <div class="row">
              <div class="col-lg-12">

                <div class="horizontal-timeline">

                  <ul class="list-inline items d-flex justify-content-between">
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                        class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                    </li>
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped</p
                        class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                    </li>
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">On the way
                      </p>
                    </li>
                    <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                      <p style="margin-right: -8px;">Delivered</p>
                    </li>
                  </ul>

                </div>

              </div>
            </div>

            <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please contact
                us</a></p>
                <button  class="btn btn-success" onclick="func()">download</button>
                
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
        </div>
        
            





        
</body>
</html>
<script>

function func(){
window.jsPDF=window.jspdf.jsPDF;
var doc=new jsPDF();
var element=document.querySelector('#content');

doc.html(
    element,{
        callback:function(doc){
            doc.save('Order_Reciept<?php echo $orderid;?>.pdf');

    },
    x:15,
    y:15,
    width:170,
    windowWidth:750

}
)
}


</script>