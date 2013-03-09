<?php
	include "LiveLog.php";

	$testArray = "hello";
	$ll = new LiveLog("filename.php", "46v2fvj5253hhgs6osuiqcede5");
	$ll->postToServer($testArray);

	echo "working";

?>