<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>

        body{
            background-color:#9bf6ff;
        }
        .formcontainer{
            display: flex;
            justify-content: center;
           margin-top: 8%;

        }
       .formcontainer .fom{
            height: 70vh;
            width: 60vh;
            background-color:#bdb2ff;
            border-radius: 35px;
            display: flex;
            justify-content: center; 

           

        }
        .fom:hover{
            height: 70vh;
            width: 60vh;
            background-color:#bdb2ff;
            border-radius: 35px;
            display: flex;
            justify-content: center; 
            box-shadow: 10px 0px 10px 0px grey;
            
           

        }
        .email input{
            
            margin-top: 35vh;
            padding: 5px;
            border-radius: 10px;
        }
        .password input{
            margin-top: 10%;
            padding: 5px;
            border-radius: 10px;

        }
        .button input{
            margin-top: 14%;
            padding: 7px;
            border-radius: 10px;
            background-color:#65b9ffff;
        }
        .buttonn input{
            margin-top: 7%;
            padding: 7px;
            border-radius: 10px;
            background-color:#e73d62ff;
        }
        .buttons{
            margin-top: 10%;
            display: flex;
            justify-content: space-between;
        }
        .formcontainer .fom .innerbox .email{
            position: relative;
            
        }
        .formcontainer .fom .innerbox .password{
            position: relative;
            
        }
        .email i{
            position:absolute;
            top: 90%;
            left: 3%;
            
        }
        .password i{
            position:absolute;
            top: 53%;
            left: 3%;
            
        }
        .formcontainer .fom .imga{
            /* position: relative;
            left: 43%; */
            display: flex;
            justify-content: center;
           margin-top: 2%;

        }
        
        .form{
            margin-top: -150px;
        }
        


    </style>
</head>
<body>
<h2 style="text-align: center;"> USER LOGIN PAGE</h2>

    <div class="formcontainer">
        

        <div class="fom">
        
            <div class="innerbox">
            <div class="imga">

<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAr9PWKz655ZGxzaPPo_hwnIYov6xZp_z4mRdkR5eCAmScLt5KMGwKLh4k1dLY8x0yl9o&usqp=CAU" alt="" style="height: 160px;width:160px;border-radius:50%;">
</div>
<div class="form">


            <form method="post">
            
                <div class="email"><i class="fa-solid fa-envelope fa-fade"></i><input type="email" name="email" id="" placeholder="Email " style="padding-left: 21px; " ></div>
                <div class="password"><i class="fa-solid fa-lock fa-beat"></i><input type="password" name="password" id="" placeholder="Password" style="padding-left: 21px; "></div>
                <div class="buttons">

                
                <div class="button"><input type="submit" name="submit" value="Log in"></div>
                <div class="buttonn"><input  type="submit" name="signin" value="Create account"></div>

                </div>
                


            </form>

           
            </div>

            </div>

            

        </div>
        

    </div>
    
</body>
</html>
<?php
include("credauth.php");


if(isset($_POST['submit'])){


    $email=$_POST['email'];
    $pass=$_POST['password'];
    // $mailcheck=mysqli_query($auth,"SELECT * FROM `admin` WHERE email='$email'");

//  $findname=mysqli_query($auth,"SELECT admin.name FROM `admin` WHERE email='$email' AND password='$pass'");
//  $name=mysqli_fetch_array($findname);
 
 

 
   


    

    // if($mailcheck->num_rows>0){
        $find=mysqli_query($auth,"SELECT * FROM `newuserdata` WHERE email='$email' AND password ='$pass'");
        if($find->num_rows>0){
            $thatrow=mysqli_fetch_array($find);
            if($thatrow['email']==$email){
                if($thatrow['password']==$pass){
                    session_start();
                    
                    $_SESSION['id']=$thatrow['id'];
                    // echo $_SESSION['id'];
                    
                    $_SESSION['email']=$email;
                    // echo $_SESSION['email'];
                    // echo $_SESSION['email'];
                    $_SESSION['name']=mysqli_fetch_array(mysqli_query($auth,"SELECT newuserdata.name from `newuserdata` where email='$email' and password='$pass'"))['name'];
                    // echo $_SESSION['name'];
                    $_SESSION['profile']="<img src='images/".mysqli_fetch_array(mysqli_query($auth,"SELECT newuserdata.profile FROM `newuserdata` WHERE email='$email' AND password='$pass'"))['profile']."' style='height:100px;width:100px;border-radius:50%;'>";
                    // echo $_SESSION['profile'];
                    echo"<h3 style='text-align:center'>you are loged in successfully</h3>";
                    // sleep(2);
                    header("location:user.php");
                }
                
                
    
            }
           
            
        }
        else{
            echo"<h3 style='text-align:center'>Incorrect mail and password</h3>";
            
        }

    // }
    // else if($mailcheck->num_rows<0){
    //     echo "There is no account present in this mail id";


    // }

}
if(isset($_POST["signin"])){
    header("location:usersignin.php");
}

?>