<?php
// include "log.php";
if($_POST['data']){
  $data = $_POST['data'];
//   $data = "posting";
  $fhandle = fopen('log.txt', 'w+');
  $wrt = fwrite($fhandle, $data);
 }
 
?>
