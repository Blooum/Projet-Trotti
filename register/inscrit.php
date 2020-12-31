<?php 

	/*CE PROGRAMME SERT A STOCKER LES DONNEES DES INSCRITS*/

	/* récupération des données du formulaire */
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mdp = $_POST['mdp'];
	$mail = $_POST['mail'];
	$annee = $_POST['annee'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$code = $_POST['code'];
	$num = $_POST['num'];

	
	include ('identifiants.php');
	
	/* connexion à la bdd */
	$link = mysqli_connect($host,$user,$pass,$bdd);
	if (!$link)
		die('Echec de connexion au serveur de base de données : ' . mysqli_connect_error() . '(' . mysqli_connect_errno() . ') ');
	/*echo '<br><br><br><br><br>Vous vous êtes bien inscrit. <br\>';*/
	header("Location: inscriptionr.html"); 
	
	/* envoi d'une requête pour un encodage en UTF-8 */
	$query= "SET NAMES UTF8";
	mysqli_query($link,$query);
	/* envoi d'une requête pour mettre à jour la bdd */
	$query = "INSERT INTO test(nom, prenom, mdp,annee, adresse, ville, code, num, mail) VALUES ('$nom','$prenom','$mdp','$annee','$adresse','$ville','$code','$num','$mail')";
	mysqli_query($link,$query);
	
	/* déconnexion de la bdd */
	mysqli_close($link);
?>