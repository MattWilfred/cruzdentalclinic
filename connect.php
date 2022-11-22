<?php
//created by Bryan Joshua Bucu
	//connect to database
	$host = "127.0.0.1:80";
	$user = "root";
	$password = "cruzdentalclinic";
	$database = 'cruzdentalclinic';
	
	$connection = mysqli_connect($host, $user, $password, $database);
	
	if(mysqli_connect_error()){
		echo 'something went wrong'; 
	}
?>
