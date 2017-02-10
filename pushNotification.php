<?php
	
	include 'headers/connect_to_mysql.php';
	$query = "SELECT pn.* from `pushNotifications` pn WHERE pn.appID = {$appID}";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$pushMessage = $row['pushMessage'];
		$timeStamp = $row['timeStamp'];
	}
	

?>