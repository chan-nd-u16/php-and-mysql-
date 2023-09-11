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
            display: block;
            margin: auto;
            margin-top: 9%;
        }
        #btn{
            margin: auto;
            margin-top: 5%;
        }
        .div{
            border: solid;
            margin: auto;
            width: 35%;
            height: 430px;
            background-color: #F6F7EB;
            border-radius: 10;
            /* padding: 10% 10% 10% ; */
            /* margin-top: 2%; */
            /* padding: ; */

        }
        body{
            background-color: #21201dff;
            padding:10% 0% 0% 0%;
        }
    </style>
</head>
<body>
    <div class="div">
        <form action="signup.php" method="get">

                <input type="text" name="name" id="" placeholder="Name">
                <input type="text" name="username" id="" placeholder="UserName">
                <input type="number" name="phone" id="" placeholder="phone">
                <!-- <input type="text" name="" id=""> -->
                <input type="email" name="email" id="" placeholder="Email">
                <input type="password" name="pass" id="" class="pas" placeholder="Password">
                
                <input type="submit" value="Sign up" id="btn">
        </form>
        <hr width="0" class="hh">

    </div>
    
</body>
<script src="passwordcheck.js"></script>

</html>
<?php
    // include('auth.php');
    $host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);
  

if(isset($_GET['name'])&&isset($_GET['username'])&&isset($_GET['phone'])&&isset($_GET['pass'])&&isset($_GET['email'])){
    $name=$_GET['name'];
    $username=$_GET['username'];
    $phone=$_GET['phone'];
    $email=$_GET['email'];
    $password=$_GET['pass'];



    $find="SELECT password FROM `newuserdata` where username='$username';";
    $p=mysqli_query($auth,$find);
    if($p->num_rows==0){
        $sq="INSERT INTO `newuserdata`(name,username,phone,email,password) values('{$name}','{$username}','{$phone}','{$email}','{$password}')";
        mysqli_query($auth,$sq);
        echo "'<h3 style='text-align:center;color:white'>signed up successfully</h3>'";
        header("location:login.php");
        

    }
    else{
        echo "'<h3 style='text-align:center;color:white'>This UserName is already present,try Another</h3>'";
        
    }

    


    
}

   
    
    



?>