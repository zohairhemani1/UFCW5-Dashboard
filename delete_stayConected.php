<?php 
	include 'headers/connect_to_mysql.php';
	$id = $_GET['id'];
	$query_delete = "DELETE FROM stayconected WHERE id = $id"
	or die('error while deleting stayconected');
	$result = mysqli_query($con,$query_delete);
	header ('Location: stay_conected.php?insert=true');		

?>