<?php

    require 'connect.php';
    

    if (isset($_POST['submit']))
    {

        $user = $_POST['user'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        

        $query = "INSERT INTO announcement(user_,title,message) VALUES ('$user','$title','$message')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run){
            echo '<script> alert("Data Saved"); </script>';
            header('Location:announcement.php');

        }
        else {
            die("Invalid query: " . $connection->error);
        }
    }




    if(isset($_POST['delete_account']))
    {
        $users_id = mysqli_real_escape_string($connection, $_POST['delete_account']);
    
        $query = "DELETE FROM announcement WHERE annc_id='$users_id' ";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Dentist Account Deleted Successfully";
            header("Location: announcement.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = " Dentist Account Not Deleted";
            header("Location: index.php");
            exit(0);
        }
    }
                       


?>