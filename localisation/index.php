<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<meta name="description" content="Page affichant une googleMap centrée sur montreuil et affichant qq markers">
		<meta name="author" content="cassin ">
		<meta http-equiv="Content-Language" content="fr-fr">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>Localisation</title>
		<link rel="stylesheet" href="style.css">
		    <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKRtqBz_tZa-YGcrkzMp6JbR-K0EDykfI&callback=initMap">
</script>
		<script>

		function initialize() {
			
			//Création de l'objet centrant la carte avec analyse du $_GET
			<?php
			if (isset($_GET["gyro"])) { //Si un paramètre gyro a été passé, on récupère les coordonnées du gyro visé
				$gyro=$_GET["gyro"];
				include("connect.php");
				//Connexion au serveur de base de données
				$connexion = mysqli_connect($serveur, $login, $mdp);
				//Sélection de la base de données
				mysqli_set_charset($connexion,'utf8');
				mysqli_select_db($connexion, $bd);
				//Requête avec résultat retour dans $resultat
				$req = "select * from gyro where id='$gyro'";
				$resultat = mysqli_query($connexion, $req);
				$element=mysqli_fetch_array($resultat);
				
				echo "var myLatlng = new google.maps.LatLng($element[1],$element[2])";
			}
			else echo "var myLatlng = new google.maps.LatLng(48.858,2.4458)";
			?>
			
			//Réglage des options de la carte. Si zom sur un gyro $_GET actif
			var mapOptions = {
				zoom:<?php
					if (isset($_GET["gyro"])) echo "15";
					else echo "13";
					?>,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			
			//Création de la carte dans l'élément GoogleMap (récupéré via getElementById)
			var map = new google.maps.Map(document.getElementById("GoogleMap"), mapOptions);

			<?php
			include("connect.php");
			//Connexion au serveur de base de données
			$connexion = mysqli_connect($serveur, $login, $mdp);
			//Sélection de la base de données
			mysqli_set_charset($connexion,'utf8');
			mysqli_select_db($connexion, $bd);
			//Requête avec résultat retour dans $resultat
			$req = "select * from gyro";
			$resultat = mysqli_query($connexion, $req);
			
			//traitement des éléments du résultat 1 par 1
			while($element=mysqli_fetch_array($resultat)) {
				echo "var marker = new google.maps.Marker({";
				echo "position: new google.maps.LatLng($element[1],$element[2]),";
				echo "map: map,";
				echo "title: 'Gyro '+$element[0]";
				echo "});";
			}
			?>
		}
		</script>
	</head>
	
	<body onload="javascript:initialize()">
	
	<?php include("Entete.php"); ?>
	<?php include("Menu.php"); ?>
    

    <div id="GoogleMap"></div>
  </body>
</html>
