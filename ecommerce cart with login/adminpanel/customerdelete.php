<?php

$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);

$id=$_GET['id'];
$q="DELETE FROM `newuserdata` WHERE id=$id";
if(mysqli_query($auth,$q)){
    header('location:customer.php');
}

?>