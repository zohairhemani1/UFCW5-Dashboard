<?php
	include '../headers/connect_to_mysql.php';
	
	if(isset($_GET['app_id']))
	{
	$app_id = $_GET['app_id'];
	$query_delete = "DELETE FROM app WHERE app_id = $app_id"
	or die('error while deleting app');
	$result = mysqli_query($con,$query_delete);
	header ('Location: app.php?delete=true');		
	}
	
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query_delete = "DELETE from webservices where id = '$id'"
	or die ('error while Webservices Id');
	$result = mysqli_query($con,$query_delete);
	header ("Location: webservices.php?delete=true");
	}
	if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	$query_delete = "DELETE from user where user_id = '$user_id'"
	or die ('error while User');
	$result = mysqli_query($con,$query_delete);
	header ("Location: user.php?delete=true");
	}
	if(isset($_GET['uniqueID'])){
	$uniqueID = $_GET['uniqueID'];
	$query_delete = "DELETE from app_relation where id = '$uniqueID'"
	or die ('error while dleteing parent');
	$result = mysqli_query($con,$query_delete);
	header ("Location: parent.php?delete=true");
		}

?>