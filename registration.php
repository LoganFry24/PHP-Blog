<?php
//input
function selection($str) {
  $str=strip_tags($str);
  $str=stripslashes($str);
  $str=trim($str);
  return $str;
}
$check=0;
$password="";
$pr="";
if(isset($_POST['us']) && !empty($_POST['us'])&& $_POST['us'] == selection($_POST['us']) && strlen($_POST['us'])<=11 && strlen($_POST['us'])>=3){
  $fname=$_POST['us'];
  $check++;
}
else if(empty($_POST['us'])){
  echo '<div class="error">Nem adtál meg egy felhasználónevet!</div>';
}
else {
  echo '<div class="error">Nem megfelelö a Felhasználónév!</div>';
}
if(isset($_POST['em']) && !empty($_POST['em'])&& $_POST['em'] == selection($_POST['em']) && strlen($_POST['em'])<=40 && strlen($_POST['em'])>=6 && strpos($_POST['em'], "@")>0 && strpos($_POST['em'], ".")>0){
  $email=$_POST['em'];
  $check++;
}
else if(empty($_POST['em'])){
  echo '<div class="error">Nem adtad meg az e-mail cimet!</div>';
}
else {
  echo '<div class="error">Nem megfelelö formátumu az e-mail cím!</div>';
}
if(isset($_POST['ps']) && !empty($_POST['ps'])&& $_POST['ps'] == selection($_POST['ps']) && strlen($_POST['ps'])<=20 && strlen($_POST['ps'])>=8){
  $password=$_POST['ps'];
}
else if(empty($_POST['ps'])){
  echo '<div class="error">Nem adtál meg jelszót!</div>';
}
else {
  echo '<div class="error">Nem megfelelö formátumu a jelszó!</div>';
}
if(isset($_POST['pr']) && !empty($_POST['pr'])&& $_POST['pr'] == selection($_POST['pr']) ){
  $pr=$_POST['pr'];
  //password check
  if($pr==$password)
  {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    if(!$uppercase || !$lowercase || !$number ) {
      echo '<div class="error">A jelszónak legalább egy nagy és egy kis betűt illetve egy számot kell tartalmaznia!</div>';
   }
   else {
     $check++;
   }
  }
  else if(!empty($_POST['ps'])){
    
  }
  else {
    echo '<div class="error">A jelszavak nem egyeznek!</div>';
  }
}
else if(empty($_POST['pr'])){
  echo '<div class="error">Add meg jelszót újra!</div>';
}

//check userdata
$success=0;
if($check==3)
{
  //connection
  include("connection.php");
  $result =mysqli_query($db, "SELECT * FROM `accounts`");
  if(mysqli_num_rows($result)>0){
    $table=array();
    $id=0;
    $cus=false;
    $cem=false;
    while($row=$result->fetch_object()){
     array_push($table,$row);
     if($table[$id]->username==$fname)
     {
       $cus=true;
     }
     if($table[$id]->email==$email)
     {
       $cem=true;
     }
     $id++;
   }
   if($cus==true)
   {
     echo '<div class="error">A felhasználónév már foglalt!</div>';
   }
   else {
     $success++;
   }
   if($cem==true)
   {
     echo '<div class="error">Ezen az e-mail címen már regisztráltak!</div>';
   }
   else {
     $success++;
   }
  }
  else if(mysqli_num_rows($result)==0){
   $success=2;
 }
}
if($success==2)
{
  $query ="INSERT INTO `accounts` (`username`,`email`,`password`) VALUES ('".$fname."','".$email."','".$password."')";
  $db->query($query) or die ("Hiba a kapcsolatban!");
  echo '<div class="error">Sikeres Regisztráció!</div>';
}
  if(isset($db))
  {
    $db->close();
    $result->free();
  }
?>
