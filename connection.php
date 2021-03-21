<?php

function Connect()
{
	$dbhost = "localhost:3308";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "users";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>