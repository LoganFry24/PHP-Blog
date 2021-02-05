<?php
//database connection
$db=@ new mysqli('127.0.0.1','root','','php-blog');
if($db->connect_errno) {
  echo "nem sikerült kapcsolodni az adatbázishoz! "," ".$db->connect_errno;
  exit();
}
?>
