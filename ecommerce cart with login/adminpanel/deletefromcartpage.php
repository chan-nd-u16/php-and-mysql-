<?php 
    $host='localhost';
    $username='root';
    $password='root';
    $database='ecommerse';
    $auth=mysqli_connect($host,$username,$password,$database);
    $p=$_POST['id'];

    mysqli_query($auth,"DELETE FROM cart WHERE product_id=$p");
?>