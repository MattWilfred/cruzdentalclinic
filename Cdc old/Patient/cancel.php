<?php
    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
    $id = $_GET['schedid']; 
    
    echo $id;
    if(isset($_GET['schedid'])){
        $id = $_GET['schedid'];    
        $query = "DELETE from bookings WHERE sched_id='$id'";  
        $result = mysqli_query($connection, $query);
         header("location: /Patient/index.php"); 

        
        die();  
    }


?>