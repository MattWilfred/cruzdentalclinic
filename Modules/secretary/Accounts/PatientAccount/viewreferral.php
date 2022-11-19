<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="css/patientreferral-style.css?v=<?php echo time(); ?>">
    </head>


    <body>
        <?php
        include "dbcon.php";

        if(isset($_POST['refid'])){


        
        $refid = $_POST['refid'];
        
        $sql = "select * from referral where referral_id=".$refid;
        $result = mysqli_query($con,$sql);
        while( $row = mysqli_fetch_array($result) ){
        ?>

                    <div class="ptr">
                        <div>
                            <p style="margin-left: 2%; ">Notes here.</p>
                            <button style="margin-right:2%; " class="btn btn-primary"   onclick="printImg('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['referral_image']); ?>')"   >Print</button>

                        </div>

                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['referral_image']); ?>" /> 
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