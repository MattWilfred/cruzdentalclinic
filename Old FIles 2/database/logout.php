<?php
//Created by Bryan Joshua Bucu
//button logout press
	session_start();
	$_SESSION['loggedIn'] = 'false'; //set loggedIn session to false.
	unset($_SESSION['access']); // clear usertype access
	unset($_SESSION['username']); //clear username
	header("location: /login/login-page.php"); //redirect user to login.php.
?>