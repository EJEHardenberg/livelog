<?php
// include "log.php";
// echo("Contents of the POST variabe\n");
// var_dump($_POST);

//catch the post from the client to the server, generate the file
if($_POST['beginSession']){
	$sessionFilename = "logfiles/".$_POST['beginSession'].".txt";
	$fhandle = fopen($sessionFilename, 'w+');
	$wrt = fwrite($fhandle, "");
	$cl = fclose($fhandle);
}else if($_POST['data'] && $_POST['sessionID']){
  $data = $_POST['data'];
  $sessionID = $_POST['sessionID'];
	// $data = "bad stuff";
	// $sessionID = "re18vre7vshattqs7d0kl87ao7";
	//   $data = "posting";
  $sessionFilename = "logfiles/".$sessionID.".txt";
  $fhandle = fopen($sessionFilename, 'a+');
  if($fhandle){
  	$wrt = fwrite($fhandle, $data);	
  }else{
  	error_log("Failed to open log file for appending due to fopen returning an invalid file handle");
  }
  
 }
 
?>
