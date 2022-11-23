<?php
 
function build_calendar($month, $year) {
   
    $mysqli = new mysqli('localhost', 'root', '', 'cruzdentalclinic');
   /* $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            
            $stmt->close();
        }
    }*/
    
    
     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

     // What is the first day of the month in question?
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);

     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);

     // What is the name of the month in question?
     $monthName = $dateComponents['month'];

     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];

     // Create the table tag opener and day headers

     
    $datetoday = date("Y-m-d");
    
    
    
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    
    
        
      $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {
          // Seventh column (Saturday) reached. Start a new row.

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";

            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
         }      else{
          
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?  date=".$date."' class='btn btn-success btn-xs' name='submit'>Book</a>";
         }
            
         
          $calendar .="</td>";
          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;
     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

         }

     }
     
     $calendar .= "</tr>";

     $calendar .= "</table>";

     echo $calendar;

}
    
?>


<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="indent.css">
    <link rel="stylesheet" href="../css/navstyle.css">
    <style>
       @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;

            }
            
            

            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:yellow;
        }
        
        
        
    </style>
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
              <a href="php-calendar/index.php"><i class="fas fa-envelope"></i><span>Calendar</span></a>
              <a href="ScheduleList.html"><i class="fas fa-envelope-square"></i><span>Schedule List</span></a>
             
          </div>
        </div>
  </div>
  
  <div class="menu"> 
    <div class="item">
   <a class="sub-btn"><i class="fa-solid fa-user-group"></i>Accounts<i class="fas fa-caret-down drop-down"></i></a>
   <div class="sub-menu">
       <a href="DentistAccount/index.php"><i class="fas fa-envelope"></i><span>Dentist</span></a>
       <a href="PatientAccount/patientlist.php"><i class="fas fa-envelope-square"></i><span>Patients</span></a>
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
  




    
    <div class="indent">
    <h1> SELECT AN APPOINTMENT</h1>
    </div>
   
    <div class="body-calen">
    <div class="container">
        <div class="row">
            
            
            <div class="col-md-12">
                <?php
                     //$pid = $_POST['id']; 
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                    echo build_calendar($month,$year);
                ?>

            </div>
        </div>
    </div>
    </div>
</body>

</html>
