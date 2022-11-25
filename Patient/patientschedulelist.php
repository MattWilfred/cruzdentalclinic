<?php
 include('/Database/sessioncheck.php');
 include('/Database/connect.php');	
 $id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang=en dir="ltr">

<head>
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/patientschedulelist-style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <!--========== BOX ICONS ==========-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Dra Marites Cruz Dental Clinic Website</title>

</head>

<body>
    <header class="header">
        <div class="header__container">
            <img src="assets/img/logo dental.png" alt="" class="header__img">

            <a href="#" class="header__logo">Dashboard</a>


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
                    <i class='bx bxs-disc nav__icon'></i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">

                        <a href="/Secretary/index.php" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bxs-calendar nav__icon'></i>

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
                                <i class='bx bx-user nav__icon'></i>
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
                            <i class='bx bx-money nav__icon'></i>
                            <span class="nav__name">Billing</span>
                        </a>
                    </div>

                    <a href="#" class="nav__link">
                        <i class='bx bxs-megaphone nav__icon'></i>
                        <span class="nav__name">Announcement</span>
                    </a>
                </div>

                <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon'></i>
                    <span class="nav__name">Log Out</span>
                </a>
        </nav>
        </div>


        <div class="body_content">
            <div class="page-title">
                <h1>Schedule List</h1>
            </div>

            <?php

        $sql = "SELECT * from bookings WHERE patient_id='$id' AND status= '1'";
        $res = mysqli_query($connection,$sql);
        if(mysqli_num_rows($res)>0){

            while($row = mysqli_fetch_array($res)){

            ?>

            <div class="appointments ">
                <div class="upcoming-app ">


                    <div class="app-body">
                        <div class="col1" style="text-align: center;">
                            <h2>Date</h2>
                            <p><?php echo $row['date'];?></p>
                            
                        </div>
                        <div class="col2">
                            <div class="time">
                                <h4>Time</h4>
                                <h3><?php echo $row['timeslot'];?></h3>
                            </div>
                            <br>
                            <div class="proc">
                                <h4>Procedure</h4>
                                <h3><?php echo $row['treatment']?></h3>
                            </div>
                            <br>

                        </div>
                        <div class="col3">
                            <div class="patient">
                                <h4>Patient</h4>
                                <h3><?php echo $row['name'];?></h3>
                            </div>
                            <br>
                            <div class="stats">
                                <h4>Status</h4>
                                <h3><?php if($row['status']==1){
                                        echo "Upcoming";
                                 } if($row['status'] == 2){ 
                                    echo "Ongoing";
                                 }?>
                                </h3>
                            </div>
                        </div>
                        <div class="col4">
                            
                        <a href="cancel.php?schedid=<?=$row['sched_id'];?>"> <button class="cancelbtn">Cancel</button></a>
                        </div>

                    </div>




                </div>


            </div>
        
            <?php
                                    }

                                }else {
                                  
                                    ?>
                                        <div class="no-presc">
                                            <h5>No prescriptions</h5>
                                        
                                        </div>
                                    <?php
                                }
                                ?>


        </div>

    </div>


    <!--Script for calendar-->

    <script>
        $('.sched-btn').click(function() {
            $('nav ul .sched-show').toggleClass("show ");
            $('nav ul .first').toggleClass("rotate ");
        });
        $('.acct-btn').click(function() {
            $('nav ul .acct-show').toggleClass("show1 ");
            $('nav ul .second').toggleClass("rotate ");
        });
        $('nav ul li').click(function() {
            $(this).addClass("active ").siblings().removeClass("active ");
        });
    </script>

</body>

</html>