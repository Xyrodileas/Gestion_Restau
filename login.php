<?php
session_start();
include "header2.html";
//require_once ("projet_BDD.php");


echo '<p id="test">Voici la page d\'accueil du projet de gestion de restaurant </p>';

echo '<form class="form-horizontal" action="valider.php?op=login" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Adresse mail</label>
  <div class="controls">
    <input id="email" name="email" placeholder="xxx@xxx.xxx" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Password </label>
  <div class="controls">
    <input id="password" name="password" placeholder="password" class="input-xlarge" required="" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="valider"></label>
  <div class="controls">
    <button id="valider" name="valider" class="btn btn-primary">login</button>
  </div>
</div>

</fieldset>
</form>
';
include "footer.html";
?>

