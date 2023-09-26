<?php
    $host='localhost';
    $username='root';
    $password='root';
    $database='ecommerse';
    $auth=mysqli_connect($host,$username,$password,$database);
    $r= $_POST['name'];
    if(!($r==null)){
      
    

    $q="SELECT * FROM `newuserdata`
    WHERE name LIKE '$r%';";

    $ar=mysqli_query($auth,$q);

    echo "<table class='table'>
    <thead>
     <tr>
          <th>id</th>
         <th>Name</th>
         <th>Username</th>
         <th>profile</th>
         <th>Phone</th>
         <th>Email</th>
         <th>Password</th>            

     </tr>
    </thead>
    <tbody>";
while($one=mysqli_fetch_array($ar)){
//    echo '$one['id']'


    echo "
     
    <tr>
    <td class='align-middle'>$one[id]</td>
    <td class='align-middle'>$one[name]</td>
    <td class='align-middle'>$one[username]</td>
    <td><img src='images/$one[profile]' style='height:150px;width: 150px;'></td>
    <td class='align-middle'>$one[phone]</td>
    <td class='align-middle'>$one[email]</td>
    <td class='align-middle'>$one[password]</td>
   

</tr>
";
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
    