<div class="jumbotron text-center" style=" width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
<h1><?php echo $_SESSION["username"];?></h1>
</div>
<div class="jumbotron" style="display: table; width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
  <h1>Topikjaid:</h1>
  <div id="contact">
    <?php
    include("connection.php");
    $a=$_SESSION["username"];
    if($result =mysqli_query($db, 'SELECT * FROM `topik` WHERE author="'.$a.'"'))
    {
      if(mysqli_num_rows($result)>0){
        $table=array();
        $id=0;
        echo '<table style="text-align: center;"><tr><th >Topik neve</th><th>Létrehozás Dátuma</th></tr>';
        while($row=$result->fetch_object()){
         array_push($table,$row);
         echo '<tr><td style="text-align: center;">'.$table[$id]->title.'</td><td style="text-align: center;">'.$table[$id]->date.'</td></tr>';
         $id++;
       }
       echo '</table>';
      }
      else{
        echo '<div class="error">Te még nem hoztál létre topikot!</div>';
      }
    }
    ?>
  </div>
</div>
