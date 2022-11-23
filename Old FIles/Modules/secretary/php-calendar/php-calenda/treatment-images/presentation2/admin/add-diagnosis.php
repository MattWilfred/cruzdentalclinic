<?php



    require 'dbcon.php';
    

    if (isset($_POST['submit']))
    {

        $toothnumber = implode(", ", $_POST['tooth']);
        $description = $_POST['description'];
        
        

        $query = "INSERT INTO diagnosis(tooth_number, description) VALUES ('$toothnumber','$description')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run){
            echo '<script> alert("Data Saved"); </script>';
            header('Location: patient.php');

        }
        else {
            die("Invalid query: " . $connection->error);
        }
    }

    if(isset($_POST['delete_account']))
{
    $cruzdentalclinic_id = mysqli_real_escape_string($connection,$_POST['delete_account']);

    $query = "DELETE FROM diagnosis WHERE `diagnosis_id`='$cruzdentalclinic_id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted";
        header("Location: patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: atient.php");
        exit(0);
    }
}


                       


?>