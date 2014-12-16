<?php
	$app_id = $_SESSION['app_id'];
	$query_index = "SELECT * FROM app_name where app_id='$app_id' ";
	$result_index = mysqli_query($con,$query_index);
	$row = mysqli_fetch_array($result_index);
	$logo = $row['logo'];
	$cover = $row['cover']; 
	$about_us = $row['about_us'];
	$color = $row['color'];