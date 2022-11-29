<?php
  //include_once 'userlogs.php';

  require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

  $uid = $_SESSION['id'];

function fetchSOADetails($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT * FROM transaction AS a INNER JOIN statement_of_account AS b ON a.user_id=b.user_id
    INNER JOIN patients AS c ON a.user_id = c.user_id WHERE a.user_id = $uid ");
    return $soa;
}

?>

<!DOCTYPE html lang=en dir="ltr">
<html>
    <head>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="css/rbilling.css">
        <link rel="stylesheet" href="css/all.min.css">
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
          <header class="header">
        <div class="header__container">
            <img src="assets/img/logo dental.png" alt="" class="header__img">

            <a href="#" class="header__logo">Statement of Account</a>


            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>
    
     <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bxs-disc nav__icon' ></i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">

                        <a href="/Secretary/index.php" class="nav__link active">
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
                                <a href="/php-calendar/calendar.php" class="nav__dropdown-item">Calendar</a>
                                    <a href="/php-calendar/select.html" class="nav__dropdown-item">Schedule List</a>
                                   
                                   
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
                                <a href="/Secretary/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Secretary</a>
                                    <a href="/Secretary/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
                                    <a href="/Secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                                   
                                </div>
                            </div>
                        </div>


                        <a href="#" class="nav__link">
                            <i class='bx bx-money nav__icon' ></i>
                            <span class="nav__name">Billing</span>
                        </a>
                    </div>

                    <a href="#" class="nav__link">
                        <i class='bx bxs-megaphone nav__icon'></i>
                        <span class="nav__name">Announcement</span>
                    </a>
                </div>

            <a href="#" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon' ></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

        <div class="body_content">
        
        </div>

        <?php

            $query = fetchSOADetails($uid);

            $brow = mysqli_fetch_array($query);

        ?>

        
       <div class="form">        
            
            <div class="content">
                <div class="id">
                <span class="details0">INVOICE NUMBER <input type="number" placeholder="" value="<?php  $brow['transaction_id'] ?> disabled"></span>
                </div>
                
                <h2>Your Payment Transaction as of</h2>
                <h4> <?php echo $brow["transaction_date"] ?> </h4>
            <br>
            <br>
            <br>
                 0
                
        <div class="container">
                <div class="view-details">
                     <div class="input-box">
                        <span class="details">NAME of PATIENT <input type="text" placeholder="" value="<?php $brow['patient_first_name']?>"  "<?php ?>" disabled></span>
                    </div>
                    <br>
                    <br>
                    <div class="input-box">
                        <span class="details">NAME of DENTIST <input type="text" placeholder="" required></span>
                    </div>
     

                    <br>
                     <div class="input-box">
                        <span class="details">Dental Procedure <input type="text" placeholder="" value="<?php echo $brow["type_of_procedure"] ?>" disabled></span>
                    </div>
                    <br>
                    <div class="input-box">
                        <span class="details">Other Charges <input type="text" placeholder="" value="<?php echo $brow["other_charges"] ?>" disabled></span>
                    </div>
                    <br>
                    <div class="input-box">
                        <span class="details">Transaction Type  <input type="text" placeholder="" value="<?php echo $brow["transaction_type"] ?>" disabled></span>                     
                    </div>
                    <br>
                </div>
        </div>
           <div class="container2">
                       <h2>Amount</h2>
                    <div class="input-box2">
                    <span class="details"><input type="number" placeholder="" value="<?php echo $brow["procedure_price"] ?>" disabled></span>
                    </div>
                    <br>
                    <div class="input-box2">
                        <span class="details"><input type="number" placeholder="" value="<?php echo $brow["other_charges_price"] ?>" disabled></span>
                    </div>
        </div>        
                
        <div class="container1">
                    <div class="input-box1">
                    <span class="details">TOTAL AMOUNT <input type="number" placeholder="" value="<?php echo $brow["total_amount"] ?>" disabled></span>
                    </div>
                    <br>
                    <div class="input-box1">
                        <span class="details">AMOUNT PAID <input type="number" placeholder="" value="<?php echo $brow["amount_paid"] ?>" disabled></span>
                    </div>
        </div>
        </div>    

        <?php 

        $difference = $brow['total_amount'] - $brow['amount_paid'];

        ?>

                   <div class="container3">
                    <div class="input-box">
                    <span class="details">PENDING BALANCE <input type="number" placeholder="" value="<?php echo $difference ?>" disabled></span>
                </div>
            </div>
       </div>
        
    </body>
</html>
    
