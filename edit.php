<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION['database'])){
  if(isset($_POST['id']))
  {
    $d=$_SESSION['database'];
    $id=$_POST['id'];
    function selection($str) {
      $str=strip_tags($str);
      $str=stripslashes($str);
      $str=trim($str);
      return $str;
    }
    if(isset($_POST['text']) && !empty($_POST['text']) && str_word_count($_POST['text'])<=500 && strlen($_POST['text'])>=1 && $_POST['text'] == selection($_POST['text'])){
    $text=$_POST['text'];
    include("connection.php");
    if($query=mysqli_query($db,"SELECT name FROM ".$d." WHERE id='$id'") or die ('<div class="error">Hiba!sql</div>'))
    {
      if(mysqli_num_rows($query)!=1){
        echo '<div class="error">Hiba!2</div>';
      }
      else {
        $result=$query->fetch_assoc();
        if($_SESSION["username"]==$result["name"])
        {

          $_SESSION["mes"]= "edit";
          mysqli_query($db,'UPDATE '.$d.' SET `text`="'.$text.'" WHERE id='.$id) or die ('<div class="error">Nem sikerült modosítani a kommentet!</div>');
        }
        else {
          echo '<div class="error">Hitelesitési hiba!</div>';
          $_SESSION["mes"]= "error";
        }
      }
      $query->free();
    }
    $db->close();
  }
  else{
    echo '<div class="error">Rossz formátumu a komment!</div>';
    $_SESSION["mes"]= "error";
  }
  }
  else {
    header("location: topik.php");
  }
}
else{
  header("location: forum.php");
}
?>
