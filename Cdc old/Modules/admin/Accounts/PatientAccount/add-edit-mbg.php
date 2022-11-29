<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="patientprescription-style.css?v=<?php echo time(); ?>">
    </head>

    <?php
    session_start();

    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

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
    $cb27 = isset($_POST['cb27']) ? $_POST['cb27'] : 0 ;
    $cb28 = isset($_POST['cb28']) ? $_POST['cb28'] : 0 ;
    $cb29 = isset($_POST['cb29']) ? $_POST['cb29'] : 0 ;
    $cb30 = isset($_POST['cb30']) ? $_POST['cb30'] : 0 ;
    $cb31 = isset($_POST['cb31']) ? $_POST['cb31'] : 0 ;
    $cb32 = isset($_POST['cb32']) ? $_POST['cb32'] : 0 ;
    $cb33 = isset($_POST['cb33']) ? $_POST['cb33'] : 0 ;
    $cb34 = isset($_POST['cb34']) ? $_POST['cb34'] : 0 ;
    $cb35 = isset($_POST['cb35']) ? $_POST['cb35'] : 0 ;
    $cb36 = isset($_POST['cb36']) ? $_POST['cb36'] : 0 ;
    $cb37 = isset($_POST['cb37']) ? $_POST['cb37'] : 0 ;
    $cb38 = isset($_POST['cb38']) ? $_POST['cb38'] : 0 ;
    $cb39 = isset($_POST['cb39']) ? $_POST['cb39'] : 0 ;
    $cb40 = isset($_POST['cb40']) ? $_POST['cb40'] : 0 ;
    $cb41 = isset($_POST['cb41']) ? $_POST['cb41'] : 0 ;
    $cb42 = isset($_POST['cb42']) ? $_POST['cb42'] : 0 ;
    $cb43 = isset($_POST['cb43']) ? $_POST['cb43'] : 0 ;
    $cb44 = isset($_POST['cb44']) ? $_POST['cb44'] : 0 ;
    $cb45 = isset($_POST['cb45']) ? $_POST['cb45'] : 0 ;
    $cb46 = isset($_POST['cb46']) ? $_POST['cb46'] : 0 ;
    $cb47 = isset($_POST['cb47']) ? $_POST['cb47'] : 0 ;
    $cb48 = isset($_POST['cb48']) ? $_POST['cb48'] : 0 ;
    $cb49 = isset($_POST['cb49']) ? $_POST['cb49'] : 0 ;
    $cb50 = isset($_POST['cb50']) ? $_POST['cb50'] : 0 ;
    $cb51 = $_POST['cb51'];
    $cb52 = $_POST['cb52'];
    $cb53 = $_POST['cb53'];


    if(isset($_POST['submit'])){

        $query = "INSERT INTO medicalbackground VALUES (DEFAULT,'$uid','$cb1','$cb2','$cb3','$cb4','$cb5','$cb6','$cb7','$cb8','$cb9','$cb51',
        '$cb10','$cb11','$cb12','$cb13','$cb14','$cb15','$cb16','$cb17','$cb18','$cb19','$cb20',
        '$cb21','$cb22','$cb52','$cb23','$cb24','$cb25','$cb26','$cb27','$cb28','$cb29','$cb30',
        '$cb31','$cb32','$cb33','$cb34','$cb35','$cb36','$cb37','$cb38','$cb39','$cb40',
        '$cb41','$cb42','$cb43','$cb44','$cb45','$cb46','$cb47','$cb48','$cb49','$cb50','$cb53', NOW())";

        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            //echo 'Inserted Successfully';
            header("Location: {$_REQUEST["url"]}");
        }
        else
        {
            echo 'Insertion Fail';
            echo $query . "<br>" . mysqli_error($connection);
        }


    } elseif (isset($_POST['save'])) {
        //echo "Edit lezz go";

        $edit_query = "INSERT INTO medicalbackground VALUES (DEFAULT,'$uid','$cb1','$cb2','$cb3','$cb4','$cb5','$cb6','$cb7','$cb8','$cb9','$cb51',
        '$cb10','$cb11','$cb12','$cb13','$cb14','$cb15','$cb16','$cb17','$cb18','$cb19','$cb20',
        '$cb21','$cb22','$cb52','$cb23','$cb24','$cb25','$cb26','$cb27','$cb28','$cb29','$cb30',
        '$cb31','$cb32','$cb33','$cb34','$cb35','$cb36','$cb37','$cb38','$cb39','$cb40',
        '$cb41','$cb42','$cb43','$cb44','$cb45','$cb46','$cb47','$cb48','$cb49','$cb50','$cb53', NOW())";

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

</html>