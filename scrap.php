<?php


function page_principale()
{
	print("<a href=\"projet_main.php?table=organisateur\"> Mise à jour organisateurs </a><br/>");
	print("<a href=\"projet_main.php?table=adherent\"> Mise à jour adhérents </a>");
}

//début fonctions organisateur

function orga_page()
{
	$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");  
	$query = "select * from ORGANISATEUR";	
	$resultat = mysqli_query($link, $query);

	print("<table class=\"table_organisateur\">\n");
	print("<caption> Tableau récapitulatif des organisateurs </caption>\n");
	print("<thead>\n<tr> <th>Nom</th><th>adresse</th><th>code postal</th><th>ville</th><th>telephone</th><th>mail</th><th>siret</th><th>web</th> </tr></thead>\n");
	print("<tbody>");

	while($org = mysqli_fetch_row($resultat))
	{
		print("<tr><td>".$org[1]."</td><td>".$org[2]."</td><td>".$org[3]."</td><td>".$org[4]."</td><td>".$org[5]."</td><td>".$org[6]."</td><td>".$org[7]."</td><td><a href=\"".$org[8]."\">".$org[8]."</td>");
		   echo '<td> <div class="btn-group">
    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
    Action
    <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    	<li> <a href="projet_main.php?table=organisateur&op=edit&id='.$org[0].'">Modifier</a> </li>
    	
    	<li> <a href="projet_main.php?table=organisateur&op=del&id='.$org[0].'">Supprimer</a> </li>
    </ul>
    </div> </td> </tr>';


		
	}

	print("</tbody>\n</table>\n");
	print("<a href=projet_main.php?table=organisateur&op=add>Ajouter un nouvel organisateur</a>\n");
	mysqli_close($link);
}

function orga_delete()
{
	if(!isset($_POST['accepter']) and !isset($_POST['refuser'])){
		print("Etes vous sur de vouloir supprimer cet enregistrement?");
		print("<form method=\"post\" action=\"projet_main.php?table=organisateur&op=del&id=".$_GET['id']."\">\n");
		print("<input type=\"submit\" name=\"accepter\" value=\"oui\"/>\n");
		print("<input type=\"submit\" name=\"refuser\" value=\"non\"/>\n</form>");
	}
	else if(isset($_POST['refuser']))
		page_organisateur();
	else if(isset($_POST['accepter']))
	{
		$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");
		$query2 = "delete from ORGANISATEUR where id_organisateur=".$_GET['id'].";";

		mysqli_query($link, $query2);

		mysqli_close($link);
		print("Organisateur supprimé avec succès ! <br/><br/>");
		orga_page();
	}
}

function orga_form($nom = "", $adresse = "", $cp = "", $ville = "", $tel = "", $mail = "", $siret = "", $web = "", $id=0, $erreur="")
{
	if($id != 0)
	{
		$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");  
		$query = "select * from ORGANISATEUR where id_organisateur=".$id.";";
		$reponse = mysqli_query($link, $query);

		$org = mysqli_fetch_row($reponse);
		$nom = $org[1];
		$adresse = $org[2];
		$cp = $org[3];
		$ville = $org[4];
		$tel = $org[5];
		$mail = $org[6];
		$siret = $org[7];
		$web = $org[8];
		
		mysqli_close($link);
		print("<form method=\"post\" action=\"projet_main.php?table=organisateur&op=edit&id=".$id."\"><fieldset>\n");
	}
	else
		print("<form method=\"post\" action=\"projet_main.php?table=organisateur&op=add\">\n<fieldset>\n");
	print("<label>nom : </label><input type=\"text\" name=\"nom\" value=\"".$nom."\"/><br/>");
	print("<label>adresse : </label><input type=\"text\" name=\"adresse\" value=\"".$adresse."\"/><br/>");
	print("<label>code postal : </label><input type=\"text\" name=\"cp\" value=\"".$cp."\"/><br/>");
	print("<label>ville : </label><input type=\"text\" name=\"ville\" value=\"".$ville."\"/><br/>");
	print("<label>tel : </label><input type=\"text\" name=\"tel\" value=\"".$tel."\"/><br/>");
	print("<label>mail : </label><input type=\"text\" name=\"mail\" value=\"".$mail."\"/><br/>");
	print("<label>siret : </label><input type=\"text\" name=\"siret\" value=\"".$siret."\"/><br/>");
	print("<label>web : </label><input type=\"text\" name=\"web\" value=\"".$web."\"/><br/>");
	print("<input type=\"submit\" value=\"soumettre\" name=\"submit\">");
	print("</fieldset> </form>");
	print("<br/>");
	print($erreur);
}

function orga_verif_donnees(&$erreur = "")
{
	$nb_erreur=0;
	$erreur="";

//insérer ici la gestion des erreurs

	if ( $nb_erreur > 0) 
    {
    return false;
    }
else
    {
    return true;
    }
}

