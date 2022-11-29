<?php
//created by Bryan Joshua Bucu

include __DIR__ . ('/connect.php');  
session_start();

/*
 check if user is already  already login
 if user is alreadly login redirect user to index page.
*/
if($_SESSION['loggedIn'] == 'true'){ 
     echo  "<script> window.location='/index.php'; </script>";
}

//if user clicked login button then execute code below. 
if(isset($_POST['login'])){
    //get uname and password
    $username= $_POST['uname'];
    $password= $_POST['password'];

    if(empty($username) || empty($password)){ // user did not enter any credentials
               echo "<script> alert('Please fill up password and username'); window.location='/LoginPage/LoginPage.php'; </script>";
                exit();
    }
    else{ // check user input if match in database.
       $sql = "SELECT * FROM users_credentials WHERE username = '$username' AND user_password = '$password'";  
                 $result = mysqli_query($connection, $sql);    
                 $count = mysqli_num_rows($result);  
                 $unvalidate= mysqli_fetch_array($result);
            

          
        if($count > 0){ //if found in database

            if($unvalidate['usertype'] == 'admin'){ //usertype is admin
                $_SESSION['loggedIn'] = 'true'; //set session value to true
                $_SESSION['username'] = $unvalidate['username']; //set session username on the row that was found
                 $_SESSION['access'] = $unvalidate['usertype']; //set session access.

                header("location: /admin/index.php"); //redirect user to admin.php page

            }
            elseif($unvalidate['usertype'] == 'dentist'){ //usertype is dentist
                $_SESSION['loggedIn'] = 'true'; //set session value to true
                $_SESSION['username'] = $unvalidate['username']; //set session username on the row that was found
                 $_SESSION['access'] = $unvalidate['usertype']; //set session access.

                header("location: /dentist/index.php"); //redirect user to admin.php page

            }else{ // user type is regular
                $_SESSION['loggedIn'] = 'true'; 
                $_SESSION['username'] = $unvalidate['username'];
                $_SESSION['access'] = $unvalidate['usertype'];

                //redirect user to home page.
                header("location: /patient/index.html");
        
            }

        } else{

            //Wrong password or username
                $_SESSION['loggedIn'] = 'false';
             echo  "<script> alert('Check Username and Password'); window.location='/LoginPage/LoginPage.php'; </script>";
        }
    }    
} 
?>
