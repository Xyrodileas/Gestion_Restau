<?php

include "header2.html";
require_once ("Fonction_BDD.php");


echo '<form class="form-horizontal" action="valider.php?op=add" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Formulaire d\'inscription</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Nom">Nom</label>
  <div class="controls">
    <input id="nom" name="nom" placeholder="Nom" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="prenom">Prénom</label>
  <div class="controls">
    <input id="prenom" name="prenom" placeholder="Prénom" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Mot de passe</label>
  <div class="controls">
    <input id="password" name="password" placeholder="" class="input-xlarge" type="password">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email</label>
  <div class="controls">
    <input id="email" name="email" placeholder="xxx@xxx.xxx" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="adresse">Adresse</label>
  <div class="controls">
    <input id="adresse" name="adresse" placeholder="Votre adresse" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="datenaissance">Date de naissance</label>
  <div class="controls">
    <input id="datenaissance" name="datenaissance" placeholder="jj/mm/aaaa" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="valider"></label>
  <div class="controls">
    <button id="valider" name="valider" class="btn btn-primary">Inscription</button>
  </div>
</div>

</fieldset>
</form>';


include "footer.html";
?>


