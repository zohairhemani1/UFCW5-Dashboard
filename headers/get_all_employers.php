<?php
	
	$installationData = file_get_contents('http://fajjemobile.info/ufcw5/mobile_app/headers/curl_parse_channels.php');
	$returnArray = array();
	
	//echo $installationData;

	$installationData = json_decode($installationData,true);
	
	$allChannels = array();
	//$allEmployers = array();
	//$allStoresNames = array();
	
	
	$results = $installationData['results'];
	//print_r($results);
	
	
	foreach($results as $key=>$value)
	{
     //$channelsArray = $value['channels'];
	 $employersArray = $value['employer_name'];
	 //$storenamesArray = $value['store_name'];
		 // saving all channels for individual row in allchannells array.
		/* foreach($channelsArray as $key=>$individualChannel)
		 {
			$allChannels[] = $individualChannel;
		 }*/
		 
		 // saving all employers for individual row in allchannells array.
		 foreach($employersArray as $key=>$individualEmployer)
		 {
			$allEmployers[] = $individualEmployer;
		 }
		 /*
		 // saving all storenames for individual row in allchannells array.
		 foreach($storenamesArray as $key=>$individualStoreName)
		 {
			$allStoresNames[] = $individualStoreName;
		 } */
	}
	
	//$allChannels = array_unique($allChannels);
	$allEmployers = array_unique($allEmployers);
	//$allStoresNames = array_unique($allStoresNames);
	
	//$returnArray['unique_channels'] = $allChannels;
	//$returnArray['employers'] = $allEmployers;
	//$returnArray['stores'] = $allStoresNames;
	
	
	//echo json_encode($returnArray);
	
	//echo json_encode($allChannels);
	//echo json_encode($allEmployers);
	//echo json_encode($allStoresNames);
	
	
	foreach($allEmployers as $key=>$value){
		echo"<option value='$value'>$value</option>";
	}
	//echo json_encode($allChannels);
	
?>