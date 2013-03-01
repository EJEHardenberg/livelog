<?php
	include "LiveLog.php";

	$ll = new LiveLog("filename.php", "re18vre7vshattqs7d0kl87ao7");
	$ll->postToServer("testdata 123");

	echo "working";

?>