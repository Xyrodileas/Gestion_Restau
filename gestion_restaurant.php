<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");

utilisateur_deconexion();
echo'

<div class="container">
    <h3>Listes des restaurants</h3>

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Restaurants</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Propriétaire" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Adresse" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>';
                    //Fonction permettant de lister tous les restaurants
                    liste_restaurants();


                echo'</tbody>
            </table>
        </div>
    </div>
</div>';

include "footer.html";
?>

