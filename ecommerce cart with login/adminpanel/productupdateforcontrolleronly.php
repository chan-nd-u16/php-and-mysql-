<?php
session_start();
// $user_name=$_SESSION['name'];
// 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
   .formcontainer .inner input{
        /* margin-top: 3%; */
        width: 70%;
    }


    
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
  margin-top: 5%;

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
</style>
<body>


<div class="main">


  <div class="formcontainer">
    
    <div class="inner">

    

        <form  method="post" enctype="multipart/form-data">
            <!-- <h5>ID</h5> -->
            <input type="text" name="id" id="" value="<?php print ($_GET['id']);?>" class="form-control" style="display:none">
<h5>PRODUCT NAME</h5>
            <input type="text" name="productname" id="" placeholder="product name" value="<?php print ($_GET['pname']);?>" class="form-control">
<h5>PRODUCT DESCRIPTION</h5>
            <textarea type="text" name="productdesc" id="" placeholder="product description" value="<?php print ($_GET['pdesc']);?>" class="form-control"><?php print ($_GET['pdesc']);?></textarea>
<h5>PRODUCT IMAGE</h5>
            <input type="file" name="productimg" id=""  class="form-control">
<h5>PRICE</h5>
            <input type="text" name="productprice" id="" placeholder="product price"value="<?php print ($_GET['pprice']);?>" class="form-control">
<h5>STOCK STATUS</h5>
            <label class="switch">
                <input type="checkbox" name="checkbox" value="TRUE">
                <span class="slider round"></span>
            </label>
<h5>Quantity</h5>
            <input type="text" name="quantity" id="" placeholder="Quantity" value="<?php print ($_GET['quantity']);?>" class="form-control">
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
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

if(isset($_POST['submit'])){

    
    $pname=$_POST['productname'];
    $pdesc=$_POST['productdesc'];
    $price=$_POST['productprice'];
    $quan=$_POST['quantity'];
    $Id=$_POST['id'];
    if(isset($_POST['checkbox'])){
        $check="INSTOCK";


      }
      else{
        $check="OUT OF STOCK";
      }

 
//  $q="UPDATE `products` SET `productname` = '$pname', `productprice` = $price, `quantity` = '$quan' WHERE `id` = $Id";
//  if(mysqli_query($auth,$q)){

//     header("location: products.php");

//  }
if(!empty($_FILES["productimg"]["name"])){

          
    $fileName = rand(1000,10000)."-".$_FILES["productimg"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    echo $fileType;
    if(in_array($fileType, array('jpg','png','jpeg','gif'))){

    if(move_uploaded_file($_FILES["productimg"]["tmp_name"], $targetFilePath)){
      $insert = mysqli_query($auth,"UPDATE `products` SET `productname` = '$pname',`productdesc`='$pdesc',`productimage`='$fileName',`productprice` = '$price',`stockstatus`='$check',`quantity` = '$quan',`last_modified`='$user_name' WHERE `id` = $Id");

    // $insert = mysqli_query($auth,"INSERT INTO products(productname,productdesc,productimage,productprice,stockstatus,quantity) VALUES ('".$name."','".$desc."', '".$fileName."','".$price."','".$check."','".$quan."')");
    if($insert){
       $outMessageorError = "The file ".$fileName. " has been uploaded successfully.";
    sleep(2);
    header("location:products.php");
    }else{
       $outMessageorError = "Imaghe cant be uplaoded";
    }
    }
    // else if(!(move_uploaded_file($_FILES["productimg"]["tmp_name"], $targetFilePath))){
    //   $insert = mysqli_query($auth,"UPDATE `products` SET `productname` = '$pname',`productdesc`='$pdesc',`productprice` = '$price',`stockstatus`='$check',`quantity` = '$quan',`last_modified`='$user_name' WHERE `id` = $Id");
    //   if($insert){
    //     // $outMessageorError = "The file ".$fileName. " has been uploaded successfully.";
    //  sleep(2);
    //  header("location:products.php");
    //  }

    // }
    else{
       $outMessageorError = "Some error";
    }
    }else{
       $outMessageorError = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
  }
  else if(empty($_FILES["productimg"]["name"])){
    $insert = mysqli_query($auth,"UPDATE `products` SET `productname` = '$pname',`productdesc`='$pdesc',`productprice` = '$price',`stockstatus`='$check',`quantity` = '$quan',`last_modified`='$user_name' WHERE `id` = $Id");
      if($insert){
        // $outMessageorError = "The file ".$fileName. " has been uploaded successfully.";
     sleep(2);
     header("location:http://chandru.magento.com/display/productcrud/withoutpagefactory");
     }

  }
  else{

    $outMessageorError = 'Please select a file to upload.';
  }
    echo$outMessageorError;


}
?>