<?php
    $host = "localhost";
    $user = "root"; //root si localhost
    $pass = "mysql93"; //vide en local
    $bdd = "pak"; //nom de la Bdd
//echo "test mysql";
$connexion=mysql_connect($host,$user,$pass,$bdd) OR die('<p>Connexion impossible à la base de données</p>');
 

 
if (isset($_GET['id']))
{
echo "id ok";
$id=$_GET['id'];
mysql_select_db($bdd);
$query = "UPDATE gyro SET id ='$id' "; 
$result = mysql_query($query);
} 
 
if (isset($_GET['lat']))
{
echo "<br />";
echo "lat ok";
$lat=$_GET['lat'];
mysql_select_db($bdd);
$query2 = "UPDATE gyro SET lat ='$lat'"; 
$result2 = mysql_query($query2);
} 
 
if (isset($_GET['longi']))
{
echo "<br />";
echo "longi ok";
$longi=$_GET['longi'];
mysql_select_db($bdd);
$query3 = "UPDATE gyro SET longi ='$longi' "; 
$result3 = mysql_query($query3);
} 
 
if (isset($_GET['trotti']))
{
echo "<br />";
echo "trotti ok";
$trotti=$_GET['trotti'];
mysql_select_db($bdd);
$query4 = "UPDATE gyro SET trotti ='$trotti' "; 
$result4 = mysql_query($query4);
} 
 
else //sinon ...
{
echo "fail";
}
$Fichier_Sauvegarde = fopen("donnees.txt","w");
	
	foreach($_GET as $cle=>$valeur){
		fputs($Fichier_Sauvegarde,$valeur."\n");
	}
	fclose($Fichier_Sauvegarde);
	// header("Location: index.php");	
?>
