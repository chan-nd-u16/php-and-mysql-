<?php


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include('credauth.php');
$id=$_POST['id'];
$q="DELETE FROM `newuserdata` WHERE id=$id";
mysqli_query($auth,$q);
    

?>