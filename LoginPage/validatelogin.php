<?php

$host = "cruzdentalclinic:3306";
$user = "root";
$password = "";
$database = 'cruzdentalclinic';
	
$connection = mysqli_connect($host, $user, $password, $database);
	
if(mysqli_connect_error()){
	echo 'something went wrong'; 
}
//created by Bryan Joshua Bucu

//include __DIR__ . ('/connect.php');  
//require ('/connect.php');
session_start();

/*
 check if user is already  already login
 if user is alreadly login redirect user to index page.
*/

/**if($_SESSION['loggedIn'] == 'true'){ 
     //echo  "<script> window.location='index.php'; </script>";
     echo  "<script> window.location='/index.html'; </script>";
}**/

//if user clicked login button then execute code below. 
if(isset($_POST['login'])){
    //get uname and password
    $username= $_POST['uname'];
    $password= $_POST['password'];

    if(empty($username) || empty($password)){ // user did not enter any credentials
               echo "<script> alert('Please fill up password and username'); window.location='/LoginPage/login-page.php'; </script>";
                exit();
    }
    else{ // check user input if match in database.
       $sql = "SELECT * FROM users WHERE username = '$username' AND userpassword = '$password'";  
                 $result = mysqli_query($connection, $sql);    
                 $count = mysqli_num_rows($result);  
                 $unvalidate= mysqli_fetch_array($result);
            

          
        if($count > 0){ //if found in database

            if($unvalidate['accrole'] == 'Administrator'){ //usertype is admin
                $_SESSION['loggedIn'] = 'true'; //set session value to true
                $_SESSION['username'] = $unvalidate['username']; //set session username on the row that was found
                $_SESSION['access'] = $unvalidate['accrole']; //set session access.
                $_SESSION['id'] = $unvalidate['id']; //set session access.

                header("location: /Modules/admin/index.php"); //redirect user to admin.php page

            }  elseif($unvalidate['accrole'] == 'Dentist'){ //usertype is admin
                $_SESSION['loggedIn'] = 'true'; //set session value to true
                $_SESSION['username'] = $unvalidate['username']; //set session username on the row that was found
                $_SESSION['access'] = $unvalidate['accrole']; //set session access.
                $_SESSION['id'] = $unvalidate['id']; //set session access.

                header("location: /Modules/dentist/index.php"); //redirect user to admin.php page

            }
               elseif($unvalidate['accrole'] == 'Secretary'){ //usertype is admin
                $_SESSION['loggedIn'] = 'true'; //set session value to true
                $_SESSION['username'] = $unvalidate['username']; //set session username on the row that was found
                $_SESSION['access'] = $unvalidate['accrole']; //set session access.
                $_SESSION['id'] = $unvalidate['id']; //set session access.

                header("location: /Modules/secretary/index.php"); //redirect user to admin.php page

            }


               elseif($unvalidate['accrole'] == 'Receptionist'){ //usertype is admin
                $_SESSION['loggedIn'] = 'true'; //set session value to true
                $_SESSION['username'] = $unvalidate['username']; //set session username on the row that was found
                $_SESSION['access'] = $unvalidate['accrole']; //set session access.
                $_SESSION['id'] = $unvalidate['id']; //set session access.

                header("location: /Modules/receptionist/index.php"); //redirect user to admin.php page

            }


            else{ // user type is regular
                $_SESSION['loggedIn'] = 'true'; 
                $_SESSION['username'] = $unvalidate['username'];
                $_SESSION['fname'] = $unvalidate['fname'];
                $_SESSION['access'] = $unvalidate['accrole'];
                $_SESSION['id'] = $unvalidate['id'];
                //redirect user to home page.
                header("location: /Modules/Patient/index.php");
        
            }

        } else{

            //Wrong password or username
                $_SESSION['loggedIn'] = 'false';
             echo  "<script> alert('Check Username and Password'); window.location='/LoginPage/login-page.php'; </script>";
        }
    }    
} 
?>
