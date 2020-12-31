<html>
<head>
<title>Update a Record in MySQL Database</title>
</head>
		<style>
		.login-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.login-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.login-form input[type="password"],
		.login-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.login-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
		ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
		.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

  cursor: pointer;
}



	</style>
<body>
<?php
if(isset($_POST['update']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'mysql93';
$db     = 'pak';
$conn = mysql_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn )
{
 die('Could not connect: ' . mysql_error());
}
mysql_select_db($db);
$numcarte = $_POST['numcarte'];
$nom= $_POST['nom'];
$validecarte= $_POST['validecarte'];
$crypt= $_POST['crypt'];


$sql =  "UPDATE test
SET numcarte = '$numcarte',
validecarte = '$validecarte',
crypt = '$crypt'
WHERE nom = '$nom'";

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
 die('Could not update data: ' . mysql_error());
}

echo "Reservation effectuee\n";
mysql_close($conn);
}
else
{
?>
<center> <a href="http://172.16.105.224/SITE%20TROTTI/index.php"class="button">HOME</a></center>
<?php include("modele2.php"); ?>
<br><br>
<div class="login-form">
<form method="post" action="<?php $_PHP_SELF ?>">
  <table width="400" border="0" cellspacing="1" cellpadding="2">
    <tr>
      <td width="100">Nom</td>
      <td><input name="nom" type="text" id="nom"placeholder="Nom"></td>
    </tr>
   
		 <tr>
      <td width="100">Numéro carte</td>
      <td><input name="numcarte" type="text" id="numcarte"placeholder="XXXX XXXX XXXX XXXX"></td>
    </tr>
	 <tr>
      <td width="100">Date de validité</td>
      <td><input name="validecarte" type="text" id="validecarte"placeholder="MM/AAAA"></td>
    </tr>
		 <tr>
      <td width="100">Cryptogramme</td>
      <td><input name="crypt" type="text" id="crypt"placeholder=""></td>
    </tr>

    <tr>
      <td width="100"></td>
      <td></td>
    </tr>
    <tr>
      <td width="100"></td>
      <td><input name="update" type="submit" id="update" value="Reserver"></td>
    </tr>
  </table>
  </div>
</form>
<?php
}
?>
</body>
</html>