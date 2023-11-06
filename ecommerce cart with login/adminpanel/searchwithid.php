<?php
// header('content-Type:application/json');
// header('Access-control-Allow-Origin: *');



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With');

// $data=json_decode(file_get_contents("php://input"),true);
$id=$_POST['id'];

if(!($id==null)){


include('credauth.php');

$query=mysqli_query($auth,"SELECT * FROM `newuserdata` WHERE id=$id");



if($query->num_rows>0){
    $array=mysqli_fetch_array($query);
    // $arr=json_encode($array);
    echo $array['name'];
    // echo $arr;

}
else{
    echo "No match found";
}
}
else{
    echo "Enter id to search";
}


?>