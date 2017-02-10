<?php
	
	$installationData = file_get_contents('http://fajjemobile.info/ufcw5/mobile_app/headers/curl_parse_channels.php');
	$returnArray = array();
	
	//echo $installationData;

	$installationData = json_decode($installationData,true);
	
	//$allChannels = array();
	//$allEmployers = array();
	$allCorrectStoreNames = array();
	
	
	$results = $installationData['results'];
	//print_r($results);
	
	
	foreach($results as $key=>$value)
	{
     
	 $storenamesArray = $value['store_name_correct'];

	 foreach($storenamesArray as $key=>$individualStoreName)
	 {
		$allCorrectStoreNames[] = $individualStoreName;
	 }
	 
	}
	
	//$allChannels = array_unique($allChannels);
	//$allEmployers = array_unique($allEmployers);
	$allCorrectStoreNames = array_unique($allCorrectStoreNames);
	
	//$returnArray['unique_channels'] = $allChannels;
	//$returnArray['employers'] = $allEmployers;
	//$returnArray['stores'] = $allCorrectStoreNames;
	
	
	//echo json_encode($returnArray);
	
	//echo json_encode($allChannels);
	//echo json_encode($allEmployers);
	//echo json_encode($allCorrectStoreNames);
	
	
	foreach($allCorrectStoreNames as $key=>$value){
		echo"<option value='$value'>$value</option>";
	}
	//echo json_encode($allChannels);
	
?>