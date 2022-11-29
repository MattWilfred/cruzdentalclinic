<?php
session_start();

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

$transaction_id = 3;

$edob = $_POST['edit-dob'];
$eproc = $_POST['edit-procedure'];
$epr = $_POST['edit-pr'];
$exc = $_POST['edit-xc'];
$eopr = $_POST['edit-opr'];

if (isset($_POST['save'])) {
    //echo "Edit lezz go";

    $edit_query = "UPDATE transaction SET transaction_date='$edob',type_of_procedure='$epro',
    procedure_price='$epr',other_charges='$exc',other_charges_price='$eopr' 
    WHERE transaction_id = '$transaction_id'";

    $edit_query_run = mysqli_query($conn, $edit_query);

    if($edit_query_run)
    {
        echo 'Updated Successfully';
        header('Location: billing.php');
    }
    else
    {
        echo 'Update Fail';
        echo $edit_query . "<br>" . mysqli_error($conn);
    }


}
?>