<?php
	if(!isset($_SESSION)){session_start();}
	
	include 'connect_to_mysql.php';
	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
		$query_detail = "SELECT * FROM `user` u, `app` a WHERE u.app_id = a.app_id and u.user_id = '{$user_id}'";
		$result_detail = mysqli_query($con,$query_detail);
		$row_query = mysqli_fetch_array($result_detail);
		$logo = $row_query['logo'];
		$cover = $row_query['cover'];
		$image = $row_query['image'];
		$appID = $row_query['app_id'];
		$username = $row_query['user_name'];
		$about_us = $row_query['about_us'];
		$password = $row_query['password'];
		$image = $row_query['image'];        
		$appName = $row_query['app_name'];
		$username_allcaps = strtoupper($username);
		$_restKey = $row_query['restKey'];
		$_applicationID = $row_query['applicationID'];
		$_masterKey = $row_query['masterKey'];
		$_app_publish_date = $row_query['publish_date'];
        
        //changing date format start here
        
        $time_cone = strtotime($row_query['time_cone']);
        $month = date('F', $time_stamp);
		$day = date('d',$time_cone);
		$year = date('Y',$time_cone);
        $time_cone = "{$month} {$day}, {$year}";
	}

?>	
	