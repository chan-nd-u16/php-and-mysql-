<?php
   include('credauth.php')
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

    <form id="myform">
        <input type="text" name="search" id="string" placeholder="search" class="form-control" style="width:60%;margin:auto;">
        <!-- <input type="submit" value="search" class="btn btn-primary"> -->

    </form>
    <div id="cat"></div>
    <table class="table">
       <thead>
        <tr>
             <th>id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>            

        </tr>
       </thead>
       <tbody>
          <?php
            $query="SELECT * FROM  `data`";
            $sel=mysqli_query($auth,$query);
            
            
                for($i=0;$i<$sel->num_rows;$i++){
                    $one=mysqli_fetch_array($sel);
        ?>
                <tr>
                    <td><?php echo $one['id'];?></td>
                    <td><?php echo $one['name'];?></td>
                    <td><?php echo $one['age'];?></td>
                    <td><?php echo $one['email'];?></td>
                    <td><a href="update.php?id=<?php print($one['id']);?>&name=<?php print($one['name']);?>&age=<?php print($one['age']);?>&email=<?php print($one['email']);?>" class="btn btn-primary">update</a></td>
                    <td><a href="delete.php?id=<?php print($one['id'])?>" class="btn btn-danger">Delete</a></td>

                </tr>

                


        <?php
            }

          
          ?>  


         
       </tbody>
    </table>
    <a href="create.php" class="btn btn-primary">Add New</a>
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