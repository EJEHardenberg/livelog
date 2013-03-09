<?php

function logThis($var, $doLine = true){
	$toLog = print_r($var, true);
	$bt = debug_backtrace();
  	$caller = array_shift($bt);
  	$file ="";
  	$line ="";
  	if($doLine){
  		$file = $caller['file'];
  		$line = $caller['line'];
  	}
	$toLog = $toLog."\n".$file.":".$line;
	$fHandle = fopen('log.txt', 'a+');
	fwrite($fHandle, date('Y/m/d-h:i:s').": ".$toLog."\n");
}

function urlLog($url){
  $toLog = $url;
  //$fHandle = fopen('Configuration/urlLog.txt', 'a+');
  //fwrite($fHandle, date('Y/m/d-h:i:s').": ".$toLog."\n");
}

logThis($_POST);
// logThis("hello");


?>
