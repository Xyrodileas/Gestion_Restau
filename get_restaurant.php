<?php 
$link = mysqli_connect("localhost","root", "", "restau");
	$sql = mysqli_query($link, "SELECT restaurant.idrestaurant, restaurant.nom
									FROM `restaurant` 
										ORDER BY idrestaurant
											WHERE idrestaurant=".$_POST['idrestau']);
  	$restaurant = mysqli_fetch_array($sql));
  
	echo json_encode($restaurant);
?>