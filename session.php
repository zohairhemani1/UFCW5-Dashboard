<?php
		include 'headers/connect_to_mysql.php';	

	session_start();
	
	if(isset($_COOKIE['username']))
	{
		
		$cookie = $_COOKIE['username'];
			
		$query = "select * from user where cookie like '$cookie'";
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);

		$row = mysqli_fetch_assoc($result);
		$username = $row['user_name'];
		$_COOKIE['app_id'] = $row['app_id'];
		$app_id = $_SESSION['app_id'];
	}
	

	
	else if(isset($_SESSION['user_name']))
	{
		$username = $_SESSION['user_name'];
		$app_id = $_SESSION['app_id'];

	}
else{
	header('Location: login.php');	
}
