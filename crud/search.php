<?php
    include('credauth.php');
    $r= $_POST['name'];

    $q="SELECT * FROM `data`
    WHERE name LIKE '$r%';";

    $ar=mysqli_query($auth,$q);

    echo "<table class='table'>
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
    <tbody>";
while($one=mysqli_fetch_array($ar)){
//    echo '$one['id']'


    echo "
     
    <tr>
    <td>$one[id]</td>
    <td>$one[name]</td>
    <td>$one[age]</td>
    <td>$one[email]</td>
    <td><a href='update.php?id=$one[id]&name=$one[name]&age=$one[age]&email=$one[email]' class='btn btn-primary'>update</a></td>
    <td><a href='delete.php?id=$one[id]' class='btn btn-danger'>Delete</a></td>

</tr>
";
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
    