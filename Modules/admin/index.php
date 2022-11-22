<?php
    include ('/Database/connect.php');
    include ('/Database/results.php');
    include('/Database/sessioncheck.php');

    $id = $_SESSION['id'];
    
    $sql = "SELECT * from users where id = $id";
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while ($row = $result->fetch_assoc()){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
         

        }
     }

 $query = "SELECT * FROM bookings WHERE dentist_id='$id' LIMIT 5";  
 $result = mysqli_query($connection, $query);  

?>
<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/receptionistdashboard-style.css">
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
            <img src="/Modules/admin/assets/img/logo dental.png" alt="" class="header__img">

            <a href="#" class="header__logo">Dashboard</a>


            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

        <!--========== HEADER ==========-->
        <header class="header">
        <div class="header__container">
            <img src="/Modules/secretary/assets/img/logo dental.png" alt="" class="header__img">
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
               <img src="/Modules/secretary/assets/img/logo dental.png" alt="" class="header__img">
               </i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">

                        <a href="/Modules/secretary/index.php" class="nav__link active">
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
                                    <a href="/Modules/secretary/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                    <a href="/Modules/secretary/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                   
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


                        <a href="/Modules/secretary/billing/billing.php" class="nav__link">
                            <i class='bx bx-money nav__icon' ></i>
                            <span class="nav__name">Billing</span>
                        </a>
                    </div>

                    <a href="/Modules/secretary/announcement/announcement.php" class="nav__link">
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


            <!-------  HEADING ------>
            <div class="contain">

                <div class="patient">
                    <div class="patient-profile">
                        <div class="ppic">
                            <img src="313514291_666959545047725_4590859755006017896_n (1).jpg" alt="image" style="width: 90px" height="90px">
                            <h2><?php echo $fname." ". $lname?></h2>
                        </div>

                    </div>


                    <div class="patient-info ">
                        <div class="col1">
                            <div>
                                <h3>Upcoming Appointments</h3>
                                <p><?php totalUpcomingAppmts();?></p>
                            </div>
                        </div>
                        <div class="col2">
                            <div>
                                <h3>Total Appointments</h3>
                                <p><?php total();?></p>
                            </div>
                        </div>
                        <div class="col3">
                            <div>
                                <h3>Total No. of Patients</h3>
                                <p><?php totalPatients();?></p>
                            </div>
                        </div>



                    </div>
                    <div class="patient-profile">
                        
                    <h4> Announcement </h4>
                        <div class="anncs">
                        <?php
                              

                                $query_presc = "SELECT * from announcement LIMIT 2";
                                $res = mysqli_query($connection,$query_presc);

                                if(mysqli_num_rows($res)>0){

                                    while($row = mysqli_fetch_array($res)){
                                    
                        ?>
                        
                            <h3> TITLE: <?php echo $row['title']?></h3>
                            <p><?php echo $row['message']?></p>


                            <?php
                                    }

                                }else {
                                  
                                    ?>
                                        <div class="no-presc">
                                            <h5>No Announcement</h5>
                                        
                                        </div>
                                    <?php
                                }
                                ?>
                            

                            <button class="annc-btn"><b>View</b></button>
                            </div>
  
                           
                       
                    </div>

                </div>


                <div class="appointments ">
                    <div class="upcoming-app ">
                        <br/>
                        <p id="title "><b>Upcoming Appointments </b></p>

                        <div class="container">

                            <div class="table-section ">
                                <!--MUST BE ON TABLE FORM-->

                                <div id="border ">

                                    <table class="table table-borderd">
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Dental in Charge</th>
                                            <th>Type of Appointment</th>
                                        </tr>
                                    
                                        <?php  
                                        while($row = mysqli_fetch_array($result))  {  
                                         ?>  
                                            <tr>  
                                                <td><?php echo $row["date"]; ?></td>  
                                                 <td><?php echo $row["timeslot"]; ?></td>  
                                                <td><?php echo $row["doctor"]; ?></td>  
                                                <td><?php echo $row["treatment"]; ?></td>  
                                                
                                            <tr>
                                            <?php  
                                         }  
                                        ?>    

                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button class="up-seebutton "><b>See More</b></button>
                    </div>


                </div>







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