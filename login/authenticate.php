<?php
session_start();
// Change this to your connection info.
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'mysql93';
$DB_NAME = 'pak';
// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['nom'], $_POST['mdp']) ) {
	// Could not get the data that should have been sent.
	die ('nom and/or mdp does not exist!');
}
// Prepare our SQL 
if ($stmt = $con->prepare('SELECT id, mdp FROM test WHERE nom = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the mdp using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['nom']);
	$stmt->execute(); 
	$stmt->store_result(); 
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $mdp);
		$stmt->fetch();      
		// Account exists, now we verify the mdp.
		
		if ($_POST['mdp'] == $mdp) {
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['nom'] = $_POST['nom'];
			
				header('Location: index.php');
		} else {
			echo 'Incorrect nom and/or mdp!';
		}
	} else {
		echo 'Incorrect nom and/or mdp!';
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
?>