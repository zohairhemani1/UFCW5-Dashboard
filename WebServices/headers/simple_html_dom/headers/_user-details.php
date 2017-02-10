<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	include 'session.php';

	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM `user` u, `app` a WHERE u.app_id = a.app_id and u.user_id = '{$user_id}'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$logo = $row['logo'];
	$cover = $row['cover'];
	$image = $row['image'];
	$appID = $row['app_id'];
	$username = $row['user_name'];
	$about_us = $row['about_us'];
	$username_allcaps = strtoupper($username);
?>
	

	
	
	