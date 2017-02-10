<?php 
	include 'headers/connect_to_mysql.php';
	$contact_id = $_GET['contact_id'];
	$query_delete = "DELETE FROM contact WHERE contact_id = $contact_id"
	or die('error while deleting contact');
	$result = mysqli_query($con,$query_delete);
	header ('Location: union_representatives.php?insert=true');		

?>