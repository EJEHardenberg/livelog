<?php
	include "LiveLog.php";

	$ll = new LiveLog("filename.php", "5b2124dacd65996bddd0bb6b332b0258");
	$ll->postToServer("testdata 123");

	echo "working";

?>