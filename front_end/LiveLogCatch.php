<?php
// include "log.php";
if($_POST['data'] && $_POST['sessionID']){
  $data = $_POST['data'];
  $sessionID = $_POST['sessionID'];
	// $data = "bad stuff";
	// $sessionID = "re18vre7vshattqs7d0kl87ao7";
	//   $data = "posting";
  $sessionFilename = "logfiles/".$sessionID.".txt";
  $fhandle = fopen($sessionFilename, 'w+');
  $wrt = fwrite($fhandle, $data);
 }
 
?>
