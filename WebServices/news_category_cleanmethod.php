<?php
	
	include 'headers/connect_to_mysql.php';
	
	$category = $categoryID;

	$returnArray = array();
	$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
	$query = "SELECT * from news WHERE category like '$category' and app_id = '$appID' order by `time_cone` desc";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$newArray = array();
		//$description = clean($row['description']);
		$description = $row['description'];
		
		if(strlen($description) > 200)
			$description_toclean = clean(substr($description,0,200));
		else
			$description_toclean = clean($description);
		
		
		
		
		$title = $row['title'];
		$fileImage = $row['file'];
		$news_id = $row['news_id'];
		$newArray['description'] = $description_toclean;
		$newArray['title'] = $title;
		$newArray['file'] = $fileImage;
		$newArray['news_id'] = $news_id;
		
		$returnArray[] = $newArray;

	}
	
	echo json_encode($returnArray);
	
function clean($string) {
   $string = str_replace(array("<p>","</p>","<b>","</b>","<b>","</b>","<em>","</em>","<i>","</i>","<u>","</u>","<h1>","</h1>","<h2>","</h2>","<h3>","</h3>","<li>","</li>","<ul>","</ul>","<a>","</a>","<strong>","</strong>","<h4>","</h4>","<style>","</style>","<ol>","</ol>","<ul>","</ul>"), "", $string);	
   $string = preg_replace('/[^A-Za-z0-9\-:],.; /', ' ', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
	
?>