<div class="jumbotron text-center" style=" width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
<h1><?php echo $_SESSION["username"];?></h1>
</div>
<div class="jumbotron text-center" style=" width: 100%; margin-bottom: 0; border-radius: 0px;">
<table class="user">
  <tr>
    <th class="user"><h2>Regisztrált E-mail cím</h2></th>
    <th class="user"><h2>Regisztráció Dátuma</h2></th>
  </tr>
  <tr>
    <td class="user"><h4><?php echo $_SESSION["email"];?></h4></td>
    <td class="user"><h4><?php echo $_SESSION["date"];?></h4></td>
  </tr>
    </table>
</div>
