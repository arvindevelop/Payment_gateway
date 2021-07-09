<?php
	//development connection
	//$servername = "localhost";
	//$username = "root";
	//$password = "";
	//$dbname = "my_bank";

	//remote database connection
	$servername = "remotemysql.com";
	$username = "mP0ewlSNqi";
	$password = "QgNLaNnC6A";
	$dbname = "mP0ewlSNqi";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>