<?php
	include 'headers/connect_to_mysql.php';	
	$office_id = $_GET['office_id'];
	$category = $_GET['category'];
	$query = "DELETE from location where office_id = '$office_id'";
	mysqli_query($con,$query);
	header ('Location: location.php?delete=true');
?>