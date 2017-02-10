<?php 
	include 'headers/connect_to_mysql.php';
	$office_id = $_GET['office_id'];
	$query_delete = "DELETE FROM location WHERE office_id = $office_id"
	or die('error while deleting office location');
	$result = mysqli_query($con,$query_delete);
	header ('Location: office_location.php?insert=true');		

?>