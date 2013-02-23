<?php


function superLog($var){
	//where are we posting to?
	$url = 'http://localhost/LiveLog/LiveLogCatch.php';

	$data = "data=".$var; 
	


	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($data));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);
}

// superLog(time());
superLog("Hello Julie");



?>