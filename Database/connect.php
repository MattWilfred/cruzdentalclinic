<?php
//created by Bryan Joshua Bucu
	//connect to database
	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "cruzdentalclinic";
	
	$connection = mysqli_connect($host, $user, $password, $database);
	
	if(mysqli_connect_error()){
		echo 'something went wrong'; 
	}
?>
