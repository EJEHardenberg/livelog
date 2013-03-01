
      $(document).ready(function(){
        $('#goButton').click(function(){
          $('#sessionHolder').html(sessionID);
          
          $('#welcome').fadeOut(function(){
            $('#session').fadeIn();
          });
          
          var counter = 0
          var t = setInterval(function(){
          
          // grab server data
          $.ajax({
              type: "POST",
              url: "http://"+basedir+"/LiveLog/front_end/LiveLogDisplay.php",
              data: {
                "getCurrentLog": true,
                "sessionID": sessionID
              },
              success: function(data){
                // append raw data received from server
                $('.raw').append("\n"+data);
                try{
                  var obj = $.parseJSON(data);
                }catch(err){
                  $('.err').html(err);
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
              }   // end success()
            });  // end ajax
          },3000); // end setinterval
        }); // end $('go').click()
      })