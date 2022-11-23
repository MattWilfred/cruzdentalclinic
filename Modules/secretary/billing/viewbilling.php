<?php
  //include_once 'userlogs.php';

  require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function fetchSOADetails($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT * FROM transaction AS a INNER JOIN statement_of_account AS b ON a.user_id=b.user_id WHERE a.user_id = $uid");
    return $soa;
}

?>

<!DOCTYPE html lang=e n dir="ltr">
<html>
    <head>
        <link rel="stylesheet" href="pbilling.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Cruz Dental Clinic Website</title>
    </head>
    <body>
        <div>
            <nav>
    
                <header>
                    <div class="logo"> <img src="logo dental.png" alt="dental logo"></div>
                    Cruz Dental Clinic
                </header>
    
    
                <ul>

                    <li>
                        <a href="index.html">
                            <i class="fa-solid fa-house"></i> Dashboard
                        </a>
                    </li>
    
                    <li>
                        <a href="#" class="sched-btn">
                            <i class="fa-solid fa-calendar-days"></i> Schedule
                            <span class="fas fa-caret-down first"></span>
                        </a>
                        <ul class="sched-show">
                            <li><a href="#">Calendar</a></li>
                            <li><a href="#">Schedule List</a></li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#" class="acct-btn">
                            <i class="fa-solid fa-user-group"></i> Accounts
                            <span class="fas fa-caret-down second"></span>
                        </a>
                        <ul class="acct-show">
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-tooth"></i> Dentist
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-user"></i> Patients
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-users-gear"></i> Administrator
                                </a>
                            </li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#about"> <i class="fa-solid fa-money-bill-wave"></i> Billing </a>
                    </li>
                    <li><a href="#announcements"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
                </ul>
    
    
                <div class="logout">
                    <li>
                        <a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
                    </li>
    
                </div>
    
    
    
            </nav>
    
        </div>

        <div class="body_content">
            <h1>Statement of Account</h1>
        </div>

        <?php

        $uid = 2;

        $query = fetchSOADetails($uid);

        $brow = mysqli_fetch_array($query);

        ?>

        
       <div class="form">        
       
            <div class="content">
                <h2>Your Payment Transaction as of</h2>
                <h4> <?php echo $brow["transaction_date"] ?> </h4>
            <br>
            <br>
            <br>
                
        
        <div class="container">
                <div class="view-details">
                     <div class="input-box">
                        <span class="details">Dental Procedure <input type="text" placeholder="" value="<?php echo $brow["type_of_procedure"] ?>" disabled> </span>
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
                        <span class="details">AMOUNT PAID <input type="number" placeholder="" value="<?php echo $brow["total_amount"] ?>" disabled></span>
                    </div>
        </div>
        </div>        
                
                   <div class="container3">
                    <div class="input-box">
                    <span class="details">PENDING BALANCE <input type="number" placeholder="" required></span>
                </div>
            </div>

       </div>
 
        <script>
            $('.sched-btn').click(function() {
                $('nav ul .sched-show').toggleClass("show");
                $('nav ul .first').toggleClass("rotate");
            });
            $('.acct-btn').click(function() {
                $('nav ul .acct-show').toggleClass("show1");
                $('nav ul .second').toggleClass("rotate");
            });
            $('nav ul li').click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            });
    
    
    
            var buttons = document.querySelectorAll(".schedule-tabs .btn-cont button");
            var tabP = document.querySelectorAll(".schedule-tabs .tabPanel");
    
    
            function showPanel(panelIndex, colorCode) {
                buttons.forEach(function(node) {
                    node.style.backgroundColor = "";
                    node.style.color = "";
                });
                buttons[panelIndex].style.backgroundColor = colorCode;
                buttons[panelIndex].style.color = "white";
    
    
                tabP.forEach(function(node) {
                    node.style.display = "none";
                });
                tabP[panelIndex].style.display = "block";
            }
            showPanel(0, '#8d1ecd');
        </script>

        
    </body>
</html>
    
