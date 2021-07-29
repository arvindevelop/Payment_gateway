<?php
	//development connection
	//$servername = "localhost";
	//$username = "root";
	//$password = "";
	//$dbname = "my_bank";

	//remote database connection
	$servername = "remotemysql.com";
	$username = "BhT5N1a6P5";
	$password = "I7oXtbShsG";
	$dbname = "BhT5N1a6P5";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>
