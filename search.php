
	<?php
	include 'headers/connect_to_mysql.php';

	$user_search = "SELECT * from news limit 50";  
    
    $search_query = "SELECT news_id, title, description FROM news WHERE title = '$user_search;'";
    $result = mysqli_query($dbc, $search_query);
    ?>