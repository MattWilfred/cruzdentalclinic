<?php
session_start();

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function fetchTransactionToEdit($uid){
    global $connection;
    $transactions = mysqli_query($connection, "SELECT * FROM transaction AS a INNER JOIN patients AS b ON a.user_id = b.user_id WHERE a.transaction_id = $uid");
    return $transactions;
}

function fetchPName(){
    global $connection;
    $pname = mysqli_query($connection, "SELECT * FROM patients");
    return $pname;
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

function getSOAid($tid){
    global $connection;
    $ti = mysqli_query($connection, "SELECT soa_id FROM transaction WHERE transaction_id=$tid");

    $retrieved_ti = mysqli_fetch_row($ti);
    
    return $retrieved_ti[0];
}


$t_id = $_GET['edit-button'];

$tquery = fetchTransactionToEdit($t_id);

$trow = mysqli_fetch_array($tquery);

?>

<!DOCTYPE html lang=en dir="ltr">
<html>


    <head>
        <link href="billing.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link rel="stylesheet" href="/Modules/admin/assets/css/styles.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="billing.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Cruz Dental Clinic Website</title>
    </head>
    <body>
          <!--========== HEADER ==========-->
          <header class="header">
            <div class="header__container">
                <!--<img src="assets/img/logo dental.png" alt="" class="header__img">-->
                <a href="#" class="header__logo">Cruz Dental Clinic</a>
    
            
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

      <!--========== NAV ==========-->


<!-- <div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="#" class="nav__link nav__logo">
           <i class='nav__icon'>
           <img src="/Modules/admin/assets/img/logo dental.png" alt="" class="header__img">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Modules/admin/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/admin/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/admin/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                               
                            </div>
                        </div>
                    </div>

                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Accounts</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                            <a href="/Modules/admin/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Employees</a>
                                <a href="/Modules/admin/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
                                <a href="/Modules/admin/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="/Modules/admin/billing/billing.php" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="/Modules/admin/announcement/announcement.php" class="nav__link">
                    <i class='bx bxs-megaphone nav__icon'></i>
                    <span class="nav__name">Announcement</span>
                </a>
            </div>

        <a href="/LoginPage/login-page.php" class="nav__link nav__logout">
            <i class='bx bx-log-out nav__icon' ></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>-->

<!----- -------------------------------- ------->

<div id="divTwo">
    <div class="wrapper">
        <h2>Edit Transaction</h2><a class="close" href="#">&times;</a>
    <div class="container">

    <div class="content">

    <form name="edit-transaction-form" method="POST">

    <div class="row1">
        <div class="input-box">
            <span class="details">Select Patient</span>
            <?php

                $qp = fetchPName();

                echo "<select style='width: 200px' id='dropdown' name='epname-dd' class='dropdown' style='width: 20%'>";

                    while ($row = mysqli_fetch_assoc($qp)){
                        echo "<option style='width:100px' value='" .$row['user_id']. "'>" .$row['patient_first_name']. " ".$row['patient_surname']. "</option>";
                    }
                                
                echo "</select>";
            ?>
        </div>
                        
        <div class="input-box">
            <span class="details">Date</span>
                        <input type="date" name="edit-tob" value="<?php echo $trow['transaction_type']; ?>">
                        </div>
                    </div>   
                        
                    <div class="row2">    
                        <div class="input-box1">
                         <span class="details">Type of Procedure</span>
                            <select id="dropdown" name="edit-procedure" class="dropdown" value="<?php echo $trow['type_of_procedure']; ?>">
                                <option disabled value>Choose Procedure</option>
                                <option value="None">None</option>
                                <option value="Dental Check-Up">Dental Check-Up</option>
                                <option value="Teeth Whitening">Teeth Whitening</option>
                                <option value="Dental Implants">Dental Implants</option>
                                <option value="Root Canal Treatment">Root Canal Treatment</option>
                                <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                <option value="Dental Crown">Dental Crown</option>
                                <option value="Dental Bridge">Dental Bridge</option>
                                <option value="Orthiontics">Orthiontics</option>
                                <option value="Restoration">Restoration</option>
                                <option value="Fluoride Application">Fluoride Application </option>
                                <option value="Odontectomy">Odontectomy</option>
                            </select>
                        </div>
                        
                        <div class="input-box1">
                        <span class="details">Price</span>
                        <input class="price-input" type="price" name="edit-pr" value="<?php echo $trow['procedure_price']; ?>">
                        <button onclick="addAdditionalProcedure()" id="plus-btn">+</button>

                    </div>
                     
                    <div class="row3">    
                        <div class="input-box2">
                        <span class="details">Other Charges</span>
                        <input type="xcharges" name="edit-xc[]" value="<?php echo $trow['other_charges']; ?>">
                        </div>
                        
                        <div class="input-box3">
                        <span class="details">Price</span>
                        <input class="price-input" type="price" name="edit-opr[]" value="<?php echo $trow['other_charges_price']; ?>">
                        <button onclick="addAdditionalOtherProcedure()" id="plus-btn1">+</button>
                        </div>
                    </div>
                </div>
                        
                        
                        <div class="container3">
                            <h2>Total Amount</h2>
                            <h3><input id="etotal" class="total" type="textfield" name="etotal" disabled="disabled"></h3>

                            <div class="container2" style="padding-left: 20%">
                            <h2>Amount Paid</h2>
                                <p><input id="eamtpd" class="amtpd" type="textfield" name="eamtpd" required></p>
                            </div>

                        </div>
                    <div>
                    <input type="submit" name="save" id="save-btn1"></input>
                    </div>
            
                </form>

                <?php

                $t_id = $_GET['edit-button'];    

                if (isset($_POST['save'])) {

                    $epn = $_POST['epname-dd'];
                    $etob = $_POST['edit-tob'];
                    $eproc = $_POST['edit-procedure'];
                    $epr = $_POST['edit-pr'];
                    $exc = implode(",",$_POST['edit-xc']);
                    $eopr = array_sum($_POST['edit-opr']);
                    $etotal = $epr + $eopr;
                    $eamtpd = $_POST['eamtpd'];
                    $s_id = getSOAid($t_id);   

                    //$othercharges = implode(",", $_POST['xc']);

                    $status = checkStatus($etotal, $eamtpd);
                    $ttype = checkTransactionType($etotal, $eamtpd);
                    //echo "Edit lezz go";

                    $edit_query = "UPDATE transaction SET user_id=$epn, soa_id=$s_id, transaction_date='$etob', type_of_procedure='$eproc',
                    procedure_price=$epr,other_charges='$exc',other_charges_price=$eopr,total_amount=$etotal,amount_paid=$eamtpd,transaction_type='$ttype', status='$status'
                    WHERE transaction_id = $t_id";

                    $edit_query_run = mysqli_query($connection, $edit_query);

                    if ($edit_query_run){
                        //echo 'Updated Successfully';
                        header('Location: billing.php');
                    } else {
                        echo 'Update Fail';
                        echo $edit_query . "<br>" . mysqli_error($connection);
                    }


                }
                ?>
                      
            </div>
<!----- -------------------------------- ------->
<script>

            
            $(document).on("change", ".price-input", function() {
                var sum = 0;
                $(".price-input").each(function(){
                    sum += +$(this).val();
                });
                $(".total").val(sum);

            });

            /**function addAdditionalProcedure() {

                // Get the element
                var elem = document.querySelector('#in-div-section');

                var clone = elem.cloneNode(true);

                clone.id = 'elem2';
                clone.classList.add('text-large');

                // Inject it into the DOM
                elem.after(clone);

            }

            function addAdditionalOtherProcedure() {

                // Get the element
                var elem = document.querySelector('#in-div-section2');

                var clone = elem.cloneNode(true);

                clone.id = 'elem2';
                clone.classList.add('text-large');

                // Inject it into the DOM
                elem.after(clone);
                
            }**/
</script>
</body>
</html>