function orga_add()
{
	if(! isset($_POST['submit']))
		orga_form();
	else{
		if(! orga_verif_donnees($erreur))
		    orga_form($_POST['nom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail'], $_POST['siret'], $_POST['web'], 0, $erreur);
		else
		    orga_sauvegarder();
		}
}

function orga_edit()
{
	if(! isset($_POST['submit']))
		orga_form("", "", "", 0, "", "", "", "",  $_GET['id'],"");
	else{
		if(! orga_verif_donnees($erreur))
		    orga_form($_POST['nom'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail'], $_POST['siret'], $_POST['web'], $_GET['id'], $erreur);
    	else
        	orga_sauvegarder();
    }
}

function orga_sauvegarder()
{
	$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");

	if($_GET['op'] == "add")
	{
		$query = "insert into ORGANISATEUR (nom_organisateur, adresse_organisateur, codePostal_organisateur, ville_organisateur, telephone_organisateur, mail_organisateur, siret_organisateur, web_organisateur) values ('".$_POST['nom']."', '".$_POST['adresse']."', ".$_POST['cp'].", '".$_POST['ville']."', ".$_POST['tel'].", '".$_POST['mail']."', '".$_POST['siret']."', '".$_POST['web']."');";

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("Organisateur ajouté avec succès ! <br/><br/>");
	}
	else if($_GET['op'] == "edit")
	{
		$query = "update ORGANISATEUR set nom_organisateur='".$_POST['nom']."', adresse_organisateur='".$_POST['adresse']."', codePostal_organisateur=".$_POST['cp'].", ville_organisateur='".$_POST['ville']."', telephone_organisateur=".$_POST['tel'].", mail_organisateur='".$_POST['mail']."', siret_organisateur='".$_POST['siret']."', web_organisateur='".$_POST['web']."' where id_organisateur=".$_GET['id'].";";

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("Organisateur modifié avec succès ! <br/><br/>");
	}
	mysqli_close($link);
	orga_page();
}

//fin fonctions organisateur





















function adh_page()
{
	$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");  
	$query = "select * from ADHERENT";	
	$resultat = mysqli_query($link, $query);

	print("<table class=\"table_adherent\">\n");
	print("<caption> Tableau récapitulatif des adherents </caption>\n");
	print("<thead>\n<tr> <th>Nom</th><th>prenom</th><th>sexe</th><th>adresse</th><th>code postal</th><th>ville</th><th>telephone</th><th>mail</th><th>Pseudo OVS</th><th>remarque(s)</th><th>profession</th><th>date de naissance</th> </tr></thead>\n");
	print("<tbody>");

	while($org = mysqli_fetch_row($resultat))
	{
		print("<tr><td>".$org[1]."</td><td>".$org[2]."</td><td>".$org[3]."</td><td>".$org[4]."</td><td>".$org[5]."</td><td>".$org[6]."</td><td>".$org[7]."</td><td>".$org[8]."</td><td>".$org[9]."</td><td>".$org[10]."</td><td>".$org[11]."</td><td>".$org[12]."</td>\n");
		
		   echo '<td> <div class="btn-group">
    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
    Action
    <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    	<li> <a href="projet_main.php?table=organisateur&op=edit&id='.$org[0].'">Modifier</a> </li>

    	<li> <a href="projet_main.php?table=organisateur&op=del&id='.$org[0].'">Supprimer</a> </li>
    </ul>
    </div> </td> </tr>';


	}

	print("</tbody>\n</table>\n");
	print("<a href=projet_main.php?table=adherent&op=add>Ajouter un nouvel adhérent</a>\n");
	mysqli_close($link);
}

function adh_delete()
{
	if(!isset($_POST['accepter']) and !isset($_POST['refuser'])){
		print("Etes vous sur de vouloir supprimer cet enregistrement?");
		print("<form method=\"post\" action=\"projet_main.php?table=adherent&op=del&id=".$_GET['id']."\">\n");
		print("<input type=\"submit\" name=\"accepter\" value=\"oui\"/>\n");
		print("<input type=\"submit\" name=\"refuser\" value=\"non\"/>\n</form>");
	}
	else if(isset($_POST['refuser']))
		page_adherent();
	else if(isset($_POST['accepter']))
	{
		$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");
		$query2 = "delete from ADHERENT where id_adherent=".$_GET['id'].";";

		mysqli_query($link, $query2);

		mysqli_close($link);

		print("Adherent supprimé avec succès ! <br/><br/>");
		adh_page();
	}
}

function adh_form($nom = "", $prenom="", $sexe="", $adresse = "", $cp = "", $ville = "", $tel = "", $mail = "", $pseudo = "", $rq = "", $job = "", $daten = "",  $id=0, $erreur="")
{
	if($id != 0)
	{
		$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");  
		$query = "select * from ADHERENT where id_adherent=".$id.";";
		$reponse = mysqli_query($link, $query);

		$org = mysqli_fetch_row($reponse);
		$nom = $org[1];
		$prenom = $org[2];
		$sexe = $org[3];
		$adresse = $org[4];
		$cp = $org[5];
		$ville = $org[6];
		$tel = $org[7];
		$mail = $org[8];
		$pseudo = $org[9];
		$rq = $org[10];
		$job = $org[11];
		$daten = $org[12];
		
		mysqli_close($link);
		print("<form method=\"post\" action=\"projet_main.php?table=adherent&op=edit&id=".$id."\"><fieldset>\n");
	}
	else
		print("<form method=\"post\" action=\"projet_main.php?table=adherent&op=add\">\n<fieldset>\n");
	print("<label>nom : </label><input type=\"text\" name=\"nom\" value=\"".$nom."\"/><br/>");
	print("<label>prenom : </label><input type=\"text\" name=\"prenom\" value=\"".$prenom."\"/><br/>");
	print("<label>sexe : </label><input type=\"text\" name=\"sexe\" value=\"".$sexe."\"/><br/>");
	print("<label>adresse : </label><input type=\"text\" name=\"adresse\" value=\"".$adresse."\"/><br/>");
	print("<label>code postal : </label><input type=\"text\" name=\"cp\" value=\"".$cp."\"/><br/>");
	print("<label>ville : </label><input type=\"text\" name=\"ville\" value=\"".$ville."\"/><br/>");
	print("<label>tel : </label><input type=\"text\" name=\"tel\" value=\"".$tel."\"/><br/>");
	print("<label>mail : </label><input type=\"text\" name=\"mail\" value=\"".$mail."\"/><br/>");
	print("<label>pseudo OVS : </label><input type=\"text\" name=\"pseudo\" value=\"".$pseudo."\"/><br/>");
	print("<label>remarque(s) : </label><input type=\"text\" name=\"rq\" value=\"".$rq."\"/><br/>");
	print("<label>job : </label><input type=\"text\" name=\"job\" value=\"".$job."\"/><br/>");
	print("<label>date naissance : </label><input type=\"text\" name=\"daten\" value=\"".$daten."\"/><br/>");
	print("<input type=\"submit\" value=\"soumettre\" name=\"submit\">");
	print("</fieldset> </form>");
	print("<br/>");
	print($erreur);
}

function adh_verif_donnees(&$erreur = "")
{
	$nb_erreur=0;
	$erreur="";

//insérer ici la gestion des erreurs

	if ( $nb_erreur > 0) 
    {
    return false;
    }
else
    {
    return true;
    }
}

function adh_add()
{
	if(! isset($_POST['submit']))
		adh_form();
	else{
		if(! adh_verif_donnees($erreur))
		    adh_form($_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail'], $_POST['pseudo'], $_POST['rq'], $_POST['job'], $_POST['daten'], 0, $erreur);
		else
		    adh_sauvegarder();
		}
}

function adh_edit()
{
	if(! isset($_POST['submit']))
		adh_form("", "", "", "", "", "", "", "", "", "", "", "", $_GET['id'],"");
	else{
		if(! adh_verif_donnees($erreur))
		    adh_form($_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['tel'], $_POST['mail'], $_POST['pseudo'], $_POST['rq'], $_POST['job'], $_POST['daten'], $_GET['id'], $erreur);
    	else
        	adh_sauvegarder();
    }
}

function adh_sauvegarder()
{
	$link = mysqli_connect("localhost","root", "r3D0Uwj6G2u4576", "acsi");

	if($_GET['op'] == "add")
	{
		$query = "INSERT INTO ADHERENT(nom_adherent, prenom_adherent, sexe_adherent, adresse_adherent, codePostal_adherent, ville_adherent, telephone_adherent, mail_adherent, pseudoOVS_adherent, remarque_adherent, profession_adherent, dateNaissance) values ('".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['sexe']."', '".$_POST['adresse']."', ".$_POST['cp'].", '".$_POST['ville']."', ".$_POST['tel'].", '".$_POST['mail']."', '".$_POST['pseudo']."', '".$_POST['rq']."', '".$_POST['job']."', '".$_POST['daten']."');";

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("Adhérent ajouté avec succès ! <br/><br/>");
	}
	else if($_GET['op'] == "edit")
	{
		$query = "update ADHERENT set nom_adherent='".$_POST['nom']."', prenom_adherent='".$_POST['prenom']."', sexe_adherent='".$_POST['sexe']."', adresse_adherent='".$_POST['adresse']."', codePostal_adherent=".$_POST['cp'].", ville_adherent='".$_POST['ville']."', telephone_adherent=".$_POST['tel'].", mail_adherent='".$_POST['mail']."', pseudoOVS_adherent='".$_POST['pseudo']."', remarque_adherent='".$_POST['rq']."', profession_adherent='".$_POST['job']."', dateNaissance='".$_POST['daten']."' where id_adherent=".$_GET['id'].";";

		if(!mysqli_query($link, $query))
			print("Erreur de connexion avec la base de donnée<br/>");
		else
			print("Adherent modifié avec succès ! <br/><br/>");
	}
	mysqli_close($link);
	adh_page();
}
