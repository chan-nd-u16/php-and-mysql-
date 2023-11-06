<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      /* body{
        background-color: #e6e6fe;
      } */

        .topic{
            display: flex;
            justify-content: center;
            /* margin-left: 50%; */
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);
    
$query="SELECT *
FROM ((Orders
INNER JOIN newuserdata ON  newuserdata.id=Orders.customer_id)
INNER JOIN products ON products.id=Orders.product_id);";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    
</style>
<body>


<div class="container my-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center bg-body-tertiary border rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="adminpanel.php">
          <svg class="bi" width="16" height="16"><use xlink:href="#house-door-fill"></use></svg>
         Admin Panel
        </a>
      </li>
      <!-- <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
      </li> -->
      <li class="breadcrumb-item active" aria-current="page">
        Orders
      </li>
    </ol>
  </nav>
</div>
<table class="table  table-striped -sm table-hover">
       <thead>
        <tr>
            <th>Customer Id</th>
             <th>Name</th>
             <th>Product Name</th>
             <th>Address</th>
             <th>Number of products</th>
            <th>Order Date</th>
            <th>Total Price</th>
                      

        </tr>
       </thead>
       <tbody>
          <?php
          $orderidquery="SELECT * FROM `orders`";
            
            $sel=mysqli_query($auth,$query);
            $cal=mysqli_query($auth,$orderidquery);
            
            
                for($i=0;$i<$cal->num_rows;$i++){
                    $one=mysqli_fetch_array($sel);
                    $two=mysqli_fetch_array($cal);
        ?>
                <tr class="tablerow" style="height: 100px;">
                    <td class="align-middle"><?php echo $two['customer_id'];?></td>
                    <td class="align-middle"><?php echo $two['name'];?></td>
                    <td class="align-middle"><?php echo $two['productname'];?></td>
                    <td class="align-middle"><?php echo $two['adress'];?></td>
                    <td class="align-middle"><?php echo $two['quantity'];?></td>
                    <td class="align-middle"><?php echo $two['order_date'];?></td>
                    <td class="align-middle">₹<?php echo $two['total_price'];?></td>
                    

                </tr>

                


        <?php

            }
          
          ?>  

       </tbody>
    </table>
    <!-- <td><?php ?></td> -->
    <!-- echo $two['productname']; -->
    <!-- <a href="insertproducts.php" class="btn btn-primary">ADD PRODUCTS</a> -->
</body>
</html>