<?php
require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
include('/Database/sessioncheck.php');

$id=$_SESSION['id'];


//include_once 'userlogs.php';


if (!$connection){
  die("Connection error!");
}

function fetchSOADetails($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT * FROM transaction AS a INNER JOIN statement_of_account AS b ON a.user_id=b.user_id
    WHERE a.user_id = $uid ");
    return $soa;
}

function fetchUserTransactions($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT * FROM transaction AS a INNER JOIN statement_of_account AS b ON a.user_id=b.user_id
    WHERE a.user_id = $uid");
    return $soa;
}

function fetchUserDetails($uid){
    global $connection;
    $soa = mysqli_query($connection, "SELECT * FROM users_credentials WHERE user_id=$uid");
    return $soa;
}

?>

<!DOCTYPE html>

<html lang=en dir="ltr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="soa-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Statement of Account</title>


</head>

<body>
 
    
    <!--========== HEADER ==========-->
    <header class="header">
          <div class="header__container">
          <img class="header__img" src="/Patient/assets/img/logo dental.png" alt="">

              <a href="#" class="header__logo">Cruz Dental Clinic</a>
  
  
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
            <i class='nav__icon'>
            <img src="/Patient/assets/img/logo dental.png" alt="" class="header__img">
            </i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">

                        <a href="/Patient/index.php" class="nav__link active">
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
                                    <a href="/Patient/patient-book/patient-booking.php" class="nav__dropdown-item">Calendar</a>
                                    <a href="/Patient/patientschedulelist.php" class="nav__dropdown-item">Schedule List</a>
                                
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
                                    <a href="/Patient/PatientAccount/appthistory.php?id=<?php echo $id;?>" class="nav__dropdown-item">Profile</a>
                                
                                </div>
                            </div>
                        </div>


                        <a href="/Patient/statement_of_account.php" class="nav__link">
                            <i class='bx bx-money nav__icon' ></i>
                            <span class="nav__name">Billing Transaction</span>
                        </a>
                    </div>

                    <a href="/Patient/announcement/announcement.php" class="nav__link">
                        <i class='bx bxs-megaphone nav__icon'></i>
                        <span class="nav__name">Announcement</span>
                    </a>
                </div>

            <a href="/LoginPage/login-page.php" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon' ></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>




        <div class="body_content">
            <br />
            <h1>Statement of Account</h1>
        </div>



        <div class="container">
            <?php
         
            $uquery = fetchUserDetails($id);
            $result = mysqli_query($connection,$id);
    
            $sql = "SELECT * from users where id = $id";
            $details = mysqli_query($connection,$sql);
    
            if(mysqli_num_rows($details)>0){
                while ($row = $details->fetch_assoc()){
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $gender = $row['gender'];
                    $phone = $row['phonenumber'];
                    $bday = $row['birthdate'];
                    $address = $row['paddress'];

                }
            }
            
                ?>

       

            <div class="patient-info">
                <div class="info-header">
                    <img src="user-logo.png" alt="user logo">
                    <h1>
                        <?php echo $fname ?> 
                            <?php echo $lname ?>  
                    </h1>
                    <p class="pemail">
                        <?php echo $email ?> 
                    </p>

                </div>


                <div class="username">
                    <span>Username</span>
                    <p>
                         <?php echo $username ?> 
                    </p>
                </div>
                <div class="gender">
                    <span>Gender</span>
                    <p>
                       <?php echo $gender ?> 
                    </p>
                </div>
                <div class="phone">
                    <span>Phone</span>
                    <p>
                           <?php echo $phone ?> 
                    </p>
                </div>
                <div class="bday">
                    <span>Birthday</span>
                    <p>
                        <?php echo $bday ?>
                    </p>
                </div>
                <div class="address">
                    <span>Address</span>
                    <p>
                        <?php echo $address ?> 
                    </p>
                </div>

                

            </div>
            <?php

//}

$squery = fetchSOADetails($id);
$tquery = fetchUserTransactions($id);


$trow = mysqli_fetch_array($tquery);
$srow = mysqli_fetch_array($squery);

?>

            <div class="soa">
                <div>
                    <h4>
                        Your remaining balance:
                    </h4>
                    <h1 style="margin-left: 5% ;">
                        P <?php echo $srow["balance"] ?>.00
                        <!--P 14,000.00 -->
                    </h1>
                </div>
                <h5 style="margin-top: 3% ;">History of Payments</h5>
                <div class="hpayment">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Procedure</th>
                                <th>Other Charges</th>
                                <th>Total</th>
                                <th>Amount Paid</th>
                                <th>Transaction Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <?php while($rows= mysqli_fetch_assoc($tquery)){

                            $singleBalance = $rows['total_amount'] - $rows['amount_paid'];

                            echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" .$rows['transaction_date']. "</td>";
                                    echo "<td>" .$rows['type_of_procedure']. "</td>";
                                    echo "<td>" .$rows['other_charges']. "</td>";
                                    echo "<td>" .$rows['total_amount']. "</td>";
                                    echo "<td>" .$rows['amount_paid']. "</td>";
                                    echo "<td>" .$rows['transaction_type']. "</td>";
                                    echo "<td>" .$rows['status']. "</td>";
                                echo "</tr>";
                            echo "</tbody>";

                        }

                        ?>

                    </table>
                </div>

            </div>








            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>
</html>