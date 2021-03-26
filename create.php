<?php
include("connection.php");
//topik data
$date=date("Y-m-d",time());
$com=0;
$author="felhasználónév";
function selection($str) {
  $str=strip_tags($str);
  $str=stripslashes($str);
  $str=trim($str);
  return $str;
}
$s=false;
if(isset($_POST['t']) && !empty($_POST['t']) && strlen($_POST['t']) <= 40 && strlen($_POST['t']) >= 2 && $_POST['t'] == selection($_POST['t'])){
  $title=$_POST['t'];
  $s=true;
}
else {
  echo '<div class="error">Hibás topik név!</div>';
}
//title check
if($s==true)
{
  $a="SELECT * FROM `topik` WHERE title='$title'";
if($search=mysqli_query($db,$a))
{
  if(mysqli_num_rows($search)>0){
    echo '<div class="error">A topik név már foglalat.</div>';
  }
  else { //record
    $query="INSERT INTO topik (`date`,`comments`,`author`,`title`) VALUES ('".$date."','".$com."','".$author."','".$title."')";
    mysqli_query($db,$query) or die ('<div class="error">Hiba!</div>');
    $id=mysqli_insert_id($db);
    $did=$id."_table";
    $up="UPDATE topik SET database_id='$did' WHERE id='$id'";
    mysqli_query($db,$up) or die ('<div class="error">Hiba!'.$db->error.'</div>');
    $create="CREATE TABLE IF NOT EXISTS ".$did." (`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, `date` datetime NOT NULL, `name` text COLLATE utf8mb4_hungarian_ci NOT NULL, `text` text COLLATE utf8mb4_hungarian_ci NOT NULL)";
    $db->query($create) or die ('<div class="error">Hiba!:'.$create.'</div>');
    echo "Topik létrehozva!";
  }
  $search->free();
}
}
$db->close();
?>
