<?php
       require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
       $id = $_SESSION['id'];
   
       $sql = "SELECT * from users where id = $id";
       $result = mysqli_query($connection,$sql);
       if(mysqli_num_rows($result)>0){
           while ($row = $result->fetch_assoc()){
               $fname = $row['fname'];
               $lname = $row['lname'];
               $email = $row['email'];
               $gender = $row['gender'];
               $birthdate = $row['birthdate'];
               $num = $row['phonenumber'];
               $uname = $row['username'];
               $address = $row['paddress'];
               $email = $row['email'];
   
           }
        }
?>
<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="css/style.css">
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

                        <a href="/Modules/secretary/index.php" class="nav__link active">
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
                                    <a href="patient-book/patient-booking.php" class="nav__dropdown-item">Calendar</a>
                                    <a href="patientschedulelist.php" class="nav__dropdown-item">Schedule List</a>


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
                                    <a href="/Patient/PatientAccount/appthistory.php?id=<?php echo $id;?>" class="nav__dropdown-item">Profile</a>

                                </div>
                            </div>
                        </div>


                        <a href="#" class="nav__link">
                            <i class='bx bx-money nav__icon'></i>
                            <span class="nav__name">Billing</span>
                        </a>
                    </div>

                    <a href="/Patient/announcement/announcement.php" class="nav__link">
                        <i class='bx bxs-megaphone nav__icon'></i>
                        <span class="nav__name">Announcement</span>
                    </a>
                </div>

                <a href="/LoginPage/login-page.php" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon'></i>
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
                            <h2><?php echo $fname;?></h2>
                            <p style="font-style: italic; "><?php echo $email;?></p>
                        </div>

                    </div>

                    <div class="patient-info ">
                        <div class="row1">
                            <div>
                                <h5>Gender</h5>
                                <h3><?php echo $gender;?></h3>
                            </div>
                            <div>
                                <h5>Birthdate</h5>
                                <h3><?php echo $birthdate;?> </h3>
                            </div>
                            <div>
                                <h5>Phone Number</h5>
                                <h3><?php echo $num;?></h3>
                            </div>
                        </div>
                        <br>
                        <div class="row2">
                            <div>
                                <h5>Username</h5>
                                <h3><?php echo $uname;?></h3>
                            </div>
                            <div>
                                <h5>Address</h5>
                                <h3><?php echo $address;?></h3>
                            </div>
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
                 //read rows from the database
              $sql = "SELECT * FROM bookings WHERE patient_id ='$id' AND status= '1' ";
              $result = $connection->query($sql);

        
              if (!$result){
                  die("Invalid query: " . $connection->error);
              }

              if(mysqli_num_rows($result) > 0)
                              {
                                  foreach($result as $users)
                                  {
                                      ?>
                                      <tr>
                                          <td><?= $users['date'];?></td>
                                          <td><?= $users['timeslot'];?></td>
                                          <td><?= $users['doctor'];?> </td>
                                          <td><?= $users['treatment'];?> </td>
                                         
                                      </tr>
                                      <?php
                                  }
                              }
                              else
                              {
                                  echo "<h5> No Record Found </h5>";
                              }
    
            ?>
   
            </table>
        
                                </div>
                            </div>
                        </div>
                        <a href="patientschedulelist.php"><button class="up-seebutton "><b>See More</b></button></a>
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