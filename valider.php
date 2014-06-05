<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");

utilisateur_loginverif();
utilisateur_sauvegarder();
echo '<p>Bienvenu '.$_SESSION['membre_pseudo'].'</p>';


include "footer.html";
?>

