<?php
	
	include '../headers/connect_to_mysql.php';
	include '../headers/_user-details.php';
	
	$query = "SELECT p.* FROM `apps_plan` ap, `plans` p WHERE ap.plan_id = p.plan_id AND ap.app_id = 7";
	$result = mysqli_query($con,$query);
	
	while($row=mysqli_fetch_assoc($result))
	{
		
		$plan_id = $row['plan_id'];
		$amount = $row['amount'];
		$months = $row['months'];
		
		$data=serialize($row); 
	 	$encoded=htmlentities($data);
		
		echo "<option value='{$encoded}'> {$amount}$ / {$months} Month </option>";
	}
	
?>