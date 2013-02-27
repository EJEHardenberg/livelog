<?php
if($_POST['data']){
  $fhandle = fopen('log.txt', 'w+');
  $wrt = fwrite($fhandle, $_POST['data']);
 }
 
?>
