<?php
$sessionID = $_POST['sessionID'];
header("Content-Type: text/plain");
echo filemtime("logfiles/".$sessionID.".txt");
//echo 1000000000000;
?>