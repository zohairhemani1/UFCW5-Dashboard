<?php
	include 'headers/connect_to_mysql.php';	
	$stayConected_id = $_GET['stayConected_id'];
	$category = $_GET['category'];
	$query = "DELETE from stayConected  where stayConected_id = '$stayConected_id'";
	mysqli_query($con,$query);
	header ("Location: stayConected.php?delete=true");
?>