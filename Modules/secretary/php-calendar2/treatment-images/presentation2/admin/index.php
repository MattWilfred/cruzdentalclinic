<?php
    include('connect.php');
    include('results.php');
?>

<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="css/navstyle.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src ="script/navscript.js"></script>
 
    <title>Dra Marites Cruz Dental Clinic Website</title>

</head>

<body>
 <!--mobile navigation bar start-->
 <div class="mobile_nav">
        <div class="nav_bar">
          <div class="left_area">
            <h3>Cruz Dental <span>Clinic</span></h3>
          </div>
          <i class="fa fa-bars nav_btn"></i>
        </div>
  
        <div class="mobile_nav_items">
          <a href="index.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
        
        
        
        <div class="menu"> 
           <div class="item">
          <a class="sub-btn"><i class="fa-solid fa-calendar-days"></i>Schedule<i class="fas fa-caret-down drop-down"></i></a>
          <div class="sub-menu">
              <a href="calendar.php"><i class="fas fa-envelope"></i><span>Calendar</span></a>
              <a href="ScheduleList.html"><i class="fas fa-envelope-square"></i><span>Schedule List</span></a>
             
          </div>
        </div>
  </div>
  
  <div class="menu"> 
   
    <div class="item">
      
   <a class="sub-btn"><i class="fa-solid fa-user-group"></i>Accounts<i class="fas fa-caret-down drop-down"></i></a>
   <div class="sub-menu">
       <a href="DentistAccount/index.php"><i class="fas fa-envelope"></i><span>Dentist</span></a>
       <a href="PatientAccount/index.php"><i class="fas fa-envelope-square"></i><span>Patients</span></a>
       <a href="AdminAccount/index.php"><i class="fas fa-envelope-square"></i><span>Administrator</span></a>
      
   </div>
  </div>
  </div>
  
        <a href="#"><i class="fa-solid fa-money-bill-wave"></i><span>Billing </span></a>
        <a href="announcement.php"><i class="fa-solid fa-bullhorn"></i><span>Announcements</span></a>
       
        <div class="logout">
          <li><a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a></li>
          
      </div>
        </div>
      </div>
      <!--mobile navigation bar end-->
      <!--sidebar start-->
      <div class="sidebar">
  
        <header>
          <div class="left_area">
           <img src="logo dental.png" alt="logo"><h3>Cruz Dental <span>Clinic</span></h3>
          </div>
        </header>
  
       
  
  
        <br><br><br><br><br><br>
        <a href="index.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
        <div class="menu"> 
           <div class="item">
          <a class="sub-btn"><i class="fa-solid fa-calendar-days"></i>Schedule<i class="fas fa-caret-down drop-down"></i></a>
          <div class="sub-menu">
              <a href="php-calendar/select.html"><i class="fas fa-envelope"></i><span>Calendar</span></a>
              <a href="ScheduleList.html"><i class="fas fa-envelope-square"></i><span>Schedule List</span></a>
             
          </div>
        </div>
  </div>
  
  <div class="menu"> 
    <div class="item">
   <a class="sub-btn"><i class="fa-solid fa-user-group"></i>Accounts<i class="fas fa-caret-down drop-down"></i></a>
   <div class="sub-menu">
       <a href="DentistAccount/index.php"><i class="fas fa-envelope"></i><span>Dentist</span></a>
       <a href="PatientAccount/patient-list.php"><i class="fas fa-envelope-square"></i><span>Patients</span></a>
       <a href="AdminAccount/index.php"><i class="fas fa-envelope-square"></i><span>Administrator</span></a>
      
   </div>
  </div>
  </div>
  
        <a href="#"><i class="fa-solid fa-money-bill-wave"></i><span>Billing </span></a>
        <a href="announcement.php"><i class="fa-solid fa-bullhorn"></i><span>Announcements</span></a>
       
        <div class="logout">
          <li><a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a></li>
          
      </div>
      </div>
      <!--sidebar end-->
  

    

    <div class="body_content">
        
            <h1>Dashboard</h1>
            <br/>
                  <!-------  LINE CHART ------>
                <div class = "charts">
                <div class = "chart">
                    <canvas id="lineChart" width="50" height="20"></canvas>
                </div>
            
            
            <!--BOX CONTAINET FOR TOTAL APPOINTMENTS AND CANCEL APPOINTMENTS-->
            <div class="grid-container">

                <div class="grid-child magenta">
                    <p id="title"><b>Confirmed Appointment </b></p>
                  <br/>
                    <!--Total Appointments NUMBER-->
                    <p>0</p>

                </div>
                
                <div class="grid-child green">
                    <p id="title"><b>Cancelled Appointment </b></p>
                  <br/>
                  <!--Total Cancel Appointments NUMBER-->
                  <p>0</p>
                </div>
                
            </div>


        
        <div class="flex-container">
                
                <div class="flex-upcoming">
                    <p id="title"><b>Upcoming Appointment </b></p>
                  <br/>
                    <!--Upcoming Appointment NUMBER-->
                    <p><?php total();?></p>
                    
                    <button class="up-seebutton"><b>See More</b></button>
                </div>
                
                <div class="flex-total">
                    <p id="title"><b>Total No. of Patients this Week </b></p>
                  <br/>
                  <!--Total Appointments this week NUMBER-->
                  <p><?php patient();?></p>
                    <br/>
                    <br/>
                    <p id="title"><b>Total No. of Patients </b></p>
                  <br/>
                  <!--Total No of Patients NUMBER-->
                  <p>111</p>
                    
                    <button class="tnop-seebutton"><b>See More</b></button>
                </div>
            
              
                 
            
        </div>
              
            
          
                
        
        
        
        
        
        
        
    </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>>
        <script src="chart1.js"></script>> 


</body>

</html>
