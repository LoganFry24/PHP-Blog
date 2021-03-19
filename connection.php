<?php
//database connection
$db=@ new mysqli('127.0.0.1','root','','php-blog');
if($db->connect_errno) {
  echo '<div class="error">Nem sikerült kapcsolodni az adatbázishoz! Hibakód:'.$db->connect_errno."</div>";
  exit();
}
?>
