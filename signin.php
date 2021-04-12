<?php
session_start();
$_SESSION["index"] = "log";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bejelentkezés</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="logo.png">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- JQuery-->
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="title.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#lg").show();
  $("#re").hide();
  $("#signupl").click(function(){
    $("#lg").hide(1000);
    $("#re").show();
    $('#lp').hide();
    window.scrollTo(0, 0);
  });
  $("#signinr").click(function(){
    $("#re").hide(1000);
    $("#lg").show();
    $('#rp').hide();
    window.scrollTo(0, 0);
  });
  $("#log").click(function(){
    $('#lp').hide();
    var username= $('#username').val();
    var password= $('#password').val();
    $.post("login.php",{us:username,ps:password},
  function(data, status){
    $("#lp").html(data);
    $('#lp').show();
    var state=$('#lp').text();
    if(state == 'success')
    {
      window.open("index.php","_self");
    }
    window.scrollTo(0, 0);
  });
  });
  $("#reg").click(function(){

    var email= $('#emailr').val();
    var username= $('#usernamer').val();
    var password= $('#passwordr').val();
    var passwordr= $('#passwordrr').val();
    $('#rp').hide();
    $.post("registration.php",
    {em:email,us:username,ps:password,pr:passwordr},
  function(data, status) {
    $("#rp").html(data);
    $('#rp').show();
    var state=$('#rp').text();
    if(state == 'success')
    {
      window.open("index.php","_self");
    }
    window.scrollTo(0, 0);
  });
  });
  });
</script>
</head>
<body>
  <div id="contact"></div>
  <div class="container" style="background: white;">
    <nav class="navbar navbar-default fixed-top" style="background: white;">
      <div class="container" style="background: white;">
      <div class="navbar-header" id="head">
        <h1>Fórum</h1>
      </div>
      <div>
        <ul class="nav navbar-default ">
          <li><a type="button" class="btn btn-light" href="index.php">Főoldal</a></li>
          <li><a type="button" class="btn btn-light" href="forum.php">Fórum</a></li>
          <?php
          include_once("header.php");
          ?>
        </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="content" style="margin-bottom: 0;">
<?php
if(isset($_SESSION["username"]))
{
  echo '<div class="content" style="margin-bottom: 0;"><div class="error">Már be vagy jelentkezve!</div></div>';
}
else {
  include("signin.inc.php");
}
?>
</div>
</body>
</html>
