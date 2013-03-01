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
    </script>

    <script src="index.js"></script>

   <link rel="stylesheet" href="style.css">
  </head>
  
  <body>
    <div id="session">
      <ul>
        <li>Your session ID: <span id="sessionHolder"></span></li>
      </ul>

      Log Content:
      <div class="logContent">
      </div>

      <div class="debug">
        Debug:
        <div id="test">
        </div>
      </div>
    </div>



      <div id="welcome">
        <div class="nest welcomeNest">
        Welcome to LiveLog, the ease web-based code debugger.
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
  </div> <!-- end welcome -->


  </body>

</html>
