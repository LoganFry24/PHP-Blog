<?php
session_start();
$_SESSION["index"] = "prof";
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $_SESSION["username"]." | Topikjaid";?></title>
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

</head>
<body>
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
  include("own.inc.php");
}
else {
  echo '<div class="content" style="margin-bottom: 0;"><div class="error">Még nem vagy bejelentkezve!</div></div>';
}
?>
</div>
</body>
</html>
