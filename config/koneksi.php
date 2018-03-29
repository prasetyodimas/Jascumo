<?php 
	//set connection variables
	$host	  = "localhost";
	$username = "root";
	$password = "";
	$db_name  = "db_jascumo"; 
	$site 	  = 'http://jascumo/';
	//connect to mysql server
	$db_con = new mysqli($host, $username, $password, $db_name);
	//check if any connection error was encountered
	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database error !!";
	exit;

}