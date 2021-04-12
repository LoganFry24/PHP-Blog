<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION['database'])){
  if(isset($_POST['id']))
  {
    $d=$_SESSION['database'];
    $id=$_POST['id'];
    include("connection.php");
    if($query=mysqli_query($db,"SELECT name FROM ".$d." WHERE id='$id'") or die ('<div class="error">Hiba!sql</div>'))
    {
      if(mysqli_num_rows($query)!=1){
        echo '<div class="error">Hiba!2</div>';
      }
      else {
        if($topik=mysqli_query($db, "SELECT comments FROM topik WHERE database_id = '$d'") or die ('<div class="error">Hiba az adatbázis hitelesítésében!</div>'))
        {
          $result=$topik->fetch_assoc();
          $topik->free();
          $a=$result["comments"]-1;
          $result=$query->fetch_assoc();
          if($_SESSION["username"]==$result["name"])
          {
            //echo "success";
            $_SESSION["mes"]= "del";
            echo $a;
            mysqli_query($db,"UPDATE topik SET comments='$a' WHERE database_id='$d'") or die('<div class="error">Hiba!'.$db->error.'</div>');
            mysqli_query($db,"DELETE FROM ".$d." WHERE id=".$id) or die ('<div class="error">Nem sikerült törölni a kommentet!</div>');
          }
          else {
            echo '<div class="error">Hitelesitési hiba!</div>';
          }
        }

      }
      $query->free();
    }
    $db->close();
  }
  else {
    header("location: topik.php");
  }
}
else{
  header("location: forum.php");
}
?>
