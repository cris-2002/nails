<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','nails');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

$user_id = $_POST['user_id'];
$client_date = $_POST['client_date'];
$client_time = $_POST['client_time'];
$client_note = $_POST['client_note'];
$serviceString = "";
$additionalString = "";


if (isset($_POST['client_service']) && !empty($_POST['client_service'])) {
    $client_service = $_POST['client_service'];
    $serviceString = implode(',', $client_service);
}

if (isset($_POST['client_additional']) && !empty($_POST['client_additional'])) {
    $client_additional = $_POST['client_additional'];
    $additionalString = implode(',', $client_additional);
}
    
    $sql = "insert into client values (
             null, 
            '$user_id', 
            '$client_date', 
            '$client_time', 
            '$client_note', 
            '$serviceString', 
            '$additionalString',
            1)";

        // var_dump(mysqli_query($con, $sql));

    if(mysqli_query($con, $sql)) {
        echo 'success';
    } else {
        echo 'error';
    }
?>
