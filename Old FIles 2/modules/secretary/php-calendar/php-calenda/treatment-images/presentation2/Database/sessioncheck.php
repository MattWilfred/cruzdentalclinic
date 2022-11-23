<?php
	//created by Bryan Joshua Bucu

	session_start();
	
	//if session did not start yet
	if($_SESSION['loggedIn'] == 'false' || empty($_SESSION['loggedIn'])){
    //default value for session
    	$_SESSION['loggedIn'] = 'false';

    //redirect to login page
   header("location: /login.php");
}	
	  
?>
