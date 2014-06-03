<?php



//Fonction d'inscription

function utilisateur_sauvegarder()
{



	$link = mysqli_connect("localhost","root", "", "restau");

	if($_GET['op'] == "add")
	{
		if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['password']) and isset($_POST['email']))
			$query = "insert into UTILISATEUR (nom, prenom, mdp, email) values ('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['password']."', '".$_POST['email']."');";
		else
			print("Champs non rempli! <br/><br/>");
		

		if(!mysqli_query($link, $query)){
			print("Erreur de connexion avec la base de donnée<br/>");
            
            
        }
		else{
			print("utilisateur ajouté avec succès ! <br/><br/>");
			$_SESSION['membre_pseudo'] = $_POST['prenom'];
		}
	}
	else if($_GET['op'] == "edit")
	{
		//$query = "update utilisateur set nom_utilisateur='".$_POST['nom']."', adresse_utilisateur='".$_POST['adresse']."', codePostal_utilisateur=".$_POST['cp'].", ville_utilisateur='".$_POST['ville']."', telephone_utilisateur=".$_POST['tel'].", mail_utilisateur='".$_POST['mail']."', siret_utilisateur='".$_POST['siret']."', web_utilisateur='".$_POST['web']."' where id_utilisateur=".$_GET['id'].";";

		//if(!mysqli_query($link, $query))
		//	print("Erreur de connexion avec la base de donnée<br/>");
		//else
		//	print("utilisateur modifié avec succès ! <br/><br/>");
	}
	mysqli_close($link);
	//orga_page();
}

//fin fonctions utilisateur















?>