<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      input{
        margin-top: 3%;
      }
    </style>
  </head>
<body>
    <form action="create.php" method="post">
    <input type="text" name="name" id="" placeholder="name"  class="form-control">
    <input type="text" name="age" placeholder="age"  class="form-control">
    <input type="text" name="email" placeholder="email"  class="form-control">
    <input type="submit" value="submit" name="submit"  class="btn btn-primary">
    <input type="range" value="range">


    </form>
</body>
</html>
<?php
include("credauth.php");
  if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $sql = "INSERT INTO `data`(name, age, email) VALUES ('$name','$age','$email')";
        $result = $auth->query($sql);
        if ($result == TRUE){
          echo "New record created successfully.";
          header("location: read.php");
        }else{
          echo "Error:". $sql . "<br>". $conn->error;
        }
        // $conn->close();
  }
  ?>