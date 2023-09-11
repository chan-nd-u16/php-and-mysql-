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
    <form action="update.php" method="post">
        <input type="text" name="id" id="" value="<?php print ($_GET['id']);?>" class="form-control">
        <input type="text" name="name" id="" placeholder="name" value="<?php print ($_GET['name']);?>" class="form-control">
        <input type="text" name="age" id="" placeholder="Age"value="<?php print ($_GET['age']);?>" class="form-control">
        <input type="text" name="email" id="" placeholder="Email" value="<?php print ($_GET['email']);?>" class="form-control">
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
    </form>
    
</body>
</html>
<?php 

   include('credauth.php');
   if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $Id=$_POST['id'];

    
    $q="UPDATE `data` SET `name` = '$name', `age` = $age, `email` = '$email' WHERE `id` = $Id";
    if(mysqli_query($auth,$q)){
        header("location: read.php");
    }

   
   }
?>