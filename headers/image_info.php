<?php
	$ifExists = false; 
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["image"]["name"]);
	$extension = end($temp);
	$rand  = (rand(10,100));
	$md5Number = md5($rand) . '.png';
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"image/" . $md5Number);
    $image  = $md5Number ;