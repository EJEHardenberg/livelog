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

   <link rel="stylesheet" href="style.css">
  </head>
  
  <body>
    <div id="welcome">
        Welcome to LiveLog, the ease web-based code debugger.
        <div>
          Using LiveLog is simple:
            <ul>
              <li>1. Download the client code for the language you are working in.</li>
              <li>2. Include the file in whichever code you want to debug.</li>
              <li>3. Start a new debugging session on this page, and view the output of your code.</li>
            </ul>

            <ul>
              <li>Available clients</li>
              <li><a href="../clients/LiveLog.java.zip">Java</a><span class="usage javaUsage">usage</span></li>
              <li><a href="../clients/LiveLog.php.zip">PHP</a><span class="usage phpUsage">usage</span></li>
              <li><a href="../clients/LiveLog.python.zip">Python</a><span class="usage pythonUsage">usage</span></li>
            </ul>



      <ul>
        <li>Create New Logging Session</li>
        <li><input type="button" value="go" id="goButton"></li>
      </ul>
    </div>
  </div>

    <div id="session">
      <ul>
        <li>Your session ID: <span id="sessionHolder"></span></li>
      </ul>

      Log Content:
      <div class="logContent">
      </div>
    </div>
  </body>

</html>
