<?php
  if(!$_SESSION){
    session_start();
  }
  
  $sessID = session_id();
?>
<html>
  <head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
      var sessionID = <? echo "'".$sessID."'"; ?>;
      $(document).ready(function(){
        $('#goButton').click(function(){
          $('#sessionHolder').html(sessionID);
          $('#welcome').hide();
          $('#session').show();

          //     $(document).ready(function(){
              var counter = 0
              var t = setInterval(function(){
        //       $('#blinker').toggle();
            $.ajax({
              type: "POST",
              url: "http://localhost/LiveLog/front_end/LiveLogDisplay.php",
              // url: "http://localhost/chrome_extensions/sharetosave_v2/sharetosave_server/addBookmark.php",
              data: {
                "getCurrentLog": true,
                "sessionID": sessionID
              },
              success: function(data){
                // var obj = $.parseJSON(data);
                $('.logContent').html(data);
                // for(var ii=1; ii<6; ii++){
                // $('.logOutput').html(
                //   "<li style='list-style-type:none' class='logItem'>File Name: "+obj.filename+"</li>"+
                //   "<li style='list-style-type:none' class='logItem'>Log Data: "+obj.logData+"</li>"
                //   );
                // }
                // $('.logOutput').append("</ul>");
              }   
            });
          },300);
        });
      })
    </script>

    <style type="text/css">
      #session{
        display:none;
      }

      ul{
        list-style-type: none;
      }
    </style>
  </head>
  
  <body>
    <div id="welcome">
      <ul>
        <li>Create New Logging Session</li>
        <li><input type="button" value="go" id="goButton"></li>
      </ul>
    </div>

    <div id="session">
      <ul>
        <li>Your session ID (2nd argument sent to new instance of LiveLog client)</li>
        <li id="sessionHolder"></li>
      </ul>

      Log Content:
      <div class="logContent">
      </div>
    </div>
  </body>

</html>
