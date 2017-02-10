<?php
	include 'headers/connect_to_mysql.php';	
	$app_id = $_GET['app_id'];
	$query = "DELETE  from app_name where app_id = '$app_id'";
	mysqli_query($con,$query);
	header ("Location: app.php?delete=true");
?>