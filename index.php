<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");

utilisateur_deconexion();
echo '<p id="test">Voici la page d\'accueil du projet de gestion de restaurant </p>';


include "footer.html";
?>

