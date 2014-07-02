<?php
session_start();
include "header2.html";
require_once ("Fonction_BDD.php");


                    //Fonction permettant de lister tous les menus
    if(isset($_GET['id_restaurant'])){
		menu_restaurant($_GET['id_restaurant']);

	}


include "footer.html";

?>
