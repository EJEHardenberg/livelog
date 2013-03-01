
      $(document).ready(function(){
        $('#goButton').click(function(){
          $('#sessionHolder').html(sessionID);
          $('#welcome').hide();
          $('#session').fadeIn();

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
                $('#test').html(data);
                try{
                  var obj = $.parseJSON(data);
                }catch(err){
                  $('#test').html(err);
                }
                for(var ii=1; ii<6; ii++){
                $('.logOutput').html(
                  "<div class='logItem'>File Name: "+obj.filename+"</div>"+
                  "<div class='logItem'>Log Data: "+obj.logData+"</div>"
                  );
                }
                // $('.logOutput').append("</ul>");
              }   
            });
          },300);
        });
      })