<?php
	include 'headers/connect_to_mysql.php';
	$update_id = $_GET['update_id'];
	$query = "DELETE FROM Negotiation_Updates where update_id = '$update_id'";
	 mysqli_query($con,$query);
	 header('Location: NegotiationUpdates_news.php?message=true');
?>