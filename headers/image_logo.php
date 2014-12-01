<?php
$ifExist = false;
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["logo"]["name"]);
$extension = end($temp);

	$rand  = (rand(10,100));
	$md5Number = md5($rand) . '.png';
	move_uploaded_file($_FILES["logo"]["tmp_name"],
	"logo/" . $md5Number);
    $logo  = $md5Number ;
 


?>
