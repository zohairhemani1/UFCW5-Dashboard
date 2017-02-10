<?php
	
	include 'headers/connect_to_mysql.php';
	
	$category = $_POST['parameterOne'];
	$returnArray = array();
	
	$query = "SELECT sc.* FROM `categories` c , `subcategories` sc WHERE c.id = sc.menu_id AND c.id = {$category}";
	$result = mysqli_query($con,$query);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$returnArray[] = $row;
	}
	
	echo json_encode($returnArray);
	
?>