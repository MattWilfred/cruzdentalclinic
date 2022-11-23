<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cruzdentalclinic";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
    die("Connection error!");
}

function fetchDatesToBlock(){
    global $conn;
    $holiday_queries = mysqli_query($conn, "SELECT date FROM holiday");

    $holiday_array = array();

    while ($row = mysqli_fetch_array($holiday_queries)){
        $holiday_array[] = $row['date'];
    }

    return $holiday_array;
}

    session_start();
   
    $id= $_GET['currentid'];
    $item =$_POST['list'];

function build_calendar($month, $year) {


    $id= $_GET['currentid'];
    $item =$_POST['list'];
    $holiday = date('0000-00-00');
    $mysqli = new mysqli('localhost', 'root', '', 'cruzdentalclinic');
    
    
    
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


  $calendar.= "<a class='btn btn-xs btn-primary' href='calendarnext.php?name=$id&treat=$item&month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
   $calendar.= "<a class='btn btn-xs btn-primary' href='calendarnext.php?name=$id&treat=$item&month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
 

//$calendar.= "<a class='btn btn-xs btn-primary' href='#'><</a> ";

  //$calendar.= " <a class='btn btn-xs btn-primary' href='#'>Current Month</a> ";
    
  //$calendar.= "<a class='btn btn-xs btn-primary' href='#'>></a></center><br>";
    
    
        
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

            $holiday = fetchDatesToBlock();

        if($dayname == "sunday"){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-warning btn-lg'>Clinic Closed</button>";
        }

        //elseif($date == $holiday){
        elseif(in_array($date, $holiday)){
          $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-lg'>Holiday</button>";     
        }
        
        elseif($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-lg'>N/A</button>";
         }      else{
          
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=$date&id=$id&treat=$item' class='btn btn-success btn-lg book'>Book</a>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--========== CSS ==========-->
        <link href="css/calendarbootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/schedulelistbootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/form.css?v=<?php echo time(); ?>" rel="stylesheet">
        
        <link href="indent.css?v=<?php echo time(); ?>" rel="stylesheet">
        <title>Admin Module</title>

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

   <!--========== HEADER ==========-->

  <!--========== NAV ==========-->
  <div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="#" class="nav__link nav__logo">
           <i class='nav__icon'>
           <img class="header__img" src="/Modules/admin/assets/img/logo dental.png" alt="" style=width:50px;height:50px;>
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                <a href="/Modules/admin/index.php" class="nav__link active">
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
                                <a href="/Modules/admin/php-calendar/select.html" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/admin/php-calendar/select.html" class="nav__dropdown-item">Schedule List</a>
                               
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
                                <a href="../Secretary/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Secretary</a>
                                <a href="../Secretary/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
                                <a href="../Secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="#" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="announcement/announcement.php" class="nav__link">
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

      <!--sidebar end-->
  




    
    <div class="indent">
        
     </div>
  
     
 
<?php


// optional
// echo "You chose the following color(s): <br>";



?>

    </div>
    <form action="book.php">
        <input type="hidden" name="treatment" value="<?php $list?>">
        <input type="hidden" name="id" value="<?php $id?>">
    </form>

   
    <div class="body-calen">
    <div class="container">
        <div class="row">
            
            
            <div class="col-md-14">
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

            </br>
        </div>
           
      

                     
    </div>
    
    </div>
       <!-- FORM FOR BLOCK  -->
  <div class="add-btn"><a class="button" href="#divOne">Block a Date</a></div>
        
        <div class="overlay" id="divOne">
                 <div class="wrapper">
                
         <div class="form">
             
                 <label><b>Title:</b></label>
                 <input type="text" required>
             <br><br><br>
                 
             <label><b>Block a date:</b></label>   
                <input type="date" name="bdate" required>
             <br>
             
    
                 
                 

             <div>
             <button onclick="" id="cancel-btn">CANCEL</button>
             <input type="submit" value="BLOCK" id="block-btn" name="block"></input>
             </div>
                 
            </div>
         </div>

     

</body>

</html>

<script>
     $(".block").click(function(){
            $("#exampleModal").modal('show');
        })

</script>
<script src="/Modules/admin/assets/js/main.js"></script>
