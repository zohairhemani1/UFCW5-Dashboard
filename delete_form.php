<?php 
	include 'headers/connect_to_mysql.php';
	$news_id = $_GET['news_id'];
	$categoryID = $_GET['categoryID'];
	$query_delete = "DELETE FROM news WHERE news_id = $news_id"
	or die('error while deleting news');
	$result = mysqli_query($con,$query_delete);
	header ("Location:news.php?categoryID=$categoryID&delete=true");		

?>