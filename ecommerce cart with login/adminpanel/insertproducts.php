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
      /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}



.main{
  display: flex;
  justify-content: center;
  
}
.main .formcontainer .inner{
  display: flex;
  justify-content: center;
  margin-left: 20%;
  margin-top: 3%;

}
.main .formcontainer{
      height: 90vh;
      width: 80vh;
      background-color: lightpink;
      border-radius: 35px;
      margin-top: 3%;
    }
    .formcontainer:hover{
      
     box-shadow: 7px 7px 7px 7px lightslategrey;
    }
.main .formcontainer .inner textarea{
        /* margin-top: 3%; */
        width: 70%;
        height: 20%;

    }
    .main .formcontainer .inner h5{
        font-size: 15px;

    }
    .formcontainer .inner input{
        /* margin-top: 3%; */
        width: 70%;
    }

    </style>
  </head>
<body>
  <div class="main">
    <div class="formcontainer">
      <div class="inner">
          <form  method="post" enctype="multipart/form-data">
<h5>PRODUCT NAME</h5>
        <input type="text" name="productname" id="" placeholder="productname"  class="form-control">
<h5>PRODUCT DESCRIPTION</h5>
        <textarea type="text" name="productdesc" id="" placeholder="productdesc"  class="form-control"></textarea>
<h5>PRODUCT IMAGE</h5>
        <input type="file" name="productimg" id="" placeholder="productimg"  class="form-control">
        <h5>PRICE</h5>
        <input type="text" name="productprice" placeholder="productprice"  class="form-control">
<h5>STOCKSTATUS</h5>
        <label class="switch">
      <input type="checkbox" name="checkbox" value="TRUE">
      <span class="slider round"></span>
    </label>
<h5>QUANTITY</h5>
        <input type="text" name="quantity" placeholder="quantity"  class="form-control">

        <input type="submit" value="submit" name="submit"  class="btn btn-primary">


        </form>

      </div>
    </div>
  </div>
    
</body>
</html>
<?php
// include("credauth.php");
$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);


$outMessageorError = '';

$targetDir = "images/";
  if (isset($_POST['submit'])){

        $name = $_POST['productname'];
        $price = $_POST['productprice'];
        $quan = $_POST['quantity'];
        $desc = $_POST['productdesc'];
        
        if(isset($_POST['checkbox'])){
          $check="INSTOCK";


        }
        else{
          $check="OUT OF STOCK";
        }
        
       
        
        if(!empty($_FILES["productimg"]["name"])){

         
          
          $fileName = rand(1000,10000)."-".$_FILES["productimg"]["name"];
          $targetFilePath = $targetDir . $fileName;
          $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
          echo $fileType;
          if(in_array($fileType, array('jpg','png','jpeg','gif'))){

          if(move_uploaded_file($_FILES["productimg"]["tmp_name"], $targetFilePath)){
          $insert = mysqli_query($auth,"INSERT INTO products(productname,productdesc,productimage,productprice,stockstatus,quantity) VALUES ('".$name."','".$desc."', '".$fileName."','".$price."','".$check."','".$quan."')");
          if($insert){
          $outMessageorError = "The file ".$fileName. " has been uploaded successfully.";
          sleep(2);
          header("location:products.php");
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

          $outMessageorError = 'Please select a file to upload.';
        }
          echo$outMessageorError;
  }
  ?>