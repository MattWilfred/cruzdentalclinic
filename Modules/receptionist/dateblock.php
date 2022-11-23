<?php
require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `holiday` ( date, description) VALUES ( '$date', '$desc')";
    $result = mysqli_query($connection, $sql);    

    header("location: /Modules/receptionist/index.php");
} else{

}



?>