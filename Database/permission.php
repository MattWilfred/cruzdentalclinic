<?php

/*
Created by Bryan Joshua Bucu

check the usertype of the user if regular is the usertype 
  then redirect user to index page or home page. 
*/

if($_SESSION['access'] == 'Patient' || $_SESSION['access'] == 'Dentist' ||  $_SESSION['access'] == 'Secretary'){
  echo "<script> alert('You do not have permission to access this site'); window.location='index.php'; </script>";  
 }


?>
