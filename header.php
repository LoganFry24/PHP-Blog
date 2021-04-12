<?php
if(isset($_SESSION["username"]) && $_SESSION["index"]=="prof"){
  echo '<div id="header"><li class="nav-item dropdown">
<a class="btn btn-dark dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
  '.$_SESSION["username"].'
</a>
<div class="dropdown-menu" style=" text-align: center;">
  <h5>'.$_SESSION["username"].'</h5>
  <hr style="margin: 0px;">
  <a class="dropdown-item" href="own.php">Topikjaid</a>
  <a class="dropdown-item" href="profile.php">Profilod</a>
  <a class="dropdown-item" href="logout.php">Kijelentkezés</a>
</div>
</li>';
}
else if(isset($_SESSION["username"]))
{
  echo '<div id="header"><li class="nav-item dropdown">
<a class="btn btn-light dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
  '.$_SESSION["username"].'
</a>
<div class="dropdown-menu" style=" text-align: center;">
  <h5>'.$_SESSION["username"].'</h5>
  <hr style="margin: 0px;">
  <a class="dropdown-item" href="own.php">Topikjaid</a>
  <a class="dropdown-item" href="profile.php">Profilod</a>
  <a class="dropdown-item" href="logout.php">Kijelentkezés</a>
</div>
</li>';
}
else if($_SESSION["index"]=="log"){
  echo '<li><a type="button" class="btn btn-dark" href="signin.php">Bejelentkezés</a></li>';
}
else {
  echo '<li><a type="button" class="btn btn-light" href="signin.php">Bejelentkezés</a></li>';
}
?>
