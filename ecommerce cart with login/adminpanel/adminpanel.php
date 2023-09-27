<?php


session_start();
if(!isset($_SESSION['name'])){
  header("location:adminlogin.php");
}
if(isset($_POST['logout'])){
  session_destroy();
  
  header("location:http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/adminlogin.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>

 body{
  /* background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfzh8o6UdYAw2F5UA4jIl0VfR2Y8yG2gzR0QOfU8_rL3PFIOctBFE4gzBxVVqEN0Ciu58&usqp=CAU); */
  background-image: url(https://plus.unsplash.com/premium_photo-1661302846246-e8faef18255d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YWRtaW58ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=600&q=60);
  background-size: cover;
  /* background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfzh8o6UdYAw2F5UA4jIl0VfR2Y8yG2gzR0QOfU8_rL3PFIOctBFE4gzBxVVqEN0Ciu58&usqp=CAU);
  background-repeat: no-repeat; */
  

  /* background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZkhDFlhddTRhZScijrtMV4QeN6B-Ea5mo9eo_BUostCfs4myTUBsvZRzHyUVcGAbJ9a4&usqp=CAU); */
  /* background-image:url(https://png.pngtree.com/background/20211217/original/pngtree-technology-round-dashboard-picture-image_1598385.jpg); */
 }
        
        .header{
          width: 70%;
          height: 150px;
          background-color: black;
          border-radius: 25px;
          align-items: center;
          margin: auto;
          color:white;
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
        }
        .header{

          display: flex;
          justify-content: space-between;
          border:solid 3px white;
          /* margin-top: 2%; */

        }
        .header .username h3{
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
        .yow:hover{
          background-color: #e5e5e5;
          color: black;
        }
        .or{
          background-image: url(https://img.freepik.com/free-vector/delivery-service-with-mask-concept_23-2148517154.jpg?size=626&ext=jpg&ga=GA1.2.903070473.1693140447&semt=ais);
          background-size: cover;
        }
        .pr{
          background-image: url(https://img.freepik.com/free-vector/shopping-cart-with-bags-gifts-concept-illustration_114360-18775.jpg?size=626&ext=jpg&ga=GA1.2.903070473.1693140447&semt=sph);
          background-size: cover;
        }
        .us{
          background-image: url(data:image/jpeg;base64,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);
        background-size: cover;
        }
        .ad{
          /* background-image: url(data:image/jpeg;base64,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); */
         background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT00JJSV9eoYJe3-MT9OavpuxVvkPx6SeIfKw&usqp=CAU);
          background-size: cover;
        }
        /* h5{
          color:white
        } */
        

    </style>
</head>
<body>
  <h3 style="text-align: center;color:white;text-shadow: 2px 2px #ff0000;">ADMIN PANEL</h3>
<div class="header">
          <div class="username">

            <h3><?php echo $_SESSION['name'];?></h3>
          </div>
          <div class="rightcorner">
                <div class="image">
                    <?php echo $_SESSION['profile'];?>
                </div>
                <div class="logout">
                  <form method="post">
                    <input type="submit"  name="logout" value="log out" style="border-radius:10px;">
                    </form>
                </div>


          </div>
          

</div>

<div class="main">



<div class="parent">
<div class="or card">
  <div class="card-header">
    ORDERS
  </div>
  <div class="card-body">
    <h5 class="card-title" style="color:white;text-shadow: 2px 2px black">Order</h5>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="orders.php" class="yow btn btn-dark">Go Orders</a>
  </div>
</div>


<div class="pr card">
  <div class="card-header">
    PRODUCTS 
  </div>
  <div class="card-body">
    <h5 class="card-title" style="color:white;text-shadow: 2px 2px black">Products</h5>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/products.php" class="yow btn btn-dark">Go Products</a>
  </div>
</div>


<div class="us card">
  <div class="card-header">
    USERS
  </div>
  <div class="card-body">
    <h5 class="card-title" style="color:white;text-shadow: 2px 2px black">Users/Customer</h5>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="customer.php" class="yow btn btn-dark">Go Users</a>
  </div>
</div>

<div class="ad card">
  <div class="card-header">
    ADMIN
  </div>
  <div class="card-body">
    <h5 class="card-title" style="color:white;text-shadow: 2px 2px black">Add admin/Moderaters</h5>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <a href="http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/admindd.php" class="yow btn btn-dark">Go Admin</a>
  </div>
</div>

</div>

</div>









   
    
</body>
</html>
