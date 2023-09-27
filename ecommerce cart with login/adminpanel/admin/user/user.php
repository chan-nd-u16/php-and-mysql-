<?php
include("credauth.php");
session_start();
if(!isset($_SESSION['name'])){
  header("location:userlogin.php");
}

if(isset($_POST['logout'])){
  session_destroy();
  
  header("location:userlogin.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="jquery-3.6.4.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      
        .header{
          display: flex;
          justify-content: space-between;
          margin-top: 2%;
          width: 70%;
          height: 115px;
          background-color:black;
          border-radius: 25px;
          align-items: center;
          margin: auto;
          color: white;
        }
        .parent{
            display: grid;
            grid-template-columns: 40vh 40vh;
            grid-template-rows: 30vh 30vh;
            gap: 10px;
        }
        .main{
          display: flex;
          justify-content: center;
          margin-top: 3%;
          /* height: 700px; */
        }
        /* .header{

          display: flex;
          justify-content: space-between;
          margin-top: 2%;

        } */
        .header .username h4{
          margin-left: 50%;
        }
        .header .image{
          margin-right: 70px;
        }
        .rightcorner{
          display: block;
          
        }
        .logout{
          margin-left: 12px; 
        }
        .main{
         
            display: grid;
            grid-template-columns: 18rem 18rem 18rem;
            gap:10px;
            
        }
        .cardd{
         
          margin: auto;

        }
        .cc{
          height: 27rem;

        }
        .cc:hover{
          background-color: whitesmoke;
        }
       
       .cardd .cc #quantity:active{
          border: 1px solid white;
          /* text-decoration: none; */

        }


        /* span {cursor:pointer; }
		.number{
			margin:100px;
		}
		.minus, .plus{
			width:20px;
			height:20px;
			background:#f2f2f2;
			border-radius:4px;
			padding:8px 5px 8px 5px;
			border:1px solid #ddd;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
		}
		input{
			height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
			border:1px solid #ddd;
			border-radius:4px;
      display: inline-block;
      vertical-align: middle;
    } */
    input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"]{
  -moz-appearance: textfield;
  -webkit-appearance: none;
}
.siz{
  font-size: 40px;
  display: flex;
  justify-content: flex-end;
  /* margin-top: 4%; */
}
.bb{
  background-color: black;
}
.bb:hover{
  background-color: black;
}
.ch{
  background-color: black;
  color: white;
}
.ch:hover{
  background-color: rgb(176, 176, 176);
}
.ch:active{
  background-color: black;
}
/* body{
  background-color: whitesmoke;
} */

    
    </style>
</head>
<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="https://static.vecteezy.com/system/resources/thumbnails/008/826/851/small/abstract-initial-letter-mz-logo-in-black-color-isolated-in-white-background-applied-for-clothing-brand-logo-also-suitable-for-the-brands-or-companies-that-have-an-initial-name-zm-vector.jpg"
        height="55"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">ECBAY</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <!-- <button type="button" class="btn btn-link px-3 me-2">
        
        </button> -->
        <!-- <button type="button" class="btn btn-primary me-3"> -->
          <div class="logoutt">

          </div>
        <form method="post">
                <input type="submit" class="bb btn btn-dark  me-3"  name="logout" value="log out" style="padding:4px;">
        </form>
          
        <!-- </button> -->
              <i class="siz fa-solid fa-cart-shopping" id="vv" type="submit" data-bs-toggle="offcanvas" name="cart" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color:black;"></i>

        <!-- <a
          class="btn btn-dark px-3"
          href="https://github.com/mdbootstrap/mdb-ui-kit"
          role="button"
          ><i class="fab fa-github"></i
        ></a> -->
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<!-- <nav class="navbar navbar-dark bg-dark" aria-label="Light offcanvas navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a> -->
      <!-- <i class="siz fa-solid fa-cart-shopping" id="vv" type="submit" data-bs-toggle="offcanvas" name="cart" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color:black;"></i> -->





      <!-- </div>
  </nav> -->
<!-- <i class="fa-solid fa-cart-shopping"></i> -->
<!-- <form method="post"> -->
<!-- <input type="submit" name="cart" > -->
<!-- </form> -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">CART </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" id="cat">
    <?php
        // $sqlcall=mysqli_query($auth,"SELECT *
        // FROM ((cart
        // INNER JOIN newuserdata ON cart.user_id = newuserdata.id)
        // INNER JOIN products ON cart.product_id = products.id);");
 
        //   while($cartonerow=mysqli_fetch_array($sqlcall)){
              
          
    ?>
    
    
