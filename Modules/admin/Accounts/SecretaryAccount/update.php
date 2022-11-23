<?php

 //if burron update is clicked call updateprocess function
 include 'dbcon.php';

if(isset($_POST['create'])){

	if(isset($_POST['profpic']) || isset($_POST['id']) || isset($_POST['fname']) || isset($_POST['lname']) || isset($_POST['address']) || isset($_POST['bdate']) || isset($_POST['phone']) || isset($_POST['email']) ){
		$userid = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address =  $_POST['address'];
		$bday = $_POST['bdate'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		


		if (empty($picture)) {
			$sql = " UPDATE users SET fname='$fname', lname='$lname', paddress='$address', birthdate='$bday', phonenumber='$phone', email='$email'  WHERE id='$userid'";
			$result = mysqli_query($con, $sql);
		}
		else {
			$fileName = basename($_FILES["profpic"]["name"]); 
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
		
			$image = $_FILES['profpic']['tmp_name']; 
			$imgContent = addslashes(file_get_contents($image)); 
		
			$sql = " UPDATE users SET fname='$fname', lname='$lname', paddress='$address', birthdate='$bday', phonenumber='$phone', email='$email', profile_picture='$image'  WHERE id='$userid'";
			$result = mysqli_query($con, $sql);
		
		}
			
			//successful update then redirect user to admin.page
			if($result){
				echo "<script> alert('Data Has Been Updated'); window.location='index.php'  </script>";
			}
			//fail update then redirect user to admin page
			else{
					echo "<script> alert('Something Went Wrong'); </script>";
			}
		
			echo "<script>window.location='{$_REQUEST["url"]}'</script>";

	}


	

	

//place values to update




	
}



?>