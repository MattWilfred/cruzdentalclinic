<?php
include('../../Database/connect.php');

$id = $_GET['dentId'];

$status = $_GET['status']; 


echo $status;

if(isset($_GET['dentId'])){

    if($status == 1){
        $sql = "UPDATE users SET status='0' WHERE id='$id' ";
        $result = mysqli_query($connection, $sql);
       header("location: /Modules/dentist/index.php"); 
        die();
    }else{
        $sql = "UPDATE users SET status='1' WHERE id='$id' ";
        $result = mysqli_query($connection, $sql);
        header("location: /Modules/dentist/index.php"); 
        die();
    }

    }


?>