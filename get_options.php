<?php

if (isset($_POST['date'])) {


    define('HOST','localhost');
    define('USERNAME', 'root');
    define('PASSWORD','');
    define('DB','nails');

    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

    $date = $_POST['date'];

    $options = array(
        '1' => "8:00-9:30 AM",
        '2' => "10:00-11:30 AM",
        '3' => "1:00-2:30 PM",
        '4' => "3:00-4:30 PM" );

    $query="SELECT * from `client` WHERE `client_date` = '$date'";
    
    $exec= mysqli_query($con,$query);
    
    if($exec->num_rows > 0) {
        while($row = $exec->fetch_assoc()) {
            $reservation[] = $row['client_time'];
            unset($options[$row['client_time']]);
        }
        echo json_encode($options);
    } else {
        echo json_encode($options);
    }
     
}

?>
