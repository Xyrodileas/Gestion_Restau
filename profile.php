<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");

$utilisateur = info_utilisateur($_GET['id']);

echo'<br><br>
<div class="container-fluid well span6">
    <div class="row-fluid">
        <div class="span2" >
            <img src="https://avatars0.githubusercontent.com/u/2392017?s=460" class="img-circle">
        </div>
        
        <div class="span8">
            <h3>'.$utilisateur['nom'].' '.$utilisateur['prenom'].'</h3>
            <h6>Email: '.$utilisateur['email'].'</h6>
            <h6>Date de naissance: xxx</h6>
            
        </div>
        
        <div class="span2">
            <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modifier</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Supprimer</a></li>
                </ul>
            </div>
        </div>
</div>
</div>';

include "footer.html";
?>

