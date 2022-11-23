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

//elem = implode(",", $_POST['elem'])

if(isset($_POST['save'])){

    $uid = $_POST['pname-dd'];
    $soa = getSOAid($uid);
    $date = $_POST['dob'];
    //$procedurename = $_POST['procedure-dd'];

    $procedurename = implode(",", $_POST['procedure-dd']);
    //$procedureprice = $_POST['prc'];
    //$arrprc= implode(",", $_POST['prc']);

    $procedureprice = array_sum($_POST['prc']);

    //$procedureprice = array_sum(str_split($arrprc));
    
    $othercharges = implode(",", $_POST['xc']);
    $otherprice = array_sum($_POST['opr']);

    $amountpaid = $_POST['amtpd'];

    $tot = $procedureprice + $otherprice;

    $status = checkStatus($tot, $amountpaid);
    $ttype = checkTransactionType($tot, $amountpaid);

    $balance = $tot - $amountpaid;

    $query = "INSERT INTO transaction VALUES (DEFAULT, '$uid', '$soa', '$date', '$procedurename', '$procedureprice', '$othercharges', '$otherprice', '$tot', '$amountpaid','$ttype', '$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){

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
        $status = "FULLY PAID";
    } elseif ($difference === $total){
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
        $status = "FULL PAYMENT";
    } else {
        $status = "INSTALLMENT";
    }

    return $status;
}

?>