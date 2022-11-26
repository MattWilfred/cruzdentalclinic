<?php

    require 'dbcon.php';
    

    if (isset($_POST['submit']))
    {

        $user = $_POST['user'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        

        $query = "INSERT INTO announcement(user_,title,message) VALUES ('$user','$title','$message')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run){
            echo "<script type='text/javascript'>alert('Announcement added');</script>";
            echo '<script language="javascript">window.location = "announcement.php";</script>';

        }
        else {
            die("Invalid query: " . $connection->error);
        }
    }



    if(isset($_POST['delete_account']))
    {
        $cruzdentalclinic_id = mysqli_real_escape_string($connection,$_POST['delete_account']);
    
        $query = "DELETE FROM announcement WHERE `annc_id`='$cruzdentalclinic_id' ";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Deleted";
            header("Location: announcement.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header("Location: announcement.php");
            exit(0);
        }
    }

                       


?>