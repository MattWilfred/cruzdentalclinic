<?php
//created by Bryan Joshua Bucu
	//connect to database
	$host = "localhost:8889";
	$user = "root";
	$password = "root";
	$database = "cruzdentalclinic";
	
	$connection = mysqli_connect($host, $user, $password, $database);
	
	if(mysqli_connect_error()){
		echo 'something went wrong'; 
	}
?>
