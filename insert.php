

<?php
	include 'headers/connect_to_mysql.php';	
	include 'headers/image_upload.php';
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	echo "Filename: -->" . $file;
	$query = "INSERT INTO news(title,description,file,time_cone)
	VALUES ('$title','$description','$file',now())";
	mysqli_query($con,$query)
	or die('error');
	
	header ("location: news.php");
	
?>
