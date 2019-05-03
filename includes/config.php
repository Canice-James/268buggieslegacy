<!-- configuration script -->
<?php

	/* Define Constants for credentials*/
	define('DB_SERVER', 'localhost');
	define('DB_NAME', '268buggies_dummy');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	$error = 'Some or all of your credentials are incorrect.';
	/* Attempt to connect to MySQL database */
	//error_reporting(0);
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 
	// Check connection
	if($conn->connect_error){
		die("ERROR: Could not connect. " . $conn->connect_error);
		
	}

?>