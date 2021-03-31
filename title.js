$("#head").show();

$(window).on('scroll', function() {
  var w=window.innerWidth;
  if($(window).scrollTop() && w<500)
  {
    $("#head").hide(100);
  }
  else {
      $("#head").show();
  }
  $(window).resize(function()
  {
    w=window.innerWidth;
    if($(window).scrollTop() && w<500)
    {
      $("#head").hide(10000);
    }
    else {
        $("#head").show();
    }
  });
});
$(document).ready(function(){
  $("#welcome").hide();
  });
