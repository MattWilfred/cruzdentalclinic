<?php
session_start();
require 'connect.php';

if(isset($_POST['Update_DentistAccount']))
{
    $dentist_id = mysqli_real_escape_string($connection, $_POST['dentist_id']);
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $paddress = mysqli_real_escape_string($connection, $_POST['paddress']);
    $birthdate = mysqli_real_escape_string($connection, $_POST['birthdate']);
    $phonenumber = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
   
    $query = "UPDATE users SET fname='$fname', lname='$lname', paddress='$paddress', birthdate='$birthdate', phonenumber='$phonenumber'
    , email='$email' WHERE id='$dentist_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Updated Successfully";
        header("Location: view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

?>
