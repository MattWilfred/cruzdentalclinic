<?php

    session_start();
   

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

function build_calendar($month, $year) {

    $conn = mysqli_connect("localhost", "root", "", "cruzdentalclinic");  
    $query = "SELECT * FROM holiday";  
    $result = mysqli_query($conn, $query); 
    

    
  
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


  $calendar.= "<a class='btn btn-xs btn-primary' href='calendarnext.php?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='calendarnext.php?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
   $calendar.= "<a class='btn btn-xs btn-primary' href='calendarnext.php?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
     
    
        
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
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-warning btn-md'>Clinic Closed</button>";
        }


        //elseif($date == $holiday){
        elseif(in_array($date, $holiday)){
                $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-secondary btn-md'>Holiday</button>";     
        }

        elseif($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <h5> <br /> </h5>";
         }
         
        else{
          
             $calendar.="<td class='$today'><h4>$currentDay</h4> <p> <br /></p>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="css/calendarbootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/schedulelistbootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/form.css?v=<?php echo time(); ?>" rel="stylesheet">
        
        <link href="indent.css?v=<?php echo time(); ?>" rel="stylesheet">
    </head>

<body>


           
    
<div class="indent">
    <h1> SELECT AN APPOINTMENT</h1>
    
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

            </br>
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