<!-- Bejelentkezés form-->
<div class="global-container" id="lg">
<div class="card login-form">
<div class="card-body">
<h1>Bejelentkezés</h1>
<div id="lp"></div>
<div class="form-group">
  <label for="username">Felhasználónév</label>
  <input type="text" placeholder="felhasználónév" class="form-control form-control-sm" id="username">
</div>
<div class="form-group">
  <label for="password">Jelszó</label>
  <!--<a href="" style="float: right; font-size: 12px;">Elfelejtetted a jelszódat?</a>-->
  <input type="password" placeholder="jelszó" class="form-control form-control-sm" id="password">
</div>
<button type="button" class="btn btn-success btn-block" id="log">Bejelentkezés</button>
<div class="form-group">
  <p>Nincs még fiókod?</p>
<button type="button" class="btn btn-dark btn-block" id="signupl">Regisztrálj!</button>
</div>
</div>
</div>
</div>
<!-- Regisztrációs form-->
<div class="jumbotron" style=" width: 100%; background: white;">
<div class="global-container" id="re">
<div class="card login-form">
<div class="card-body">
<h1>Regisztráció</h1>
<div id="rp"></div>
<form class="needs-validation" novalidate>
<div class="form-group">
  <label for="emailr">E-mail cím</label>
  <input type="email" placeholder="e-mail cím" class="form-control form-control-sm" id="emailr" required>

</div>
<div class="form-group">
  <label for="usernamer">Felhasználónév</label>
  <input type="text" placeholder="felhasználónév" class="form-control form-control-sm" id="usernamer" required>
  <small>Legalább 3 karakter hosszú legyen és maximum 11!</small>
</div>
<div class="form-group">
  <label for="password">Jelszó</label>
  <input type="password" placeholder="jelszó" class="form-control form-control-sm" id="passwordr" required>
  <small>Legalább 8 karakter hosszú legyen!</small>
</div>
<div class="form-group">
  <label for="password">Jelszó újra</label>
  <input type="password" placeholder="jelszó" class="form-control form-control-sm" id="passwordrr" required>
</div>
<button type="button" class="btn btn-success btn-block" id="reg">Regisztráció</button>
<div class="form-group">
  <p>Van már fiókod?</p>
<button type="button" class="btn btn-dark btn-block" id="signinr">Jelentkezz be!</button>
</div>
</form>
</div>
</div>
</div>
</div>
