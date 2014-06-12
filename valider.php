<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");
utilisateur_loginverif();
utilisateur_sauvegarder();
gestion_restaurant();


include "footer.html";
?>

