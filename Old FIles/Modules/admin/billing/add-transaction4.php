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

function getSOAid($uid){
    global $conn;
    $retrieved_soa = mysqli_query($conn, "SELECT * FROM statement_of_account WHERE user_id=$uid");
    return $retrieved_soa;
}

if(isset($_POST['save'])){

    $uid = $_POST['pname-dd'];
    $soa = 7;
    $date = $_POST['dob'];
    $procedurename = $_POST['procedure-dd'];
    $procedureprice = $_POST['prc'];
    $othercharges = $_POST['xc'];
    $otherprice = $_POST['opr'];

    $amountpaid = $_POST['amtpd'];

    $tot = $procedureprice + $otherprice;

    $status = checkStatus($tot, $amountpaid);
    $ttype = checkTransactionType($tot, $amountpaid);

    $query = "INSERT INTO transaction VALUES (DEFAULT, '$uid', '$soa', '$date', '$procedurename', '$procedureprice', '$othercharges', '$otherprice', '$tot', '$amountpaid','$ttype', '$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){

        $balance = $tot - $amountpaid;

        $soaq = "UPDATE statement_of_account SET balance='$balance' WHERE user_id = $uid";

        $soaq_run = mysqli_query($conn, $soaq);
        if($query_run){
        //echo 'Inserted Successfully';
            header('Location: billing.php');
        }
        else{
            echo 'Insertion Fail';
        echo $query . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        echo 'Insertion Fail';
        echo $query . "<br>" . mysqli_error($conn);
    }
}

function checkStatus($total, $amountpd){
    $status = "DEFAULT";
    $difference = $total - $amountpd;

    if ($difference === 0){
        $status = "FULL PAID";
    } elseif ($amountpd === 0){
        $status = "UNPAID";
    } elseif ($difference > 0){
        $status = "PARTIAL PAID";
    } else {
        $status = "OVERPAID";
    }
    return $status;
}

function checkTransactionType($total, $amountpd){
    $status = "DEFAULT";
    $difference = $total - $amountpd;

    if ($difference === 0){
        $status = "FULLY PAID";
    } else {
        $status = "INSTALLMENT";
    }

    return $status;
}

?>