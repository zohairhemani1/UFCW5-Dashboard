<?php
	include 'headers/connect_to_mysql.php';	

	$news_id = $_GET['news_id'];
	$category = $_GET['category'];
	$query = "DELETE from news where news_id = '$news_id' && category = '$category'";
	mysqli_query($con,$query);
	header("Location: news.php?category={$category}&&delete=true");	
?>