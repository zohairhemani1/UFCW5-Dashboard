<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["cover"]["name"]);
$extension = end($temp);

	$rand  = (rand(10,100));
	$md5Number = md5($rand) . '.png';
	move_uploaded_file($_FILES["cover"]["tmp_name"],
	"cover/" . $md5Number);
    $cover  = $md5Number ;
 


?>

