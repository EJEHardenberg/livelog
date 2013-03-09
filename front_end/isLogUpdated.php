<?php
$sessionID = $_POST['sessionID'];
header("Content-Type: text/plain");
echo filemtime("logfiles/".$sessionID.".txt");
?>