<?php 
	$query_select = "SELECT * FROM app";
    $result_select = mysqli_query($con,$query_select)
    or die ('error'); 
    while($row = mysqli_fetch_array($result_select))
	{
    $app_id = $row['app_id'];
	$app_name = $row['app_name'];
    echo"
    <option value=''></option>
    <option value='$app_id'>{$app_name}</option>
    ";                                
     }
	 ?>