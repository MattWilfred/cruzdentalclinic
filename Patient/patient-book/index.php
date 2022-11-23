<?php
    include('../Database/sessioncheck.php');
    include('../Database/connect.php');	
    $id = $_SESSION['id'];

    $sql = "SELECT * from users where id = $id";
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while ($row = $result->fetch_assoc()){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];

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
                    <i class='bx bxs-disc nav__icon' ></i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">

                        <a href="/Modules/patient/index.php" class="nav__link active">
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
                                    <a href="" class="nav__dropdown-item">Schedule List</a>
                                   
                                   
                                </div>
                            </div>
                        </div>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon' ></i>
                                <span class="nav__name">Patient Profile</span>
                                
                            </a>

                           
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
        
    
            <!-------  HEADING ------>
            <div class="contain">
            <div class="contain1">
                <p><b>Welcome!</b></p></div>
              <div class="contain2">
                  <h1><b><?php echo $_SESSION['fname'] ?></b></h1></div>
        
             <img src="patientds.png" lt="Trulli" width="75" height="75">
        
                <div class="lefthead-container">
                     
                   <div class="leftcon">
                    <p>Monday,</p>
                    <p>October 24, 2022 - 2:00 P.M.</p>
                   
                </div>
                </div>

            <div class="upcoming-app">
                    <br/>
                    <p id="title"><b>Upcoming Appointment </b></p>
                    <br/>
                
        <div class="container">
        <div class="table-section"> <!--MUST BE ON TABLE FORM-->
    
            <div id="border">
            
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Dental in Charge</th>
                    <th>Type of Appointment</th>
                
                </tr>
                

            <?php
                 //read rows from the database
              $sql = "SELECT * FROM bookings WHERE patient_id ='$id' ";
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
                
                
                    
                    <button class="up-seebutton"><b>See More</b></button>
            </div>
           
                
                
                
                
              
        </div>

      </div>


    <!--Script for calendar-->

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
    </script>

</body>

</html>
