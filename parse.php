<?php
	include 'parse-php-sdk/autoload.php';
	
	
	use Parse\ParseClient;
	use Parse\ParseInstallation;
	use Parse\ParseException;
	use Parse\ParsePush;
	use Parse\ParseQuery;
	

	ParseClient::initialize( $app_id_parse, $rest_key, $master_key );
	
	if(count($storesArray) > 0)
	{
		pushNotification($notificationMsg,$storesArray,'store_name');
	}
	
	if(count($employersArray) > 0)
	{
		pushNotification($notificationMsg,$employersArray,'employer_name');
	}
	
	if(count($allUsersArray) > 0)
	{
		pushToChannels($notificationMsg,$allUsersArray);
	}
	
	
	
	// Notification targeted via channel to all registered users or unregistered users
	
	function pushToChannels($notificationMessage,$users_array)
	{
		$queryIOS = ParseInstallation::query();
		
		ParsePush::send(array(
		  "channels" => $users_array,
		  "data" => array(
			"alert" => $notificationMessage,
			"sound" => "cheering.caf"
		  )
		));
	}
	
	
	// Notification for users targetted by employers_name / stores_name
	
	
	function pushNotification($notificationMessage,$users_array,$type)
	{
			for($i=0; $i<count($users_array); $i++)
			{
				$queryIOS = ParseInstallation::query();
				$queryIOS->equalTo($type, $users_array[$i]);
				
				ParsePush::send(array(
				  "where" => $queryIOS,
				  "data" => array(
					"alert" => $notificationMessage,
					"sound" => "cheering.caf"
				  )
				));
			}
	}
?>