<?php

if($_POST && $_POST['getCurrentLog']){
//   echo "working";
$logString = file_get_contents("log.txt");
echo $logString;
}else{?>

<html>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript">
//     $(document).ready(function(){
      var counter = 0
      var t = setInterval(function(){
//       $('#blinker').toggle();
	  $.ajax({
			type: "POST",
			// url: "http://slimdowndesign.com/chrome_extensions/sharetosave/index.php",
			url: "http://localhost/LiveLog/LiveLogDisplay.php",
			// url: "http://localhost/chrome_extensions/sharetosave_v2/sharetosave_server/addBookmark.php",
			data: {
				"getCurrentLog": true,
			},
			success: function(data){
			  var obj = $.parseJSON(data);
			  $('.logOutput').append("<ul style='list-style-type:none'>");
			  for(var ii=1; ii<6; ii++){
// 				$('.logOutput').append("<li class='logItem'>"+obj[ii]+"</li>");
			  }
			  $('.logOutput').append("</ul>");
			}		
		});
	},300);
//     });
  </script>
</head>
<body>
<h3>The current contents of your logger:</h3>
<div class="logOutput" style="border:solid 1px red; margin:auto; width:75%;">
</div>

<!-- <div id="blinker" style="border:solid 4px green"></div> -->
</body>
<?
}
?>
