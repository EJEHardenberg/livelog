<?php
	include "LiveLog.php";

	$testArray = array(1,2,3,4);
	$ll = new LiveLog("filename.php", "re18vre7vshattqs7d0kl87ao7");
	$ll->postToServer($testArray);

	echo "not working";

?>