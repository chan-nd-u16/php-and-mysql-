<?php
   $host='localhost';
   $username='root';
   $password='root';
   $database='ecommerse';
   $auth=mysqli_connect($host,$username,$password,$database);
   session_start();
  if(!isset($_SESSION['name'])){
    header("location:adminlogin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<H3 style="text-align: center;">USER DETAILS</H3>

    <form id="myform">
        <!-- <h3 style="margin-left: 25%;">SEARCH</h3> -->
        <input type="text" name="search" id="string" placeholder="search" class="form-control" style="width:50%;margin:auto;">
        <!-- <input type="submit" value="search" class="btn btn-primary"> -->

    </form>
    <div id="cat"></div>
    
    <table class="table table-striped" >
       <thead>
        <tr>
             <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Profile</th>
            <th>Phone</th>
            <th>Email</th>
            <th>password</th>
                     

        </tr>
       </thead>
       <tbody>
          <?php
            $query="SELECT * FROM  `newuserdata`";
            $sel=mysqli_query($auth,$query);
            
            
                for($i=0;$i<$sel->num_rows;$i++){
                    $one=mysqli_fetch_array($sel);
        ?>
                <tr>
                    <td class="align-middle"><?php echo $one['id'];?></td>
                    <td class="align-middle"><?php echo $one['name'];?></td>
                    <td class="align-middle"><?php echo $one['username'];?></td>
                    <td class="align-middle"><img src="images/<?php echo $one['profile'];?>" alt="" style="height: 100px;width: 100px;"></td>
                    <td class="align-middle"><?php echo $one['phone'];?></td>
                    <td class="align-middle"><?php echo $one['email'];?></td>
                    <td class="align-middle"><?php echo $one['password'];?></td>
                    
                    

                </tr>

                


        <?php
            }

          
          ?>  


         
       </tbody>
    </table>
    <!-- <a href="create.php" class="btn btn-primary">Add New</a> -->
</body>
</html>
<script>
    $('#myform').keyup(function(e){
        e.preventDefault()
        $.ajax({
            url:'search.php',
            type:'POST',
            data:{name:$('#string').val()},
            success:function(response){
                $('#cat').html(response)
            }
            


        })


    })
   
</script>