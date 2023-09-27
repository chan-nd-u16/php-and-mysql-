<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
 body{
  background-color: #94add7ff;
 }
      .inner{
        height: 70vh;
        width: 55vh;
        background-color:#8ddfcbff;
        /* border-radius: 35px; */
        margin: auto;
        margin-top: 8%;
        display: flex;
        justify-content: space-evenly;
       
      
      }
      .inner:hover{
        height: 70vh;
        width: 55vh;
        background-color:#8ddfcbff;
        /* border-radius: 35px; */
        margin: auto;
        margin-top: 8%;
        display: flex;
        justify-content: space-evenly;
        box-shadow: 0 20px 20px 0 grey;
       
      
      }
      .toaligncenter{
        margin: 5% 0 0 26%;

      
      
      }
      .main .formcontainer .inner .toaligncenter input{
        margin-top: 10px;
        padding: 4px;
        border-radius: 10px;
      }
      .vv{
        background-color: #94add7ff;
      }
    </style>
  </head>
<body>
<h2 style="text-align: center;"> USER SIGN UP PAGE</h2>
  <div class="main">
  

  <div class="formcontainer">
    
    
    <div class="inner">
      <div class="toaligncenter">

        <form  method="post" enctype="multipart/form-data">

          <input type="text" name="name" id="" placeholder="name">
          <input type="text" name="username" id="" placeholder="username" required>
          <input type="file" name="productimg" id="">
          <input type="text" name="phone" placeholder="Phone">
          <input type="email" name="email" placeholder="email" required>
          <input type="text" name="password" placeholder="password">
      
          <input type="submit" class="vv" value="CREATE ACCOUNT" name="submit">
          
      
      
          </form>
      </div>

    </div>
  
  
  
  </div>

  </div>



    
</body>
</html>
<?php

$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);
$outMessageorError = '';

$targetDir = "images/";
  if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $u_name = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $sql = "INSERT INTO `admin`(name,username,phone,email,password) VALUES('$name','$u_name','$phone','$email','$password')";
        // $result = $auth->query($sql);
        // if ($result == TRUE){
        //   echo "New Admin created successfully.";
        //   // header("location:http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/adminpanel.php#");
        // }else{
        //   echo "Error:".$sql. "<br>".$conn->error;
        // }
       
  }

  if(!empty($_FILES["productimg"]["name"])){

         
          
    $fileName = rand(1000,10000)."-".$_FILES["productimg"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    echo $fileType;
    if(in_array($fileType, array('jpg','png','jpeg','gif'))){

    if(move_uploaded_file($_FILES["productimg"]["tmp_name"], $targetFilePath)){






    // $insert = mysqli_query($auth,"INSERT INTO products(productname,productdesc,productimage,productprice,stockstatus,quantity) VALUES ('".$name."','".$desc."', '".$fileName."','".$price."','".$check."','".$quan."')");
    $insert = mysqli_query($auth,"INSERT INTO `newuserdata`(name,username,profile,phone,email,password) VALUES('$name','$u_name','$fileName','$phone','$email','$password')");

    
    
    
    if($insert){
    $outMessageorError = "The file ".$fileName. " has been uploaded successfully.";
    // sleep(2);
    header('location:userlogin.php');

    
    }else{
        $outMessageorError = "Imaghe cant be uplaoded";
    }
    }else{
        $outMessageorError = "Some error";
    }
    }else{
        $outMessageorError = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
  }
  else{

    // $outMessageorError = 'Please select a file to upload.';
  }
    echo$outMessageorError;


  ?>