<?php

/*
Created by Bryan Joshua Bucu

check the usertype of the user if regular is the usertype 
  then redirect user to index page or home page. 
*/

if($_SESSION['access'] == 'regular' || $_SESSION['access'] == 'dentist'  ){
  echo "<script> alert('You do not have permission to access this site'); window.location='index.php'; </script>";  
 }


?>
