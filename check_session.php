<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $arrayName = array('message' => 0);
} else {
    $arrayName = array('message' => 1, 
        'user_id' => $_SESSION['user_id'],
        'user_fname' => $_SESSION['user_fname'],
        'user_lname' => $_SESSION['user_lname'],
        'user_number' => $_SESSION['user_number'],
        'user_type' => $_SESSION['user_type']
    );
}

header("Content-Type: application/json");
echo json_encode($arrayName);

?>