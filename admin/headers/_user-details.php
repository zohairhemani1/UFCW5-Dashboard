<?php

	include 'session.php';
	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM `user` u, `app` a WHERE u.app_id = a.app_id and u.user_id = 1";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$logo = $row['logo'];
	$cover = $row['cover'];
	$image = $row['image'];
	$appID = $row['app_id'];
	$username = $row['user_name'];
	$about_us = $row['about_us'];
	$password = $row['password'];
	$email = $row['email'];
	$time_cone = $row['time_cone'];
	$username_allcaps = strtoupper($username);
?>
	

	
	
	