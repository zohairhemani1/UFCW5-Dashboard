<?php

$url = 'https://api.parse.com/1/installations?limit=1000';

$appId = 'Y72zyeiu02Lys7tDVKe2FGJtmvcpsErVXqb4tdlY';
$masterKey = 'cylrJ834pUOAn5qd7WcuX6G8bIwf9Pq60eIUGHES';

//open connection
$rest = curl_init();
curl_setopt($rest,CURLOPT_URL,$url);
curl_setopt($rest,CURLOPT_PORT,443);
curl_setopt($rest,CURLOPT_HTTPGET,1);
curl_setopt($rest,CURLOPT_HTTPHEADER,
        array("X-Parse-Application-Id: " . $appId,
                "X-Parse-MASTER-Key: " . $masterKey,
                "Content-Type: application/json"));

$response = curl_exec($rest);


?>