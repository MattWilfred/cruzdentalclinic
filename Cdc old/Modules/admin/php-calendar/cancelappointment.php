<?php
    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM bookings WHERE sched_id= '$id' ";

        $sql = mysqli_query($connection, $query);

       echo "<script>window.location='/Modules/admin/php-calendar/schedule-list.php'</script>";
    }
?>