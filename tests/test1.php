<?php
	require_once("../config/config.php");
	include "../clients/LiveLog.php";

	
	$testArray = array(1,2,3,4);
	$ll = new LiveLog("filename.php", "6dk4mt6jptl0m9rujtds59gaf5");

	$ll->postToServer($testArray);

	echo "working";

?>