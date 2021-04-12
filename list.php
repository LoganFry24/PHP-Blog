<?php
include("connection.php");
if($result =mysqli_query($db, "SELECT * FROM `topik`"))
{
  if(mysqli_num_rows($result)>0){
    $table=array();
    $id=0;
    echo '<table style="text-align: center;"><tr><th>Topik neve</th><th>Létrehozó</th><th>Létrehozás Dátuma</th></tr>';
    while($row=$result->fetch_object()){
     array_push($table,$row);
     echo '<tr><td style="padding: 0px;"><button class="btn btn-link" onclick="link('.$table[$id]->id.')" id="'.$table[$id]->id.'">'.$table[$id]->title.'</button></td><td style="text-align: center;">'.$table[$id]->author.'</td><td style="text-align: center;">'.$table[$id]->date.'</td></tr>';
     $id++;
   }
   echo '</table>';
  }
  else{
    echo '<div class="error">Adatbázis hiba!</div>';
  }
  $result->free();
  $db->close();
}
?>
