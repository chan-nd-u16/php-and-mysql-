<?php 

include('credauth.php');
$prod_id=$_GET['productid'];
if(mysqli_query($auth,"DELETE FROM cart WHERE product_id=$prod_id")){
    header('location:user.php');
    
}




?>