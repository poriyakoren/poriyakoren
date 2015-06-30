
$(function() {

  $('#mobilenav, .navshadow').hide();

  $("#nav_but").click(function() {
    $("#toggle").toggleClass("on");

    if ($('#mobilenav, .navshadow').is(":hidden")) {
        $('#mobilenav, .navshadow').show();
        $("#toggle div").css("background-color" , "white");

      }else{
        $('#mobilenav, .navshadow').fadeOut( "fast" );
        $("#toggle div").css("background-color" , "black");
      }
  });

});