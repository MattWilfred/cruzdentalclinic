<?php

	//connect to database
	$host = "localhost";
	$user = "root";
	//remove password ""
	$password = "";
	$database = 'cruzdentalclinic';
	
	$connection = mysqli_connect($host, $user, $password, $database);
	
	if(mysqli_connect_error()){
		echo 'something went wrong'; 
	}
?>