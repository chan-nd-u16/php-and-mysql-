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
<?php
$host='localhost';
$username='root';
$password='root';
$database='ecommerse';
$auth=mysqli_connect($host,$username,$password,$database);
    
$query="SELECT * FROM `products`";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <a href="http://localhost/myphpPograms/ecommerce%20task/ecommerce%20cart%20with%20login/adminpanel/adminpanel.php" class="btn btn-primary">Go to Adminpanel</a>
    <form id="myform" method="post">
        <input type="text" name="search" id="string" placeholder="search" class="form-control" style="width:50%;margin:auto;">
    </form>
    <div id="cat"></div>
<table class="table table-striped">
       <thead>
        <tr>
             <th>id</th>
            <th>Product Name</th>
            <th>Product Desc</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>stockstatus</th>
            <th>quantity</th>
            <th>Last Modified</th>
            <th>Update</th>
            <th>Delete</th>            

        </tr>
       </thead>
       <tbody>
          <?php
            session_start();
            if(!isset($_SESSION['name'])){
                header("location:adminlogin.php");
              }
            // if(isset($_SESSION['name'])){
            //     echo $_SESSION['name'];
            // }
            $sel=mysqli_query($auth,$query);
            
            
                for($i=0;$i<$sel->num_rows;$i++){
                    
                    $one=mysqli_fetch_array($sel);
        ?>
                <tr>
                    <td class="align-middle"><?php echo $one['id'];?></td>
                    <td class="align-middle"><?php echo $one['productname'];?></td>
                    <td class="align-middle"><?php echo $one['productdesc'];?></td>
                    <td class="align-middle"><img src="images/<?php echo $one['productimage'];?>" height="100px" width="100px"></td>
                    <td class="align-middle"><?php echo $one['productprice'];?></td>
                    <td class="align-middle"><?php echo $one['stockstatus'];?></td>
                    <td class="align-middle"><?php echo $one['quantity'];?></td>
                    <td class="align-middle"><?php echo $one['last_modified'];?></td>
                    
                    <td class="align-middle"><a href="productupdate.php?id=<?php print($one['id']);?>&pname=<?php print($one['productname']);?>&pdesc=<?php print($one['productdesc']);?>&pprice=<?php print($one['productprice']);?>&quantity=<?php print($one['quantity']);?>" class="btn btn-primary">update</a></td>
                    <td class="align-middle"><a href="productdelete.php?id=<?php print($one['id'])?>" class="btn btn-danger">Delete</a></td>

                </tr>

                


        <?php

            }
          
          ?>  

       </tbody>
    </table>
    <a href="insertproducts.php" class="btn btn-primary">ADD PRODUCTS</a>
</body>
</html>
<script>
$('#myform').keyup(function(e){
        e.preventDefault()
        $.ajax({
            url:'searchproducts.php',
            type:'POST',
            data:{name:$('#string').val()},
            success:function(response){
                $('#cat').html(response)
            }
        })


    })

</script>