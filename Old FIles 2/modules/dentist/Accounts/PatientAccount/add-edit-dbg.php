<?php
session_start();

include 'dbcon.php';


if (!$connection){
  die("Connection error!");
}

$uid = $_POST['id'];

$cb1 = isset($_POST['cb1']) ? $_POST['cb1'] : 0 ;
$cb2 = isset($_POST['cb2']) ? $_POST['cb2'] : 0 ;
$cb3 = isset($_POST['cb3']) ? $_POST['cb3'] : 0 ;
$cb4 = isset($_POST['cb4']) ? $_POST['cb4'] : 0 ;
$cb5 = isset($_POST['cb5']) ? $_POST['cb5'] : 0 ;
$cb6 = isset($_POST['cb6']) ? $_POST['cb6'] : 0 ;
$cb7 = isset($_POST['cb7']) ? $_POST['cb7'] : 0 ;
$cb8 = isset($_POST['cb8']) ? $_POST['cb8'] : 0 ;
$cb9 = isset($_POST['cb9']) ? $_POST['cb9'] : 0 ;
$cb10 = isset($_POST['cb10']) ? $_POST['cb10'] : 0 ;
$cb11 = isset($_POST['cb11']) ? $_POST['cb11'] : 0 ;
$cb12 = isset($_POST['cb12']) ? $_POST['cb12'] : 0 ;
$cb13 = isset($_POST['cb13']) ? $_POST['cb13'] : 0 ;
$cb14 = isset($_POST['cb14']) ? $_POST['cb14'] : 0 ;
$cb15 = isset($_POST['cb15']) ? $_POST['cb15'] : 0 ;
$cb16 = isset($_POST['cb16']) ? $_POST['cb16'] : 0 ;
$cb17 = isset($_POST['cb17']) ? $_POST['cb17'] : 0 ;
$cb18 = isset($_POST['cb18']) ? $_POST['cb18'] : 0 ;
$cb19 = isset($_POST['cb19']) ? $_POST['cb19'] : 0 ;
$cb20 = isset($_POST['cb20']) ? $_POST['cb20'] : 0 ;
$cb21 = isset($_POST['cb21']) ? $_POST['cb21'] : 0 ;
$cb22 = isset($_POST['cb22']) ? $_POST['cb22'] : 0 ;
$cb23 = isset($_POST['cb23']) ? $_POST['cb23'] : 0 ;
$cb24 = isset($_POST['cb24']) ? $_POST['cb24'] : 0 ;
$cb25 = isset($_POST['cb25']) ? $_POST['cb25'] : 0 ;
$cb26 = isset($_POST['cb26']) ? $_POST['cb26'] : 0 ;


if(isset($_POST['submit'])){

    $query = "INSERT INTO dentalbackground VALUES (DEFAULT,'$uid','$cb1','$cb2','$cb3','$cb4','$cb5','$cb6','$cb7','$cb8','$cb9',
    '$cb10','$cb11','$cb12','$cb13','$cb14','$cb15','$cb16','$cb17','$cb18','$cb19','$cb20',
    '$cb21','$cb22','$cb23','$cb24','$cb25','$cb26')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo 'Inserted Successfully';
        header("Location: {$_REQUEST["url"]}");
    }
    else
    {
        echo 'Insertion Fail';
        echo $query . "<br>" . mysqli_error($connection);
    }


} elseif (isset($_POST['save'])) {

    $edit_query = "INSERT INTO dentalbackground VALUES (DEFAULT,'$uid','$cb1','$cb2','$cb3','$cb4','$cb5','$cb6','$cb7','$cb8','$cb9',
    '$cb10','$cb11','$cb12','$cb13','$cb14','$cb15','$cb16','$cb17','$cb18','$cb19','$cb20',
    '$cb21','$cb22','$cb23','$cb24','$cb25','$cb26', NOW())";

    $edit_query_run = mysqli_query($connection, $edit_query);

    if($edit_query_run)
    {
        echo 'Updated Successfully';
        header("Location: {$_REQUEST["url"]}");
    }
    else
    {
        echo 'Update Fail';
        echo $edit_query . "<br>" . mysqli_error($connection);
    }


} elseif (isset($_POST['cancel'])) {
    header("Location: {$_REQUEST["url"]}");
}



?>