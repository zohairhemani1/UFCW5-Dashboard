<?php 
	
	$parseArray = array();
	
	$query_select = "select app.app_name, app.restKey,app.masterKey,app.applicationID,app.app_id from app where app.app_id in (SELECT c.app_id as childAppID from `app_relation` ar, `categories` c WHERE ar.parentID = '{$appID}' AND ar.catID = c.id)";
    $result_select = mysqli_query($con,$query_select)
    or die ('error'); 
    while($row = mysqli_fetch_array($result_select))
	{
    $app_id = $row['app_id'];
	$app_name = $row['app_name'];
	
	$restKey = $row['restKey'];
	$masterKey = $row['masterKey'];
	$applicationID = $row['applicationID'];
	
	$tempArray = array();
	$tempArray['restKey'] = $restKey;
	$tempArray['applicationID'] = $applicationID;
	$tempArray['masterKey'] = $masterKey;
	
	$parseArray[] = $tempArray;
	
    echo"
		<option value='{$app_id}'>{$app_name}</option>
		";                                
     }
	 
	 $data=serialize($parseArray); 
	 $encoded=htmlentities($data);
	 
	echo "<input type='text' value='$encoded' name = 'parseArray' />";
	 
	 //print_r($parseArray);
?>