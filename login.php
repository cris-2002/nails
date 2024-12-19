<?php
	session_start();

	define('HOST','localhost');
	define('USERNAME', 'root');
	define('PASSWORD','');
	define('DB','nails');

	$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

	if (isset($_POST['action_name']) && ($_POST['action_name'] == 'login')) {

	    if (empty($_POST['user_name']) || empty($_POST['user_password'])) {

	        if (empty($_POST['user_name']) && empty($_POST['user_password'])) {
	            echo 'Username and Password Empty!';
	        } elseif(empty($_POST['user_name'])) {
	            echo 'Username Empty!';
	        } elseif (empty($_POST['user_password'])) {
	            echo 'Password Empty!';
	        }

	    } else {

	        $user_name = ($_POST['user_name']);
	        $user_password = ($_POST['user_password']);

	        $query = "SELECT * FROM user WHERE user_name='$user_name' AND user_password='$user_password'";
	        $exec= mysqli_query($con,$query);

	        if($exec && mysqli_num_rows($exec) == 1) {

		        $user = mysqli_fetch_assoc($exec);

	            $_SESSION['user_id']		= $user['user_id'];
	            $_SESSION['user_name'] 		= $user['user_name'];
	            $_SESSION['user_fname'] 	= $user['user_fname'];
	            $_SESSION['user_lname'] 	= $user['user_lname'];
	            $_SESSION['user_number'] 	= $user['user_number'];
	            $_SESSION['user_type'] 		= $user['user_type'];

	            echo $user['user_type'];

	        }else{
	            echo 'Incorrect Username or Password!';
	        }

	    }
	}


	if (isset($_POST['action_name']) && ($_POST['action_name'] == 'add')) {

		$user_name 				= $_POST['user_name'];
		$user_password 			= $_POST['user_password'];
		$user_fname 			= $_POST['user_fname'];
		$user_lname 			= $_POST['user_lname'];
		$user_number 			= $_POST['user_number'];

		$query = "SELECT * FROM user WHERE user_name = '$user_name'";
	    $exec = mysqli_query($con,$query); 		

	    if (mysqli_num_rows($exec) > 0) {
			echo 'Username exist';
	    } else {

			$sql = "insert into user (`user_id`, `user_type`, `user_name`, `user_password`, `user_fname`, `user_lname`, `user_number`) values (null, 'user', '$user_name', '$user_password', '$user_fname', '$user_lname', '$user_number')";

			if(mysqli_query($con, $sql)) {
				echo 'success';
			}
	    }
		
	} 


	if (isset($_POST['action_name']) && ($_POST['action_name'] == 'logout')) {

	    session_destroy();
	    echo true;
	}



?>