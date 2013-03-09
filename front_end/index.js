
      $(document).ready(function(){
        
        if(skipWelcome == 1){
          $('#sessionHolder').html(sessionID);
          
          $('#welcome').fadeOut(function(){

          });
          
          checkForNewContent();
        }else{
          $('#goButton').click(function(){
            $('#sessionHolder').html(sessionID);
            
            $('#welcome').fadeOut(function(){
              $('#loading').show();
            });
            
            checkForNewContent();
        
          }); // end $('go').click()
        }
      })



function checkForNewContent(){
  var counter = 0
  var t = setInterval(function(){
    $.ajax({
      type: "POST",
      url: "http://"+basedir+"/LiveLog/front_end/isLogUpdated.php",
      data: {
        "sessionID": sessionID
      },
      success: function(data){
        if(data>$('#lastUpdated').val()){
          $('#lastUpdated').val(data);
          retrieveLogData();
        }
      }
    });
  },3000); // end setinterval
} // end loadContent

function parseJsonArray(obj){
  var out = "Array{"; // holds our output to be returned
  // alert(obj.length);
  for(var ii=0; ii<obj.length; ii++){
    out += "<br />&nbsp;&nbsp;["+ii+"] = "+obj[ii];
  }
  out += "<br />}<br />"
  return out;
}

// utility function for testing whether json is in object format or array format
function isJsonArray(jsonObj){
  if(jsonObj[0]!= undefined){
    return true;
  }else{
    return false;
  }
}

function collapseContent(domObj){
  domObj.slideUp();
}

function retrieveLogData(){
  // grab server data
      $.ajax({
              type: "POST",
              url: "http://"+basedir+"/LiveLog/front_end/LiveLogDisplay.php",
              data: {
                "getCurrentLog": true,
                "sessionID": sessionID
              },
              success: function(data){
                $('#loading').fadeOut(function(){
                  $('#session').fadeIn();
                  $('#sessionContainer').fadeIn();
                });

                // append raw data received from server
                $('.raw').html(data);
                var output = "";

                // try catch for parsing json
                try{
                  var obj = $.parseJSON(data);
                  // test if the json is an array oran object, and parse
                  if(isJsonArray(obj)){
                    output = parseJsonArray(obj);
                  }else{
                    output = parseJsonObj(obj);
                  }
                }catch(err){
                  $('.err').html(err);
                }
                    
                $('.phpBlock').html("");
                $('.javaBlock').html("");
                $('.pythonBlock').html("");

                for(var ii=0; ii<numPHP; ii++){
                  $('.phpBlock').append(
                        "<div class='phpFile fileBlock'>File "+ii+
                        "<div class='folds'></div>"+
                          "<div class='logContent phpLog'>"+output+"</div>"+
                        "</div>"
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

                $('.folds').addClass("expanded");

                $('.folds').click(function(){
                  if($(this).hasClass("expanded")){
                    $(this).removeClass("expanded").addClass("collapsed");
                    $(this).parent().find('.logContent').slideUp();
                  }else{
                    $(this).addClass("expanded").removeClass("collapsed");
                    $(this).parent().find('.logContent').slideDown();
                  }
                });

              }   // end success()
            });  // end ajax
}