</div>
<a href="http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/cartpage.php" class="btn btn-primary" style="width:100%;margin:auto;border-radius:0;">Check Out</a>     


  


    <?php
          // }
        
          ?>
    
  </div>
</div>











        <div class="header">
                <div class="username">

                    <h4><?php echo $_SESSION['name'];?></h4>
                </div>
                <div class="rightcorner">
                        <div class="image">
                            <?php echo $_SESSION['profile'];?>
                        </div>
                        <div class="logout">
                        <!-- <form method="post">
                            <input type="submit"   name="logout" value="log out" style="border-radius:10px;padding:4px;margin-left:5px">
                            </form> -->
                        </div>


                </div>
        </div> 
        <div class="main">
            <?php
            $find=mysqli_query($auth,"SELECT * FROM `products`");
            $findcartid=mysqli_query($auth,"SELECT * FROM `cart`");
            $userid=$_SESSION['id'];
            // $emp=array();
            // $count=1;
            // $cartid=0;
            $cart_id=$_SESSION['id']+23;
            
            
            
            for($i=0;$i<$find->num_rows;$i++){
                $onerow=mysqli_fetch_array($find);
                $secrow=mysqli_fetch_array($findcartid);
                // echo $secrow['cart_id'];
                $product_id=$onerow['id'];
                // $count=array_count_values($onerow,$product_id);
                // echo $count;
                // $quantity=$count;


            ?>
            <div class="cardd">
            <div class="cc card" style="width: 16rem;">
                    <img src="images/<?php echo $onerow['productimage']; ?>" class="card-img-top" alt="..." style="height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $onerow['productname']; ?></h5>
                        <p class="card-text">₹<?php echo $onerow['productprice'];?></p>
                        <p class="card-text"><?php echo $onerow['productdesc'];?></p>
                        

                        <form  method="post" id="myform">
                        <!-- <input type="number" id="quantity" name="quantity" value="1" min="1" max="100" style="border:solid white;"> -->
                        <!-- <div class="number">
	<span class="minus">-</span>
	<input type="text" name="quantity" value="1"/>
	<span class="plus">+</span>

</div> -->

                          <div class="input-group">
                            <input type="button" value="-" class="button-minus" data-field="quantity">
                            <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                            <input type="button" value="+" class="button-plus" data-field="quantity">
                          </div>
                        <input  class="ch btn btn-dark" name='<?php echo $onerow['id'];?>' type="submit" value="Add to cart" style="width: 50%;">
                        </form>
                    </div>
                    </div>

            </div>
                    



            <?php
            if(isset($_POST[$onerow['id']])){

              $rows=mysqli_query($auth,"SELECT * FROM `cart` WHERE user_id=$_SESSION[id] AND product_id=$product_id AND cart_id=$cart_id");

              // if($product_id==$_POST[$onerow['id']]){
                if($rows->num_rows==0){

                  $count=$_POST['quantity'];

                  $insertt=mysqli_query($auth,"INSERT INTO `cart`(cart_id,user_id,product_id,quantity_incart) VALUES($cart_id,$userid,$product_id,$count)");
              // $select=mysqli_fetch_array(mysqli_query($auth,"SELECT * FROM  `cart`"));
              
                }
              // }
              else{
                $count=$_POST['quantity'];

                // $cart=mysqli_fetch_array(mysqli_query($auth,"SELECT * FROM `cart` WHERE product_id=$product_id"));
                // $cartid=$cart['cart_id'];
                
                // $afteradd=mysqli_query($auth,"UPDATE `cart` SET quantity=$count where product_id=$product_id)");
                mysqli_query($auth,"UPDATE `cart` SET quantity_incart = $count WHERE cart_id = $cart_id AND product_id=$product_id");
                // $count++;
              }
            }
            // if($count>1){ 
            //     $cart=$secrow['cart_id'];
            //     mysqli_query($auth,"UPDATE `cart` SET `quantity` = $count WHERE product_id=$product_id");
            // }
            } 
            ?>

        </div>       
</body>
<?php
  // $sql=mysqli_query($auth,"SELECT product_id FROM `cart` WHERE user_id=$userid");
  // $r=mysqli_fetch_all($sql,MYSQLI_ASSOC);
  // print_r($r);
           

?>
<script>

// console.log(data)


  	
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


$('#vv').click(function(e){

    e.preventDefault();
    $.ajax({
      url:'usercart.php',
      type:'post',
      success:function(res){
        $('#cat').html(res)

      }

    })
})










</script>
</html>

