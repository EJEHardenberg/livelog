
      $(document).ready(function(){
        
        if(skipWelcome == 1){
          $('#sessionHolder').html(sessionID);
          
          $('#welcome').fadeOut(function(){
            $('#session').fadeIn();
            $('#sessionContainer').fadeIn();
          });
          
          loadContent();
        }else{
          $('#goButton').click(function(){
            $('#sessionHolder').html(sessionID);
            
            $('#welcome').fadeOut(function(){
              $('#session').fadeIn();
              $('#sessionContainer').fadeIn();
            });
            
            loadContent();
        
          }); // end $('go').click()
        }
      })



function loadContent(){
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
                $('.raw').html(data);

                // try catch for parsing json
                try{
                  var obj = $.parseJSON(data);
                  // test if the json is an array oran object, and parse
                  if(isJsonArray(obj)){
                    parseJsonArray(obj);
                  }else{
                    parseJsonObj(obj);
                  }
                }catch(err){
                  $('.err').html(err);
                }
                    
                $('.phpBlock').html("");
                $('.javaBlock').html("");
                $('.pythonBlock').html("");

                for(var ii=0; ii<numPHP; ii++){
                  $('.phpBlock').append(
                          "<div class='logContent phpLog'>"+obj[0]+"</div>"
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
} // end loadConten

// utility function for testing whether json is in object format or array format
function isJsonArray(jsonObj){
  if(jsonObj[0]!= undefined){
    return true;
  }else{
    return false;
  }
}