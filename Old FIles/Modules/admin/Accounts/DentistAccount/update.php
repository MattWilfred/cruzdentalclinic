<?php

 //if burron update is clicked call updateprocess function

if(isset($_POST['Update_DentistAccount'])){
	updateprocess();
}

function updateprocess(){
include __DIR__ . ('/connect.php');

/*
	get id,type,fname,lname,age, gender and purok values
*/

$dentist_id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address =  $_POST['paddress'];
$bday = $_POST['birthdate'];
$phone = $_POST['phonenumber'];
$email = $_POST['email'];
$profile_picture = $_POST['profile_picture'];

//place values to update
$sql = " UPDATE users SET fname='$fname', lname='$lname', paddress='$address', birthdate='$bday', phonenumber='$phone', email='$email',profile_picture='$profile_picture' WHERE id='$dentist_id'";
$result = mysqli_query($connection, $sql);
	
	//successful update then redirect user to admin.page
	if($result){
			echo "<script> alert('Data Has Been Updated'); window.location='index.php'  </script>";
	}
	//fail update then redirect user to admin page
	else{
			echo "<script> alert('Something Went Wrong'); </script>";
	}
}

?>