<?php
session_start();
$_SESSION["index"] = "index";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Főoldal</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="title.js"></script>
  <script>
  $(document).ready(function(){
    $.post("home.php",{},
    function(data, status) {
      $("#contact").html(data);
    });
    });
  </script>
</head>
<body>
  <!-- menu -->
<div class="container" style="background: white; margin-bottom: 0;">
  <nav class="navbar navbar-default  fixed-top" style="background: white; margin-bottom: 0;">
    <div class="container" style="background: white; margin-bottom: 0;">
    <div class="navbar-header" id="head" style="background: white; margin-bottom: 0;">
      <h1>Fórum</h1>
    </div>
    <div style="background: white; margin-bottom: 0;">
      <ul class="nav navbar-default" >
        <li><a type="button" class="btn btn-dark">Főoldal</a></li>
        <li><a type="button" class="btn btn-light" href="forum.php">Fórum</a></li>
        <?php
        include("header.php");
        ?>
  </div>
      </ul>
      </div>
    </div>
  </nav>
</div>
<div class="content" style="margin-bottom: 0;">
  <div id="contact"></div>
  <div>
    <?php
    if(isset($_SESSION["mes"])){
      if($_SESSION["mes"] == "log")
      {
        echo '<div class="alert alert-success alert-dismissible text-center">Sikeres bejelentkezés!</div>';
        unset($_SESSION["mes"]);
      }
      else if($_SESSION["mes"] == "reg")
      {
        echo '<div class="alert alert-success alert-dismissible text-center">Sikeres regisztráció!</div>';
        unset($_SESSION["mes"]);
      }
    }
    ?>
  </div>
  <!-- welcome mezö-->
  <?php
    if(!isset($_SESSION["username"]))
    {
      include("welcome.php");
    }
  ?>
<!--cím-->
<div class="jumbotron text-center" style="display: table; width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
<h1>Legutóbbi Topik:</h1>
</div>
<div class="jumbotron text-center" style="margin-bottom: 0; border-radius: 0px;">
<h1 id="last">Nincs adat</h1>
</div>
<div class="jumbotron text-center" style="display: table; width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
<h1>Legnépszerűbb Topik:</h1>
</div>
<div class="jumbotron text-center " style="margin-bottom: 0; border-radius: 0px; ">
<h1 id="famous">Nincs adat</h1>
</div>
</div>
</body>
</html>
