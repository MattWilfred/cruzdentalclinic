<?php
//session_start();

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function getSOAid($uid){
    global $connection;
    $retrieved_soa = mysqli_query($connection, "SELECT * FROM statement_of_account WHERE id=$uid");
    $row = mysqli_fetch_array($retrieved_soa);
    return $row['soa_id'];
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

    $query = "INSERT INTO transaction VALUES (DEFAULT, '$uid', '$soa', '$date', '$procedurename', '$procedureprice', '$othercharges', '$otherprice', '$tot', '$amountpaid', '$ttype', '$status')";

    $query_run = mysqli_query($connection, $query);

    if($query_run){

        $soaq = "UPDATE statement_of_account SET balance='$balance' WHERE id = $uid";

        $soaq_run = mysqli_query($connection, $soaq);
        if($query_run){
        //echo 'Inserted Successfully';
            header('Location: billing.php');
        }
        else{
            echo 'Insertion Fail';
        echo $query . "<br>" . mysqli_error($connection);
        }
    }
    else
    {
        echo 'Insertion Fail';
        echo $query . "<br>" . mysqli_error($connection);
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