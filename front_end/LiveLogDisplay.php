<?php
// responds to ajax query for log data. parses the file into json

// echo "working";
if($_POST && $_POST['getCurrentLog'] && $_POST['sessionID']){
	// if our file doesnt exist, create it
	if(!file_exists("logfiles/".$_POST['sessionID'].".txt")){
		echo "no data";
	}else{
		// get the contents of our log file
		$logString = file_get_contents("logfiles/".$_POST['sessionID'].".txt");
		// header("Content-Type: application/json");
		echo $logString;
	}
}

?>
