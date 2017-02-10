<?php
	
	include 'headers/connect_to_mysql.php';
	
	$categoryID = $_GET['category'];
	$appID = $_GET['app_id'];
	
	$query = "SELECT w.name FROM `webservice_category` wc, `webservices` w WHERE wc.`category` like '{$categoryID}' AND wc.webservice = w.id";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$fileName = $row['name'];
	
	if(!isset($fileName))
	{
		$fileName = "view.php";
	}
	
	switch ($fileName)
	{
		case $fileName:
			include $fileName;
			break;
	}
	

?>