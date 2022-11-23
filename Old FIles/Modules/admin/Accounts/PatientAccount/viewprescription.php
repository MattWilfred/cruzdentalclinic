<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="patientprescription-style.css?v=<?php echo time(); ?>">
    </head>


    <body>
        <?php
        include "dbcon.php";

        if(isset($_POST['prescid'])){


        
        $prescid = $_POST['prescid'];
        
        $sql = "select * from prescription where prescription_id=".$prescid;
        $result = mysqli_query($connection,$sql);
        while( $row = mysqli_fetch_array($result) ){
        ?>
                    <div class="ptr">
                        <div>
                            <p style="margin-left: 2%; ">This prescription is valid only when it's printed.</p>
                            <button style="margin-right:2%; " class="btn btn-primary"   onclick="printImg('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['prescription_image']); ?>')"   >Print</button>

                        </div>
                        
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['prescription_image']); ?>" /> 
                    </div>
        <?php }
        }
        ?>

        <script>
            function printImg(url) {
                var win = window.open('');
                win.document.write('<img src="' + url + '" onload="window.print();window.close()" />');
                win.focus();
            }
        </script>

    </body>
</html>