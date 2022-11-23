<?php
session_start();

$dbServername = "localhost:8089";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "medicaldental";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
  die("Connection error!");
}


if(isset($_POST['save'])){

    $uid = 2;
    $pname = $_POST['pname-dd'];
    $date = $_POST['dob'];
    $procedurename = $_POST['procedure-dd'];
    $procedureprice = $_POST['prc'];
    $othercharges = $_POST['xc'];
    $otherprice = $_POST['opr'];

    $tot = $procedureprice + $otherprice;

    $query = "INSERT INTO transaction VALUES (DEFAULT, '$uid', '$date', '$procedurename', '$procedureprice', '$othercharges', '$otherprice', '$tot')";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        //echo 'Inserted Successfully';
        header('Location: billing.php');
    }
    else
    {
        echo 'Insertion Fail';
        echo $query . "<br>" . mysqli_error($conn);
    }
}

?>