<?php 
    include('credauth.php');
    session_start();
    if(!(isset($_SESSION['name']))){
        header("location:adminlogin.php");


    }
?>
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