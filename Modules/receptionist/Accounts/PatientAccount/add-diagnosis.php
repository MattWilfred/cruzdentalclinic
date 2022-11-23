<?php
    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
    

    if (isset($_POST['add-diagnosis-button']))
    {
       

        $toothnumber = implode(",", $_POST['tooth']);
        $findings = $_POST['findings'];
        $description = $_POST['description'];
        $id = $_POST['id'];
        

        $query = "INSERT INTO diagnosis(tooth_number, findings, description, userid) VALUES ('$toothnumber','$findings','$description', '$id')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run){
            echo '<script> alert("Data Saved"); </script>';
            header("Location: {$_REQUEST["url"]}");

        }
        else {
            die("Invalid query: " . $connection->error);
        }
    }

?>