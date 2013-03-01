
      $(document).ready(function(){
        $('#goButton').click(function(){
          $('#sessionHolder').html(sessionID);
          $('#welcome').fadeOut(function(){
            $('#session').fadeIn();
          });

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

                    $('.phpBlock').html("");
                    $('.javaBlock').html("");
                    $('.pythonBlock').html("");

                    for(var ii=0; ii<numPHP; ii++){
                      $('.phpBlock').append(
                          "<div class='logContent phpLog'></div>"
                        );
                    }

                    for(var ii=0; ii<numJava; ii++){
                      $('.javaBlock').append(
                          "<div class='logContent javaLog'></div>"
                        );
                    }

                    for(var ii=0; ii<numPython; ii++){
                      $('.pythonBlock').append(
                          "<div class='logContent pythonLog'></div>"
                        );
                    }
                    // $('.logOutput').append("</ul>");
                  }   
                });
          },300);
        });
      })