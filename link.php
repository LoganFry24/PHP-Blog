<?php
if(isset($_POST['id']))
{
session_start();
if(isset($_SESSION['id']))
{
  unset($_SESSION['id']);
}
$_SESSION['id']=$_POST['id'];
}
else {
  header("location: forum.php");
}
?>
