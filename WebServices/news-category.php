<?php
	
	include 'headers/connect_to_mysql.php';
	
	$category = $_POST['parameterOne'];

	$returnArray = array();
	$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
	$query = "SELECT * from news WHERE category like '$category'";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$newArray = array();
		$description = clean($row['description']);
		$title = $row['title'];
		$fileImage = $row['file'];
		$news_id = $row['news_id'];
		$newArray['description'] = $description;
		$newArray['title'] = $title;
		$newArray['file'] = $fileImage;
		$newArray['news_id'] = $news_id;

		$returnArray[] = $newArray;

	}
	
	echo json_encode($returnArray);
	
function clean($string) {
   $string = str_replace(array("<p>","</p>","<b>","</b>","<b>","</b>","<em>","</em>","<i>","</i>","<u>","</u>","<h1>","</h1>","<h2>","</h2>","<h3>","</h3>","<li>","</li>","<ul>","</ul>","<a>","</a>"), "", $string);	
   $string = preg_replace('/[^A-Za-z0-9\-:]/', ' ', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
	
?>