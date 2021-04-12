<?php
include("connection.php");
if($fq=mysqli_query($db, "SELECT title FROM topik WHERE comments= (SELECT MAX(comments) FROM topik)"))
{
  if(mysqli_num_rows($fq)>=1)
  {
    $fam=$fq->fetch_assoc();
    echo '<script>d="'.$fam["title"].'";document.getElementById("famous").innerHTML=d;</script>';
  }
  else {
    echo '<div class="error">Adatbázis hiba!</div>';
  }
  $fq->free();
}
if($lq=mysqli_query($db, "SELECT title FROM topik WHERE id= (SELECT MAX(id) FROM topik)"))
{
  if(mysqli_num_rows($lq)!=1){
    echo '<div class="error">Adatbázis hiba!</div>';
  }
  else {
    $last=$lq->fetch_assoc();
    echo '<script>d="'.$last["title"].'";document.getElementById("last").innerHTML=d;</script>';
  }
  $lq->free();
}
$db->close();
?>
