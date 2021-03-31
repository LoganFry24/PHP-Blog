<?php
//connection
include("connection.php");
//data
$date=date("Y-m-d h:i:sa",time());
$name = "admin";
$content=$_POST['c'];
echo $date;
//targeting rendszer jquery megadja  acommentet és a topik nevet a php pedig megkeresi a comment databaset uj rekorot csinál és ifrssit a a tpok rekorjában comments-et +1 -el
$target="1_table";
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
?>
