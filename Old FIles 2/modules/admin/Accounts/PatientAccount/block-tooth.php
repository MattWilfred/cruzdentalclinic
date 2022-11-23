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

function checkIfMissing($toothNum){
    global $conn;

    $ifMissing = mysqli_query($conn, "SELECT findings FROM diagnosis WHERE tooth_number = $toothNum AND findings = 'Missing'");

    if(mysqli_num_rows($ifMissing) > 0){
        echo "disabled";
    }
}

function colorIfMissing($toothNum){
    global $conn;

    $ifMissing = mysqli_query($conn, "SELECT findings FROM diagnosis WHERE tooth_number = $toothNum AND findings = 'Missing'");

    if(mysqli_num_rows($ifMissing) > 0){
        echo "style= 'filter: grayscale(1000%)'";
    }

    while($row = mysqli_fetch_array($ifMissing)){
        $arrv = explode(",","$row");

        foreach($row as $value){
            if ($value == "Missing"){
                echo "style= 'filter: grayscale(1000%)'";
            }
        }
    }
}





?>