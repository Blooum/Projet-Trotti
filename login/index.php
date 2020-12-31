<html>
	<head>
		<meta charset="utf-8">
		<title>Espace membre</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
			</div>
		</nav>
		
	</body>
<body>
<h1> Votre Reservation</h1>	
		<?
mysql_connect("localhost","root","mysql93") or die("Impossible de se connecter");;
mysql_select_db("pak") or die("pas possible de trouver la base");

$result = mysql_query("SELECT * FROM test");
$nblignes = mysql_numrows($result);
    
echo "<table><tr><td>Nom</td><td>Trottinette</td></tr>\n";
for ($i=0;$i<$nblignes;$i=$i+1) {
	 $vehicule =  mysql_result($result,$i,"vehicule");
	 $nom= mysql_result($result,$i,"nom");
	 echo "<tr><td>$nom</td><td>$vehicule</td></tr>";
}
echo "</table>";
mysql_close();
?>


</html>
</body>
