<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<body>
    <H3 style="text-align: center;background-color:grey;">ORDERS</H3>
<table class="table table-striped">
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