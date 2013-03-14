<?php
	include "LiveLog.php";

<<<<<<< HEAD
	$testArray = "hello";
	$ll = new LiveLog("filename.php", "46v2fvj5253hhgs6osuiqcede5");
=======
	$testArray = array(1,2,3,4);
	$ll = new LiveLog("filename.php", "c8eoi54ig99m6c7636q5d8n6m1");
>>>>>>> 532c0ca2758fabbdaab4445ef417f673962a1b23
	$ll->postToServer($testArray);

	echo "working";

?>