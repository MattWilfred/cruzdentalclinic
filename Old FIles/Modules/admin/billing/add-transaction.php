<?php
//session_start();

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
    $soa = mysqli_query($conn, "SELECT soa_id FROM statement_of_account WHERE user_id=$uid LIMIT 1");

    $retrieved_soa = mysqli_fetch_row($soa);
    
    return $retrieved_soa[0];
}

function createSOA($uid){
    global $conn;

    $soa = getSOAid($uid);

    $checkexistingsoa = mysqli_query($conn, "SELECT * FROM statement_of_account WHERE soa_id = $soa");

    if(mysqli_num_rows($checkexistingsoa) ==  0){
        $addnewsoa = mysqli_query($conn, "INSERT INTO statement_of_account VALUES (DEFAULT, $uid, 0)");

        $addnewsoa_run = mysqli_query($conn, $addnewsoa);

       /**if($addnewsoa_run){
            header('Location: billing.php');
        }else{
            echo 'Insertion Fail for adding new soa';
            echo $addnewsoa . "<br>" . mysqli_error($conn);
        }**/
    }
}



//elem = implode(",", $_POST['elem'])

if(isset($_POST['save'])){

    $uid = $_POST['pname-dd'];

    createSOA($uid);

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

    //$soa = getSOAid($uid);

    $query = "INSERT INTO transaction VALUES (DEFAULT, '$uid', '$soa', '$date', '$procedurename', '$procedureprice', '$othercharges', '$otherprice', '$tot', '$amountpaid','$ttype', '$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){

        $soaq = "UPDATE statement_of_account SET balance='$balance' WHERE soa_id = $soa";

        $soaq_run = mysqli_query($conn, $soaq);


        if($soaq_run){
        //echo 'Inserted Successfully';
            header('Location: billing.php');
        }
        else{
        echo 'Insertion Fail for updating balance';
        echo $soaq . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        echo 'Insertion Fail for updating transaction';
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