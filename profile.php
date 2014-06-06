<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");

$utilisateur = info_utilisateur($_GET['id']);

$array_date_naissance=explode("-",$utilisateur['datenaissance']);
$dateNaissance=$array_date_naissance[2]."-".$array_date_naissance[1]."-".$array_date_naissance[0];
if(isset($_GET['edit'])){
    echo'<br><br>
<div class="container-fluid well span6">
    <div class="row-fluid">
        <div class="span2" >
            <img src="https://avatars0.githubusercontent.com/u/2392017?s=460" class="img-circle">
        </div>
        
        <div class="span8">
            <form class="form-horizontal" action="valider.php?op=edit" method="POST">
                <fieldset>

                <!-- Form Name -->
                <legend>Formulaire de modification</legend>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="Nom">Nom</label>
                  <div class="controls">
                    <input id="nom" name="nom" value="'.$utilisateur['nom'].'" class="input-xlarge" required="" type="text">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="prenom">Prénom</label>
                  <div class="controls">
                    <input id="prenom" name="prenom" value="'.$utilisateur['prenom'].'" class="input-xlarge" required="" type="text">
                    
                  </div>
                </div>


                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="email">Email</label>
                  <div class="controls">
                    <input id="email" name="email" value="'.$utilisateur['email'].'" class="input-xlarge" required="" type="text">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="adresse">Adresse</label>
                  <div class="controls">
                    <input id="adresse" name="adresse" value="'.$utilisateur['adresse'].'" class="input-xlarge" required="" type="text">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="datenaissance">Date de naissance</label>
                  <div class="controls">
                    <input id="datenaissance" name="datenaissance" value="'.$dateNaissance.'" class="input-xlarge" required="" type="text">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="telephone">telephone</label>
                  <div class="controls">
                    <input id="telephone" name="telephone" value="'.$utilisateur['telephone'].'" class="input-xlarge" required="" type="text">
                    
                  </div>
                </div>
                <input id="id" name="id" type="HIDDEN" value="'.$_GET['id'].'"> 

                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="valider"></label>
                  <div class="controls">
                    <button id="valider" name="valider" class="btn btn-primary">Modifier</button>
                  </div>
                </div>

                </fieldset>
                </form>
            
        </div>
        
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php?edit=1&id='.$_GET['id'].'"><span class="icon-wrench"></span> Modifier</a></li>
                    <li><a href="profile.php?edit=1"><span class="icon-trash"></span> Supprimer</a></li>
                </ul>
            </div>
        </div>
</div>
</div>';

}
else{
echo'<br><br>
<div class="container-fluid well span6">
    <div class="row-fluid">
        <div class="span2" >
            <img src="https://avatars0.githubusercontent.com/u/2392017?s=460" class="img-circle">
        </div>
        
        <div class="span8">
            <h3>'.$utilisateur['nom'].' '.$utilisateur['prenom'].'</h3>
            <h6>Email: '.$utilisateur['email'].'</h6>
            <h6>Date de naissance: '.$dateNaissance.'</h6>
            <h6>Adresse: '.$utilisateur['adresse'].'</h6>
            <h6>Telephone: '.$utilisateur['telephone'].'</h6>
            
        </div>
        
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="profile.php?edit=1&id='.$_GET['id'].'"><span class="icon-wrench"></span> Modifier</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Supprimer</a></li>
                </ul>
            </div>
        </div>
</div>
</div>';
}

include "footer.html";
?>

