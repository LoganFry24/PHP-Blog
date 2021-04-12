<?php
  session_start();
if(isset($_SESSION["username"]))
{
//connection
include("connection.php");
//data
$date=date("Y-m-d h:i:sa",time());
$name = $_SESSION["username"];
$check=0;
function selection($str) {
  $str=strip_tags($str);
  $str=stripslashes($str);
  $str=trim($str);
  return $str;
}
if(isset($_POST['c']) && !empty($_POST['c']) && str_word_count($_POST['c'])<=500 && strlen($_POST['c'])>=1 && $_POST['c'] == selection($_POST['c']))
{
  $content=$_POST['c'];
  $check++;
}
else {
  echo '<div class="error">A komment nem megfelelö formátumu!</div>';
}
//targeting rendszer jquery megadja  acommentet és a topik nevet a php pedig megkeresi a comment databaset uj rekorot csinál és ifrssit a a tpok rekorjában comments-et +1 -el
$target=$_SESSION['database'];
if($check==1){
if($result=mysqli_query($db, "SELECT comments FROM topik WHERE database_id = '$target'") or die ('<div class="error">Hiba az adatbázis hitelesítésében!</div>'))
{
  if(mysqli_num_rows($result)!=1){
    echo '<div class="error">A topik nem létezik.</div>';
  }
  else {
    $row=$result->fetch_assoc();
    $a=$row["comments"]+1;
    mysqli_query($db,"UPDATE topik SET comments='$a' WHERE database_id='$target'") or die('<div class="error">Hiba!'.$db->error.'</div>');
    mysqli_query($db,"INSERT INTO ".$target." (`date`,`name`, `text`) VALUES ('".$date."','".$name."','".$content."')") or die ('<div class="error">Hiba!'.$db->error.'</div>');

  }
  $result->free();
}
$db->close();
}
}
else
{
  echo '<div class="error">Nem vagy bejelentkezve!</div>';
}
?>
