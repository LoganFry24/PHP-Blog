<?php
//input
function selection($str) {
  $str=strip_tags($str);
  $str=stripslashes($str);
  $str=trim($str);
  return $str;
}
if(isset($_POST['us']) && !empty($_POST['us'])&& $_POST['us'] == selection($_POST['us']) && strlen($_POST['us'])<=40 ){
  $fname=$_POST['us'];
}
else {
  echo "Hibás Felhasználónév!";
}
if(isset($_POST['ps']) && !empty($_POST['ps'])&& $_POST['ps'] == selection($_POST['ps']) && strlen($_POST['ps'])<=40 && strlen($_POST['ps'])>=8){
  $ps=$_POST['ps'];
}
else {
  echo "Hibás jelszó!";
}
include("connection.php");
echo "s";
?>
