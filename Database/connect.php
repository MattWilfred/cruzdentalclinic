<?php
//created by Bryan Joshua Bucu
	//connect to database
	$host = "localhost:3306";
	$user = "root";
	$password = "";
	$database = "cruzdentalclinic";
	
	$connection = mysqli_connect($host, $user, $password, $database);
	
	if(mysqli_connect_error()){
		echo 'something went wrong'; 
	}
?>
