<?php
session_start();
if(isset($_SESSION['database'])){
include("connection.php");
if($result=mysqli_query($db,"SELECT * FROM ".$_SESSION['database']) or die ('<div class="error">Hiba!</div>'))
{
  if(mysqli_num_rows($result)>0){
    $table=array();
    $date=array();
    $time=array();
    $id=0;
    while($row=$result->fetch_object()){
     array_push($table,$row);
     $date[$id]=explode(" ",$table[$id]->date)[0];
     $time[$id]=explode(" ",$table[$id]->date)[1];
     $id++;
   }
   $id=count($table);
   if($id % 2==0)
   {
     $s= 1;
   }
   else {
     $s= 0;
   }
   while($id!=0)
   {
     $id--; //páratlanok lesznek a fehérek valojában mert a 37 idjüt logikailag 36 nak számolja
     if($id % 2==$s )
     {
       echo '<div class="jumbotron" style="display: table; width: 100%; background: white; margin-bottom: 0; border-radius: 0px;"><div class="info"> <h5>#'.$table[$id]->id.'</h5> <h4>'.$table[$id]->name.'</h4><p>Ekkor írta:</p><p>'.$time[$id].'<br>'.$date[$id].'</p></div>';
       echo '<div class="com" id="'.$table[$id]->id.'text"><p class="lead" id="'.$table[$id]->id.'lead">'.$table[$id]->text.'</p><span class="js" id="'.$table[$id]->id.'js"></span></div>';
     }
     else {
       echo '<div class="jumbotron" style="display: table; width: 100%; margin-bottom: 0; border-radius: 0px;"><div class="info"> <h5>#'.$table[$id]->id.'</h5> <h4>'.$table[$id]->name.'</h4> <p>Ekkor írta:</p><p>'.$time[$id].'<br>'.$date[$id].'</p></div>';
       echo '<div class="com" id="'.$table[$id]->id.'text"><p class="lead" id="'.$table[$id]->id.'lead">'.$table[$id]->text.'</p><span class="js" id="'.$table[$id]->id.'js"></span></div>';
     }
     if(isset($_SESSION['username']) && $_SESSION['username']==$table[$id]->name && !isset($_SESSION['edit']))
     {
       echo '<div id="'.$table[$id]->id.'module" style="float: right; margin-top: 20px;"><button onclick="edit('.$table[$id]->id.')" id="'.$table[$id]->id.'del" class="module" style="border: none; background: none;"><i class="fas fa-pen" style="font-size: 25px; color: gray;"></i></button><br><br><button class="comcan" id="comcan'.$table[$id]->id.'" style="border: none; background: none;"><i style="font-size:40px;color:gray" class="fas fa-times"></i></button><br><button onclick="del('.$table[$id]->id.')" id="'.$table[$id]->id.'" class="module" style="border: none; background: none;"><i class="fas fa-trash-alt" style="font-size: 28px; color: gray;"></i></button></div></div>';
     }
     elseif (isset($_SESSION['username']) && $_SESSION['username']==$table[$id]->name) {
       echo '<button>Mégse</button></div>';
       unset($_SESSION['edit']);
     }
     else {
       echo '</div>';
     }
   }
   }
   $result->free();
   $db->close();
}
else {
  $db->close();
}
}
else {
  header("location: forum.php");
}
?>
