<?php

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function checkIfMissing($toothNum, $uid){
    global $connection;

    $ifMissing = mysqli_query($connection, "SELECT findings FROM diagnosis WHERE tooth_number = $toothNum AND findings = 'Missing' AND userid='$uid'");

    if(mysqli_num_rows($ifMissing) > 0){
        echo "disabled";
    }
}

function colorIfMissing($toothNum, $uid){
    global $connection;

    $ifMissing = mysqli_query($connection, "SELECT findings FROM diagnosis WHERE tooth_number = $toothNum AND findings = 'Missing' AND userid='$uid'");

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