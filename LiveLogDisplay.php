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
			  $('.logOutput').append("<ul >");
			  for(var ii=1; ii<6; ii++){
				$('.logOutput').html(
				  "<li style='list-style-type:none' class='logItem'>File Name: "+obj.filename+"</li>"+
				  "<li style='list-style-type:none' class='logItem'>Log Data: "+obj.logData+"</li>"
				  );
			  }
			  $('.logOutput').append("</ul>");
			}		
		});
	},300);
//     });
  </script>
  
  <style type="text/css">
    html{
      background:url('images/kindajean.png');
    }
    .logOutput{
      background:white;
      -webkit-border-radius: 13px;
      border-radius: 13px;
      -webkit-box-shadow: inset 1px 1px 1px 1px rgba(2, 2, 2, 0.5);
      box-shadow: inset 1px 1px 1px 1px rgba(2, 2, 2, 0.5);
    }
  </style>
</head>
<body>
<h3>The current contents of your logger:</h3>
<div class="logOutput" style="border:solid 3px #444; padding:20px; margin:auto; width:75%;">
</div>

<!-- <div id="blinker" style="border:solid 4px green"></div> -->
</body>
<?
}
?>
