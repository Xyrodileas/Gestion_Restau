<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");

// Contient l'ID
$row = info_utilisateur($_SESSION['id']);
if($row['rang'] == 3){

echo '<form class="form-horizontal" action="valider.php?opp=addrestau" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Formulaire de création d\'un restaurant</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="nom_restaurant">Nom du restaurant</label>
  <div class="controls">
    <input id="nom_restaurant" name="nom_restaurant" placeholder="Nom" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="description">Description</label>
  <div class="controls">                     
    <textarea id="description" name="description">Un message pour décrire votre restaurant</textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="type">Spécialité</label>
  <div class="controls">
    <input id="specialite" name="specialite" placeholder="Spécialité" class="input-xlarge" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="restaurateur">Restaurateur</label>
  <div class="controls">
    <select id="restaurateur" name="restaurateur" class="input-xlarge">';
      select_utilisateurs();

    echo '</select>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="valider"></label>
  <div class="controls">
    <button id="valider" name="valider" class="btn btn-primary">Valider</button>
  </div>
</div>

</fieldset>
</form>
';

echo '<br /> <br />';

echo '<form name="modification_restaurant" class="form-horizontal" action="valider.php?opp=editrestau" method="post">
<fieldset>

<!-- Form Name -->
<legend>Formulaire de modification d\'un restaurant</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="restaurant">Restaurant</label>
  <div class="controls">
    <select id="restaurant" class="restau" name="restaurant" class="input-xlarge">
    <option></option>';

select_restaurants();

    echo '</select>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" >Text Area</label>
  <div class="controls">                     
    <textarea id="descriptionmodif" name="descriptionmodif">default text</textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="type">Spécialité</label>
  <div class="controls">
    <input id="specialite" name="specialite" placeholder="Spécialité" class="input-xlarge" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="restaurateur">Restaurateur</label>
  <div class="controls">
    <select id="restaurateur" name="restaurateur" class="input-xlarge">';
      select_utilisateurs();
      echo '
      </select>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="Modifier"></label>
  <div class="controls">
    <button id="Modifier" name="Modifier" class="btn btn-primary">Valider</button>
  </div>
</div>

</fieldset>
</form>

';


}


include "footer.html";

?>

