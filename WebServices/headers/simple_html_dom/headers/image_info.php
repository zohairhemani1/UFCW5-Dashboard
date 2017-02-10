<?php
	$random_img = $_POST['random_img'];
	$query = "SELECT random_img FROM user where random_img = 'user.jpg'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	$random_img = $row['random_img'];

	$ifExists = false; 
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["image"]["name"]);
	$extension = end($temp);
	$rand  = (rand(10,100));
	$md5Number = md5($rand) . '.png';
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"images/image/" . $md5Number);
	if($_FILES["image"]["tmp_name"] == null){
	   $image = $random_img ;
	 }
	else{
	$image = $md5Number;
	}
	
?>