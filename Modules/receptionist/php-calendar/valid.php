<?php
  require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

if(isset($_POST['submit'])){
    $dentid = $_POST['dentistid'];
    $sql = "SELECT * FROM users WHERE accrole ='Dentist' AND id='$dentid'";
    $result = $connection->query($sql);

    
    if (!$result){
        die("Invalid query: " . $connection->error);
    }

    if(mysqli_num_rows($result) > 0)
                    {
                        foreach($result as $users)
                        {
                          if($users['fname'] == "Irish Erika"){
                            echo  "<script> alert('Booked Successfully'); window.location='/admin/php-calendar/select.html'; </script>";
                          }
                        }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }

  ?>


}

?>