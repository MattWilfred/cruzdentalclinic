<?php
//created by Bryan Joshua Bucu

include __DIR__ . ('/connect.php');  

//signup button is clicked perform the code below
if(isset($_POST['signup'])){
	$username = $_POST['uname']; //get username value
	$password = $_POST['psw']; //get password value
	$repeat = $_POST['psw-repeat']; //get repeat password value
		

	if($password != $repeat){ //if password not matched.
			echo "<script> alert('Password did not matched'); window.location='/sign.php'; </script>";	
	}else{ //if matched

	//add to database table users
	$sql = "INSERT INTO users (usertype, username, password) VALUES ('regular', '$username', '$password')";
	$result = mysqli_query($connection, $sql); 
	
	if($result){
		//redirect user to login page
		header("location: /login.php");
		exit();
	} else{
		echo "<script> alert('Something Went Wrong'); window.location='sign.php'; </script>";
		}
	}
}

?>