    <nav>
		<input type='button' name='Reload' value='Carte générale' onclick=window.location='index.php' >
		
		<?php
			//Génération des boutons d'un nombre fixe
			/*	for ($i=1; $i<5; $i++) { 
				echo "<input type='button' name='Reload' value='Zoom sur Gyro $i' onclick=window.location='zoom.php?gyro=$i' >";
			}*/
		

			//Génération d'autant de boutons qu'il y a de gyro dans la base de données
			//Réglage des paramètres de connexion à la base de données
			include("connect.php");
			
			//Connexion au serveur de base de données
			$connexion = mysqli_connect($serveur, $login, $mdp);
			
			//Sélection de la base de données
			mysqli_set_charset($connexion,'utf8');
			mysqli_select_db($connexion, $bd);
			
			//Requête avec résultat retour dans $resultat
			$req = "select id from gyro";
			$resultat = mysqli_query($connexion, $req);
			
			//traitement des éléments du résultat 1 par 1
			while($element=mysqli_fetch_array($resultat)) {
				echo "<input type='button' name='Reload' value='Zoom sur Trotti $element[0]' onclick=window.location='index.php?gyro=$element[0]' >";
			}
		?>
     </nav>