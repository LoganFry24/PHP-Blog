$("#head").show();
$(window).on('scroll', function() {
  var w=window.innerWidth;
  if($(window).scrollTop() && w<500)
  {
    $("#head").hide();
  }
  else {
      $("#head").show();
  }
  $(window).resize(function()
  {
    w=window.innerWidth;
    if($(window).scrollTop() && w<500)
    {
      $("#head").hide();
    }
    else {
        $("#head").show();
    }
  });
});
