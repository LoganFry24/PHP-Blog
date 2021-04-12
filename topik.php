<?php
session_start();
if(isset($_SESSION["id"])){
$_SESSION["index"] = "forum";
include("connection.php");
$a=$_SESSION["id"];
if($result=mysqli_query($db,"SELECT * FROM topik WHERE id = '$a'") or die ('<div class="error">Hiba!</div>'))
{
  if(mysqli_num_rows($result)!=1){
    echo '<div class="error">A topik nem létezik.</div>';
  }
  else {
    $row=$result->fetch_assoc();
    $author=$row["author"];
    $title=$row["title"];
    $_SESSION['database']=$row["database_id"];
    $result->free();
    $db->close();
    include("topik.inc.php");
  }
}
}
else{
  header("location: forum.php");
}
?>
