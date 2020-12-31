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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
    function initialize(gyro) {

		function chargeTxt() {
			var request = new XMLHttpRequest();
        
			request.open('GET', 'toto.txt', false); // Synchro
			request.send(null);

			var listGyro = new String(request.responseText);
			return listGyro.split(' ');
        }

        var tableGyro = chargeTxt();
	    var latit = parseFloat(tableGyro[1+(3*gyro)]);
		var longit = parseFloat(tableGyro[2+(3*gyro)]);
        
        // Construction d'un objet + une variable contenant les param de la carte    
        var mapOptions = {                                  
          center: new google.maps.LatLng(latit,longit), // Centrage de la carte sur les coordonn�es fournies � LatLng()
          zoom: 20,                                         // R�glage du zoom
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Constructeur de la carte dans le conteneur sp�cifi� et avec les options contenues dans 
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        //Positionnement des marqueurs
        for (var i=0; i<4; i++) {
			var marker = new google.maps.Marker({
            position: new google.maps.LatLng(parseFloat(tableGyro[1+(3*i)]),parseFloat(tableGyro[2+(3*i)])),
            map: map,
            scrollWheel: true,
            title: "Gyropode "+i
			});
        }
    }
    </script>
  </head>

  <body onload="initialize(<?php echo $_GET['gyro'] ?>)">
	
	<?php include("Entete.php"); ?>
	<?php include("Menu.php"); ?>

    <div id="map-canvas"></div>
	
  </body>
</html>
