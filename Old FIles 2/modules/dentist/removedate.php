<?php

include ('../../Database/connect.php');
$id = $_GET['id']; // get id value

$sql = "DELETE FROM holiday WHERE holiday_id= '$id'"; // delete data

$result = mysqli_query($connection, $sql);

//after delete redirect user to admin page
header("location: /Modules/dentist/blockdate.php");
    



?>