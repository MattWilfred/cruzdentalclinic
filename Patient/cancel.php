<?php
    include('../Database/connect.php');	
    $id = $_GET['schedid']; 
    
    echo $id;
    if(isset($_GET['schedid'])){
        $id = $_GET['schedid'];    
        $query = "UPDATE bookings SET status='4' WHERE sched_id='$id'";  
        $result = mysqli_query($connection, $query);
         header("location: /Patient/index.php"); 

        
        die();  
    }


?>