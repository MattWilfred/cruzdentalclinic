<?php
//session_start();

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function getSOAid($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT soa_id FROM statement_of_account WHERE user_id=$uid LIMIT 1");

    $retrieved_soa = mysqli_fetch_row($soa);
    
    return $retrieved_soa[0];
}

function createSOA($uid){
    global $connection;

    $soa = getSOAid($uid);

    $checkexistingsoa = mysqli_query($connection, "SELECT * FROM statement_of_account WHERE soa_id = $soa");

    if(mysqli_num_rows($checkexistingsoa) ==  0){
        $addnewsoa = mysqli_query($connection, "INSERT INTO statement_of_account VALUES (DEFAULT, $uid, 0)");

        $addnewsoa_run = mysqli_query($connection, $addnewsoa);

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

    $query_run = mysqli_query($connection, $query);

    if($query_run){

        $soaq = "UPDATE statement_of_account SET balance='$balance' WHERE soa_id = $soa";

        $soaq_run = mysqli_query($connection, $soaq);


        if($soaq_run){
        //echo 'Inserted Successfully';
            header('Location: billing.php');
        }
        else{
        echo 'Insertion Fail for updating balance';
        echo $soaq . "<br>" . mysqli_error($connection);
        }
    }
    else
    {
        echo 'Insertion Fail for updating transaction';
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