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

echo $fname;
?>
