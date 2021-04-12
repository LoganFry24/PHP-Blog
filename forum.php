<?php
session_start();
$_SESSION["index"] = "forum";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fórum</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script><!--Icon link-->
  <link rel="stylesheet" href="style.css">
  <!--Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="title.js"></script>
  <script type="text/javascript">
  function link(clicked_id){
    $.post("link.php",{id:clicked_id},
    function(data, status) {
    });
    window.open("topik.php","_self");
  }
  $(document).ready(function(){
    $.post("list.php",{},
    function(data, status) {
      $("#contact").html(data);
    });
    $("#tname").hide();
    $("#make").hide();
    $("#newt").show();
    $("#newt").click(function(){
      $("#newt").hide();
      $("#make").show();
      $("#tname").show();
    });
    $("#make").click(function(){
      $("#make").hide();
      $("#tname").hide();
      $("#newt").show();
      var title=$('#tname').val();
      document.getElementById('tname').value = '';
      $.post("create.php",{t:title},
      function(data, status) {
        $("#message").html(data);
        $.post("list.php",{},
        function(data, status) {
          $("#contact").html(data);
        });
      });
    });
  });
  </script>
</head>
<body>
<div class="container" style="background: white; margin-bottom: 0;">
  <nav class="navbar navbar-default fixed-top" style="background: white; margin-bottom: 0;">
    <div class="container" style="background: white; margin-bottom: 0;">
    <div class="navbar-header" id="head">
      <h1>Fórum</h1>
    </div>
    <div>
      <ul class="nav navbar-default">
        <li><a type="button" class="btn btn-light" href="index.php">Főoldal</a></li>
        <li><a type="button" class="btn btn-dark" >Fórum</a></li>
        <?php
        include("header.php");
        ?>
      </ul>
      </div>
    </div>
  </nav>
</div>
<div class="content" style="margin-bottom: 0;">
  <!-- welcome mezö-->
  <?php
    if(!isset($_SESSION["username"]))
    {
      include("welcome2.php");
    }
    else {
      include("create.inc.php");
    }
  ?>
<!-- Topik generálás-->
<div class="jumbotron" style="display: table; width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
  <h1>Topikok:</h1>
  <div id="contact"></div>
</div>

</div>
</body>
</html>
