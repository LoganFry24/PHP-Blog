<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title." | Fórum";?></title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <!--Icon link-->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="title.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $.post("comlist.php",{},
    function(data, status){
      $("#contact").html(data);
            $(".comcan").hide();
      });
    $("#cancel").hide();
    $("#comment").hide();
    $("#st").hide();
    $("#commit").hide();
    $("#newc").show();
    $("#newc").click(function(){
      $("#newc").hide();
      $("#comment").show();
      $("#commit").show();
      $("#st").show();
      $("#cancel").show();
    });
    $("#commit").click(function(){
      $("#comment").hide();
      $("#commit").hide();
      $("#newc").show();
      $("#st").hide();
      $("#cancel").hide();
      var com =$('#comment').val();
      document.getElementById('comment').value = '';
      $.post("comment.php",{c:com},
      function(data, status) {
        $("#message").html(data);
        $.post("comlist.php",{},
        function(data, status){
          $("#contact").html(data);
          $(".comcan").hide();
          });
      });
      });
      $("#cancel").click(function(){
        $("#cancel").hide();
        $("#comment").hide();
        $("#commit").hide();
        $("#st").hide();
        $("#newc").show();
        });
      });
      function edit(cid){
        $(".module").show();
        $(".comcan").hide();
        $(".js").hide();
        $(".lead").show();
        var text=$('#'+cid+'lead').text();
        document.getElementById(cid+"js").innerHTML='Maximum 500 szó hosszú lehet!<textarea id="commented" placeholder="Ide irhatod a mondanivalódat..." style="width: 1500px; height: 500px;">'+text+'</textarea><button type="button" class="btn btn-success" id="commited">Mentés <i class="fas fa-paper-plane"></i></button>';
        $('#'+cid+'js').show();
        $('#'+cid+'lead').hide();
        $('#'+cid).hide();
        $('#comcan'+cid).show();
        $('#'+cid+'del').hide();
        $("#comcan"+cid).click(function(){
        $('#comcan'+cid).hide();
        $('#'+cid).show();
        $('#'+cid+'del').show();
        $('#'+cid+'lead').show();
        document.getElementById(cid+"js").innerHTML="";
      });
      $("#commited").click(function(){
        var save =$('#commented').val();
        $.post("edit.php",{id:cid, text:save},
        function(data, status){
          $("#contact").html(data);
          /*
          $.post("comlist.php",{},
          function(data, status){
            $("#contact").html(data);
            $(".comcan").hide();
          });*/
          window.open("topik.php","_self");
          });
        });
      }
      function del(clicked_id){
        if (confirm("Biztos törlöd a "+clicked_id+" számú hozzászolásodat?")) {
          $.post("delete.php",{id:clicked_id},
          function(data, status){
            $("#contact").html(data);
            window.open("topik.php","_self");
            });
        }
      }
  </script>
</head>
<body>
<div class="container" style="background: white; margin-bottom: 0;">
  <nav class="navbar navbar-default fixed-top" style="background: white; margin-bottom: 0;">
    <div class="container" style="background: white; margin-bottom: 0;">
    <div class="navbar-header" id="head">
      <h1>Fórum</h1>
    </div>
    <div>
      <ul class="nav navbar-default">
        <li><a type="button" class="btn btn-light" href="index.php">Főoldal</a></li>
        <li><a type="button" class="btn btn-dark" href="forum.php">Fórum</a></li>
        <?php
        include("header.php");
        ?>
      </ul>
      </div>
    </div>
  </nav>
</div>
<div class="content" style="margin-bottom: 0;">
  <div class="jumbotron text-center" style="display: table; width: 100%; background: white; margin-bottom: 0; border-radius: 0px;">
    <h1><?php echo $title;?></h1>
    <h2><?php echo "Létrehozta ".$author;?></h2>
    <?php
      if(isset($_SESSION["mes"]) && $_SESSION["mes"]=="del")
      {
        echo '<div class="alert alert-success">Sikeresen törölted a kommentet!</div>';
        unset($_SESSION["mes"]);
      }
      if(isset($_SESSION["mes"]) && $_SESSION["mes"]=="edit")
      {
        echo '<div class="alert alert-success">Sikeresen modosítottad kommentet!</div>';
        unset($_SESSION["mes"]);
      }
      if(isset($_SESSION["mes"]) && $_SESSION["mes"]=="error")
      {
        echo '<div class="error">Rossz formátumu a komment!</div>';
        unset($_SESSION["mes"]);
      }
    ?>
  </div>
  <!-- welcome mezö-->
  <?php
    if(!isset($_SESSION["username"])) //logout
    {
      include("welcome2.php");
    }
    else {
      include("createcom.inc.php");
    }
  ?>
  <div id="contact"></div>
</div>
</body>
</html>
