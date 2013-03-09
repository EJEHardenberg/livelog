<?php

class LiveLog{
  public $filename;
  public $sessionID;
  
  
  function __construct($filename, $sessionID){
    $this->filename = $filename;
    $this->sessionID = $sessionID;
    $this->beginNewLog();
  }

  public function postToServer($var){
	  //where are we posting to?
// 	  $url = 'http://slimdowndesign.com/LiveLog/front_end/LiveLogCatch.php';
	  $url = 'http://localhost/LiveLog/front_end/LiveLogCatch.php';
	  $data = 'data='.json_encode($var)."&sessionID=".$this->sessionID."&filename=".$this->filename;

	  //open connection
	  $ch = curl_init();

	  //set the url, number of POST vars, POST data
	  curl_setopt($ch,CURLOPT_URL,$url);
	  curl_setopt($ch,CURLOPT_POST,count($data));
	  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

	  //execute post
	  $result = curl_exec($ch);

	  //close connection
	  curl_close($ch);
  } // end postLog
  
  private function beginNewLog(){
//    $url = 'http://slimdowndesign.com/LiveLog/front_end/LiveLogCatch.php';
	$url = 'http://localhost/LiveLog/front_end/LiveLogCatch.php';
   $data = 'beginSession='.$this->sessionID;
   //open connection
   $ch = curl_init();
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,count($data));
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  //execute post
  $result = curl_exec($ch);
	  //close connection
  curl_close($ch);
  } // end beginNewLog();

} // end LiveLog class def

?>
