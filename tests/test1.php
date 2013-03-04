<?php
	include "LiveLog.php";

	$testArray = array(1,2,3,4);
	$ll = new LiveLog("filename.php", "c8eoi54ig99m6c7636q5d8n6m1");
	$ll->postToServer($testArray);

	echo "working";

?>