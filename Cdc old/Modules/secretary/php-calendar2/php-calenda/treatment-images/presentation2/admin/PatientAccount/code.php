<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_cruzdentaldatabase']))
{
    $cruzdentaldatabase_id = mysqli_real_escape_string($con, $_POST['delete_cruzdentaldatabase']);

    $query = "DELETE FROM `persons` WHERE `id`='$cruzdentaldatabase_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Dentist Profile Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}


