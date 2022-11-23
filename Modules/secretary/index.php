<?php
    include('../../Database/sessioncheck.php');
    include('../../Database/results.php');
    include('../../Database/connect.php');
    
 $query = "SELECT * FROM bookings  ORDER BY sched_id AND timeslot asc LIMIT 5";  
 $result = mysqli_query($connection, $query);  
 $query = "SELECT * FROM announcement  ORDER BY date LIMIT 5";  
 $dateresult = mysqli_query($connection, $query);  


 $id = $_SESSION['id'];
    
 $sql = "SELECT * from users where id = $id";
 $uname = mysqli_query($connection,$sql);
 if(mysqli_num_rows($uname)>0){
     while ($row = $uname->fetch_assoc()){
         $fname = $row['fname'];
         $lname = $row['lname'];
         $email = $row['email'];
      

     }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--========== CSS ==========-->
<link rel="stylesheet" href="assets/css/styles.css">

<link rel="stylesheet" href="css/all.min.css">
<!--========== BOX ICONS ==========-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
     <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="dashboardstyle.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>




<body>
    

    <!--========== HEADER ==========-->
    <header class="header">
    <div class="header__container">
        <a href="/Modules/secretary/index.php" class="header__logo">Cruz Dental Clinic</a>
        
      
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
                        <a href="/Modules/secretary/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/secretary/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/secretary/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                <a href="/Modules/secretary/blockdate.php" class="nav__dropdown-item">Block Date</a>
                              
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
                                <a href="/Modules/secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
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




    

 <div class="indent">
  <div class="container">

    <div class="main-body">
      <h2>Dashboard</h2>
      <div class="promo_card">
        <h1>Welcome <?php echo $fname ." ". $lname;?>!</h1>
        <a href="/Modules/secretary/Accounts/SecretaryAccount/view.php?id=<?php echo $id;?>"><button>View Profile</button></a>
        <h3 id="date">Date Today: <span id="date-time"></span></h3>
      </div>

      <br />

      <div class="appt_lists">
        <div class="upcoming">
            <p id="heaad">Total Upcoming Appointments</p>    
            <div class="row1">
                <h1><?php overalltotalUpcomingApt();?> </h1>
            </div>
        </div>

        <div class="Appointments">
            <p id="heaad">Total Appointments</p>    
            <div class="row1">
                <h1><?php overalltotalAppt(); ?></h1>
            </div>
        </div>

        <div class="patients">
            <p id="heaad">Total Patients</p>    
            <div class="row1">
                <h1><?php overalltotalPatients();?></h1>
            </div>
        </div>
      </div>
      
      <div class="history_lists">
        <div class="list1">
          <div class="row">
            <h4>Upcoming Appointments</h4>
            <a href="/Modules/secretary/php-calendar/schedule-list.php">See all</a>
          </div>
          <table id="tbl_appt">
            <thead>
              <tr>
          
                  <th id="appt_th">Date</th>
                  <th id="appt_th">Time</th>
                  <th id="appt_th">Dental in Charge</th>
                  <th id="appt_th">Type of Appointment</th>
              </tr>
            </thead>
            <tbody>

            <?php 
               while($row = mysqli_fetch_array($result))  
               {  
               ?>  
             
              <tr>
     
                <td id="appt_td"><?php echo $row['date']?></td>
                <td id="appt_td"><?php echo $row['timeslot']?></td>
                <td id="appt_td"><?php echo $row['doctor']?></td>
                <td id="appt_td"><?php echo $row['treatment']?></td>
              </tr>

              <?php
               }
              ?>
              </tbody>
          </table>


       </div>

     
    
        
    </div>
</div>
<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>

</body>
</html>
