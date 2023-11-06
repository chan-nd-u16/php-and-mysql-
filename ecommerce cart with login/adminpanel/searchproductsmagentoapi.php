<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    $host='localhost';
    $username='root';
    $password='root';
    $database='ecommerse';
    $auth=mysqli_connect($host,$username,$password,$database);
    $r= $_POST['name'];
    if(!($r==null)){
      
    

    $q="SELECT * FROM `products`
    WHERE productname LIKE '$r%';";

    $ar=mysqli_query($auth,$q);

    echo "<table class='table table-striped'>
    <thead>
     <tr>
          <th>id</th>
         <th>Product Name</th>
         <th>Product Image</th>
         <th>Product Description</th>
         
         <th>Product Price</th>
         <th>Stock Status</th>
         <th>quantity</th>
         <th>Update</th>
         <th>Delete</th>
                  

     </tr>
    </thead>
    <tbody>";
while($one=mysqli_fetch_array($ar)){
//    echo '$one['id']'
if($one==null){
  echo 'no match';
}else{



    echo "
     
    <tr>
    <td class='align-middle'>$one[id]</td>
    <td class='align-middle'>$one[productname]</td>
    <td><img src='http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/images/$one[productimage]' style='height:100px;width: 100px;'></td>

    <td class='align-middle'>$one[productdesc]</td>
    <td class='align-middle'>$one[productprice]</td>
    <td class='align-middle'>$one[stockstatus]</td>
    <td class='align-middle'>$one[quantity]</td>
    <td class='align-middle'><a href='productupdate.php?id= $one[id]&pname=$one[productname]&pdesc=$one[productdesc]&pprice=$one[productprice]&quantity=$one[quantity]' class='btn btn-primary'>update</a></td>
    <td class='align-middle'><a href='productdelete.php?id=$one[id]' class='btn btn-danger'>Delete</a></td>

    

</tr>
";
}
}
 
}

    
echo"</tbody>
</table>"
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

    <!-- <h1>Hello, world!</h1> -->
    