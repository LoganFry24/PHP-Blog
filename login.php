<?php
//input
function selection($str) {
  $str=strip_tags($str);
  $str=stripslashes($str);
  $str=trim($str);
  return $str;
}
$check=0;
if(isset($_POST['us']) && !empty($_POST['us'])&& $_POST['us'] == selection($_POST['us']) && strlen($_POST['us'])<=40 ){
  $fname=$_POST['us'];
  $check++;
}
elseif (empty($_POST['us'])){
  echo '<div class="error">Addj meg egy felhasználónevet!</div>';
}
else {
  echo '<div class="error">Hibás Felhasználónév!</div>';
}
if(isset($_POST['ps']) && !empty($_POST['ps'])&& $_POST['ps'] == selection($_POST['ps']) && strlen($_POST['ps'])<=40 && strlen($_POST['ps'])>=8){
  $ps=$_POST['ps'];
  $check++;
}
else {
  echo '<div class="error">Hibás jelszó!</div>';
}
if($check==2)
{
  include("connection.php");
  $result =mysqli_query($db, "SELECT * FROM `accounts`");
  if(mysqli_num_rows($result)>0){
    $table=array();
    $id=0;
    $us=false;
    $password=false;
    while($row=$result->fetch_object()){
     array_push($table,$row);
     if($table[$id]->username==$fname)
     {
       $us=true;
       if($table[$id]->password==$ps)
       {
         $password=true;
       }
     }
     $id++;
   }
   if($us==true && $password==true)
   {
     echo '<div class="error">chill</div>';
   }
   else if($us==false)
   {
     echo '<div class="error">Nincs ilyen felhasználó!</div>';
   }
   else if($password==false && $us==true){
     echo '<div class="error">Hibás jelszó!</div>';
   }
  }
  else if(mysqli_num_rows($result)==0){
   echo '<div class="error">Adatbázis hiba!</div>';
 }
}
if(isset($db))
{
  $db->close();
  $result->free();
}
?>
