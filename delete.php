<?php
	include 'headers/connect_to_mysql.php';	
	$news_id = $_GET['news_id'];
	$query = "DELETE FROM news where news_id = '$news_id'";
	mysqli_query($con,$query);
	header('Location: news.php');













?>