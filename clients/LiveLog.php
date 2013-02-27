<?php

class LiveLog{
  public $filename;
  
  
  function __construct($filename){
    $this->filename = $filename;
  }

  public function postToServer($var){
	  //where are we posting to?
	  $url = 'http://localhost/LiveLog/LiveLogCatch.php';
	  $arr = array('filename'=>$this->filename, 'logData'=>$var); 
	  $data = 'data='.json_encode($arr);

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

} // end LiveLog class def

?>
