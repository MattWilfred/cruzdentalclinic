<?php
session_start();
require 'dbcon.php';

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admins WHERE admin_id='$id'";
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

?>