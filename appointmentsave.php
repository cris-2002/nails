<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','nails');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if (isset($_POST['action_name']) && ($_POST['action_name'] == 'client_status')) {

    $id         = $_POST['id'];
    $client_id  = $_POST['client_id'];


    $sql = "UPDATE client SET 
        `client_status`    = '$id'
        WHERE client_id   = '$client_id'"; 

    if(mysqli_query($con, $sql)) {
        echo 'success';
    } else {
        echo 'error';
    }           
}


if (isset($_POST['action_name']) && ($_POST['action_name'] == 'delete')) {

    $client_id  = $_POST['client_id'];

    $query="DELETE from client WHERE client_id = '$client_id'";

    $exec= mysqli_query($con,$query);
    if($exec){
      echo 1;
    } else {
      echo 0;
    }       
}
?>
