<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        body{
            background-color: #21201dff;
            padding:20% 0% 0% 0%;
        }
        .card{
            margin: auto;
            background-color: #F6F7EB;
           
           
        }
        .card{
            display: block;
            height: 200px;

            /* padding:5% 0 5% 0; */
        }
        /* .cls{
            position: absolute;
            left: 10px;
            
        }
        .cls1{
            position: absolute;
            right: 30px;
        } */
        .div1{
          
            position: relative;
        }
        .div2{
            position: relative;
        }
        .div1 i{
            position: absolute;
            top:5px;
            /* left: -1px; */
        } 
        .div2 i{
            position: absolute;
            /* left: 20px; */
            top: 5px;
        }
        input{
            margin-top: 20px;
        }
        i{
            margin-top: 20px;

        }
    </style>
</head>
<body>


<form action="login.php" method="get">
<div class="card text-center mb-3" style="width: 18rem;">
  <div class="card">
    <div style="display: block;">
    <div class="div1">
            <i class="fa-solid fa-envelopes-bulk" class='cls'></i>
            <input type="text" style="padding-left: 20px; " name="user" placeholder="Username">

    </div>
    <div class="div2">
        <i class="fa-solid fa-lock" class='cls1'></i>
        <input type="password" style="padding-left: 20px;" name="pas"placeholder="password">
        

    </div>
           
  
    <div style="display: flex; padding-left:30px;margin-top:10px">
    <!-- <button>Login</button> -->
    <input type="submit" value="Login" >
    <h5 style="margin-top: 7%;margin-left:2%"><a href="signup.php" style="text-decoration: none;">sign up</a></h5>
    </div>
    

    </div>
    
    
  </div>
</div>
</form>

</body>
</html>
<?php



$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);


if(isset($_GET['user'])&&isset($_GET['pas'])){

$u_name=$_GET['user'];
$pa=$_GET['pas'];

$find="SELECT username FROM newuserdata WHERE username = '$u_name'";
$call=mysqli_query($auth,$find);
$call1=mysqli_fetch_array($call)[0];



$adq="SELECT username FROM `admin` WHERE username = '$u_name'";
$admincall=mysqli_query($auth,$adq);
$adminusername=mysqli_fetch_array($admincall)[0];
$adqp="SELECT password FROM `admin` WHERE username='$adminusername'";
$admincall1=mysqli_query($auth,$adqp);
$adminpassword=mysqli_fetch_array($admincall1);

if(($u_name==$adminusername)&&($pa==$adminpassword)){
    header("location:http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/adminpanel.php");

}
else if(mysqli_num_rows($call)>0){
    $u="SELECT password FROM newuserdata WHERE username='$call1'";
    
    // $check=mysqli_fetch_assoc($call);
    $query=mysqli_query($auth,$u);
    $query1=mysqli_fetch_array($query)[0];
    if($query1===$pa){
        
        header("location:page.html");
    }
    else{
        // echo $query1;
        echo "<h2 style='text-align:center;color:white'>Enter the correct username and  Password</h2>";
    }
    // if($q==$pa){
        
    //     echo "<h1 style='text-align:center;color:white'>Password Correct</h1>";
        
    // }



}
else{
    echo "<h2 style='text-align:center;color:white'>There is no username,try sign up </h2>";
}





}

?>