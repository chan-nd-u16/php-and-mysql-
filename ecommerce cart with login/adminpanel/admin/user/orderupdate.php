<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    input{
        margin-top: 3%;
    }
</style>
<body>
    <form action="orderupdate.php" method="post">
        <input type="text" name="id" id="" value="<?php print ($_GET['id']);?>" class="form-control">
        
        <input type="text" name="customer_id" id="" placeholder="customer Id"value="<?php print ($_GET['customer_id']);?>" class="form-control">
        <input type="text" name="product_id" id="" placeholder="product Id" value="<?php print ($_GET['product_id']);?>" class="form-control">
        <input type="text" name="quantity" id="" placeholder="Quantity" value="<?php print ($_GET['quantity']);?>"class="form-control">
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
    </form>
    
</body>
</html>
<?php
$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);

if(isset($_POST['submit'])){

    $Id=$_POST['id'];
    
    $cus_id=$_POST['customer_id'];
    $prod_id=$_POST['product_id'];
    $quan=$_POST['quantity'];
    

 
 $q="UPDATE `orders` SET  `customer_id` = $cus_id ,`product_id` = '$prod_id', `quantity` = '$quan' WHERE `id` = $Id";
 if(mysqli_query($auth,$q)){
    header("location:orders.php");
}


}
?>