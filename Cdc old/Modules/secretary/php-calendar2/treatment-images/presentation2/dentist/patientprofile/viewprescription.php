<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="patientprescription-style.css?v=<?php echo time(); ?>">
    </head>


    <body>
        <?php
        include "dbcon.php";

        if(isset($_POST['userid'])){


        
        $userid = $_POST['userid'];
        
        $sql = "select * from prescription where prescription_id=".$userid;
        $result = mysqli_query($connection,$sql);
        while( $row = mysqli_fetch_array($result) ){
        ?>
                    <div class="ptr">
                        <p>This prescription is valid only when it's printed.</p>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['prescription_image']); ?>" /> 
                    </div>
        <?php }
        }
        ?>

    </body>
</html>