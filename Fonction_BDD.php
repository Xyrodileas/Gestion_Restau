<?php

//Fonction permettant de récupérer la liste des restaurants
function liste_restaurants(){

	$link = mysqli_connect("localhost","root", "", "restau");
	$sql = mysqli_query($link, "SELECT restaurant.idrestaurant, restaurant.nom restau, utilisateur.nom nom, utilisateur.prenom prenom, restaurant.adresse 
									FROM `restaurant` 
										INNER JOIN `utilisateur` ON `restaurant`.`idproprietaire` = `utilisateur`.`id` 
											ORDER BY idrestaurant");
  	while ($restaurant = mysqli_fetch_array($sql)) {
	  	echo '<tr>';
	    echo "<td>" .$restaurant["idrestaurant"]. "</td>";
	    echo "<td>" .$restaurant["restau"]. "</td>";
	    echo "<td>" .$restaurant["nom"]. " " .$restaurant["prenom"]. "</td>";
	    echo "<td>" .$restaurant["adresse"]."</td>";
	    echo '</tr>';
	}
}

function select_restaurants(){

	$link = mysqli_connect("localhost","root", "", "restau");
	$sql = mysqli_query($link, "SELECT restaurant.idrestaurant, restaurant.nom
									FROM `restaurant` 
										ORDER BY idrestaurant");
  	while ($restaurant = mysqli_fetch_array($sql)) {
  		
  		echo '<option value="'.$restaurant["idrestaurant"].'">'.$restaurant["nom"].'</option>';
	}
}


//Fonction permettant de gérer un restaurant

function gestion_restaurant(){

	if($_GET['op'] == "addrestau")
	{
		$link = mysqli_connect("localhost","root", "", "restau");

		if(isset($_POST['nom_restaurant']) and isset($_POST['description']) and isset($_POST['specialite']) and isset($_POST['restaurateur'])){
			
			$query = "insert into RESTAURANT (nom, description, specialite, idproprietaire, idrestaurateur, adresse) values ('".$_POST['nom_restaurant']."', '".$_POST['description']."', '".$_POST['specialite']."', '".$_SESSION['id']."', '".$_POST['restaurateur']."', '".$_POST['adresse']."');";
		}
		else
			print("Champs non rempli! <br/><br/>");
		

		if(!($sql = mysqli_query($link, $query))){
			print("Erreur de connexion avec la base de donnée<br/>");
        }
		else{
			print("Restaurant ajouté avec succès ! <br/><br/>");
			exit;
		}
	}
	else if($_GET['op'] == "editrestau")
	{

		$link = mysqli_connect("localhost","root", "", "restau");
		$query = "update RESTAURANT set adresse='".$_POST['adresse']."', description='".$_POST['descriptionmodif']."', 
						specialite='".$_POST['specialite']."', idrestaurateur='".$_POST['restaurateur']."' where idrestaurant=".$_POST['restaurant'].";";

		

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("Restaurant modifié avec succès ! <br/><br/>");
	}
	else if($_GET['op'] == "deleterestau")
	{

		$link = mysqli_connect("localhost","root", "", "restau");
		$query = "DELETE FROM RESTAURANT
					WHERE idrestaurant=".$_POST['restaurant'].";";

		

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("Restaurant supprimé avec succès ! <br/><br/>");
	}
	mysqli_close($link);

}

//Selectionner les utilisateurs
function select_utilisateurs(){

	$link = mysqli_connect("localhost","root", "", "restau");
	$sql = mysqli_query($link, "SELECT id, nom, prenom
									FROM `utilisateur` 
										ORDER BY id");
  	while ($utilisateur = mysqli_fetch_array($sql)) {
  		
  		echo '<option value="'.$utilisateur["id"].'" id="'.$utilisateur["id"].'">'.$utilisateur["nom"].' '.$utilisateur["prenom"].'</option>
  		';
	}
}
//Selectionner les utilisateurs
function select_utilisateurs_edition(){

	$link = mysqli_connect("localhost","root", "", "restau");
	$sql = mysqli_query($link, "SELECT id, nom, prenom
									FROM `utilisateur` 
										ORDER BY id");
  	while ($utilisateur = mysqli_fetch_array($sql)) {
  		
  		echo '<option value="'.$utilisateur["id"].'" id="utilisateur'.$utilisateur["id"].'">'.$utilisateur["nom"].' '.$utilisateur["prenom"].'</option>
  		';
	}
}

//Fonction d'inscription

function utilisateur_sauvegarder()
{



	

	if($_GET['op'] == "add")
	{
		$link = mysqli_connect("localhost","root", "", "restau");

		if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['password']) and isset($_POST['email'])){
			$array_date_naissance=explode("/",$_POST['datenaissance']);
			$dateNaissance_mysql=$array_date_naissance[2]."-".$array_date_naissance[1]."-".$array_date_naissance[0];
			$pas = hash('sha256', mysqli_real_escape_string($link, $_POST['password'])); 
			$query = "insert into UTILISATEUR (nom, prenom, mdp, email, adresse, datenaissance, telephone) values ('".$_POST['nom']."', '".$_POST['prenom']."', '".$pas."', '".$_POST['email']."', '".$_POST['adresse']."', '".$dateNaissance_mysql."', '".$_POST['telephone']."');";
		}
		else
			print("Champs non rempli! <br/><br/>");
		

		if(!($sql = mysqli_query($link, $query))){
			print("Erreur de connexion avec la base de donnée<br/>");
            mysqli_close($link);
            
        }
		else{
			print("utilisateur ajouté avec succès ! <br/><br/>");
			utilisateur_login($_POST['email'], $_POST['password']);
			mysqli_close($link);
			exit;
		}

	}
	else if($_GET['op'] == "edit")
	{
		$link = mysqli_connect("localhost","root", "", "restau");
		$array_date_naissance=explode("/",$_POST['datenaissance']);
		$dateNaissance_mysql=$array_date_naissance[2]."-".$array_date_naissance[1]."-".$array_date_naissance[0];
		$link = mysqli_connect("localhost","root", "", "restau");
		$query = "update utilisateur set nom='".$_POST['nom']."', adresse='".$_POST['adresse']."', email='".$_POST['email']."', 
						datenaissance='".$dateNaissance_mysql."', telephone='".$_POST['telephone']."' where id=".$_POST['id'].";";

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("utilisateur modifié avec succès ! <br/><br/>");
		mysqli_close($link);
	}
	
	//orga_page();
}


//Fonction de login

function utilisateur_loginverif(){
	if($_GET['op'] == "login")
	{
		if(isset($_POST['email']) and isset($_POST['password'])){
			utilisateur_login($_POST['email'], $_POST['password']);
		}
		else
			print("Champs non rempli! <br/><br/>");
	}
}

//fonction login
function utilisateur_login($usr, $pas){
	$link = mysqli_connect("localhost","root", "", "restau");



		
			$usr = mysqli_real_escape_string($link, $usr);
    		$pas = hash('sha256', mysqli_real_escape_string($link, $pas)); // On hash le mot de passe en sha256

			$sql = mysqli_query($link, "SELECT * FROM utilisateur 
        							WHERE email='$usr' AND mdp='$pas'
        								LIMIT 1"); 
			if (mysqli_connect_errno()) {
			    printf("Échec de la connexion : %s\n", mysqli_connect_error());
			    exit();
			}

			//$query = "select * from UTILISATEUR where email='".$_POST['email']."' AND password='".$_POST['password']."';";
			//if(mysqli_num_rows($sql) == 1){
		        $row = mysqli_fetch_array($sql);
		        $_SESSION['prenom'] = $row['prenom'];
		        $_SESSION['nom'] = $row['nom'];
		        $_SESSION['logged'] = TRUE;
		        $_SESSION['id'] = $row['id'];
		       
		        print("Connexion réussis ! <br/><br/>");
		       
		        exit;
		    //}
		    
}

function info_utilisateur($id){

	$link = mysqli_connect("localhost","root", "", "restau");


			$sql = mysqli_query($link, "SELECT * FROM utilisateur 
        							WHERE id='$id'
        								LIMIT 1"); 
			if (mysqli_connect_errno()) {
			    printf("Échec de la connexion : %s\n", mysqli_connect_error());
			    exit();
			}


		    $row = mysqli_fetch_array($sql);
		    return $row;

}

//fonction deconnexion
function utilisateur_deconexion(){

	if(isset($_GET['deco']) and $_GET['deco'] == "1"){
		if(isset($_SESSION['logged'])){

  			unset($_SESSION['logged']);
  			unset($_SESSION['nom']);
  			unset($_SESSION['prenom']);
  			unset($_SESSION['id']);
  		}
  	}
}

//fin fonctions utilisateur


?>