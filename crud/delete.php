<?php
include('credauth.php');
$id=$_GET['id'];
$q="DELETE FROM `data` WHERE id=$id";
if(mysqli_query($auth,$q)){
    header('location:read.php');
}

?>