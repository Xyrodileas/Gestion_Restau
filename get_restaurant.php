<?php 
if(isset($_GET['idrestau'])){
	$link = mysqli_connect("localhost","root", "", "restau");
		$sql = mysqli_query($link, "SELECT restaurant.nom, restaurant.description, restaurant.specialite, utilisateur.id idrestaurateur, utilisateur.nom, utilisateur.prenom
										FROM `restaurant`, `utilisateur`
												WHERE idrestaurant=".$_GET['idrestau']." AND restaurant.idrestaurateur=utilisateur.id");

		/*echo "SELECT restaurant.idrestaurant, restaurant.nom , restaurant.description, utilisateur.nom, utilisateur.prenom
										FROM `restaurant`, `utilisateur`
												WHERE idrestaurant=".$_GET['idrestau']." AND restaurant.idrestaurateur=utilisateur.id";*/
	  	$restaurant = mysqli_fetch_array($sql);
	 	//echo $restaurant["description"];

		echo json_encode($restaurant);
}
?>