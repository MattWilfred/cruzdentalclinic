<?php
//created by Bryan Joshua Bucu
	//connect to database
	$host = "0.0.0.0:3306";
	$user = "cruzdentalclinic";
	$password = "";
	$database = 'cruzdentalclinic';
	
	$connection = mysqli_connect($host, $user, $password, $database);
	
	if(mysqli_connect_error()){
		echo 'something went wrong'; 
	}
?>
