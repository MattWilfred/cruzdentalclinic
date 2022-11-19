<?php
 $mysqli = new mysqli('localhost', 'root', '', 'cruzdentalclinic');

if(isset($_GET['date'])){
    $date = $_GET['date'];
  
    $stmt = $mysqli->prepare("select * from bookings where date=?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
    }
}


// Get all the categories from category table
$sql = "SELECT * FROM `persons`";
$all_categories = mysqli_query($mysqli,$sql);

// The following code checks if the submit button is clicked
// and inserts the data in the database accordingly

if(isset($_POST['submit'])){
    $name = $_POST['Patient'];
    $timeslot = $_POST['timeslot'];
    $drselect = $_POST['Dr'];
    $procedure = $_POST['list'];   

       

    $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, date, doctor, treatment) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $name, $timeslot , $date, $drselect, $procedure);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $bookings[]=$timeslot;
    $stmt->close();
    $mysqli->close();
}


$duration = 60; 
$cleanup = 0;
$start = "09:00";
$end = "16:00";




function timeslots($duration, $cleanup,$start,$end){
    $start = new DateTime ($start);
    $end = new DateTime ($end);
    $interval = new DateInterval("PT".$duration."M");
    $clinterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for ($intStart = $start; $intStart <$end; $intStart ->add($interval)->add($clinterval)){
        $endPeriod = clone $intStart;
        $endPeriod ->add($interval);
        if($endPeriod > $end){
            break;
        }
 
        $slots[] = $intStart->format("h:sa")." - ".$endPeriod->format("h:sa");

    }

    return $slots; 

}


?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookcss.css">
    <link rel="stylesheet" href="indent.css">
    <link rel="stylesheet" href="../css/navstyle.css">
    
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
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
          <a href="../../admin/index.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
        
        
        
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
      <h1>  Select Time For Appointment </h1>
    </div>

    <div class="time">
        <div class="container">

        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="row"> 
                <div class="col-md-12">
                    <?php echo isset ($msg)?$msg:"";?>
                </div>
            </div>
           <?php $timeslots = timeslots($duration, $cleanup, $start,$end);
            foreach($timeslots as $ts){
            ?>
            <div class="col-md-3">
                <div class="form-group"> 
                    <?php if(in_array($ts,$bookings)){ ?>
                    <button class="btn btn-danger"> <?php echo $ts;?> </button>
                    <?php } else{?>
                    <button class="btn btn-success book"  data-timeslot="<?php echo $ts;?>"> <?php echo $ts;?> </button>
                    <?php } ?>
                </div>
            </div>
             
            <?php } ?>

        </div>
        </div> <!-- end here-->

    </div>




<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-group">
                    <h3> Select Procedure type </h3>
        <div class="treatment">
            <ul>
                <li>
                  <input type="checkbox" id="myCheckbox1" name="list" value="Dental Checkup" />
                  <label for="myCheckbox1">Dental Checkup</label>
                </li>
                <li>
                  <input type="checkbox" name="list" id="myCheckbox2" value="Teeth Whitening"/>
                  <label for="myCheckbox2">Teeth Whitening</label>
                </li>
                <li>
                  <input type="checkbox" name="list" id="myCheckbox3" value="Dental Implant" />
                  <label for="myCheckbox3">Dental Implants</label>
                </li>

                <li id=>
                    <input type="checkbox" name="list" id="myCheckbox4" value="Root Canal"/>
                    <label for="myCheckbox4">Root Canal treatment</label>
                  </li>
                  <li>
                    <input type="checkbox" name="list" id="myCheckbox5" vaue="Dental Bridge" />
                    <label for="myCheckbox5">Dental Bridge</label>
                  </li>
                  <li>
                    <input type="checkbox" name="list" id="myCheckbox6" value="orthodontic" />
                    <label for="myCheckbox6">Orthidontics</label>
                  </li>
                  
            </ul>
        </div>

                    <div class="form-group">
                    <label for="">Assigned Dentist </label>
                    <input type= "text" readonly name="Dr" value="Dra. Marites Cruz"  class="form-control">
                        
                    </div>
        

                    <div class="form-group">
                        <label for="">Time Slot </label>
                        <input type= "text" readonly name="timeslot" id="timeslot"  class="form-control">
                    </div>

                    <div class="form-group">

                    <label>Select a Patient</label>
                    <select name="Patient">
                    <?php
                  // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                         while ($category = mysqli_fetch_array(
                                  $all_categories,MYSQLI_ASSOC)):;
                      ?>
                         <option value="<?php echo $category["fname"];
                        // The value we usually set is the primary key
                         ?>">
                        <?php echo $category["fname"];
                        // To show the name to the user
                        ?>
                          </option>
                    <?php
                     endwhile;
                // While loop must be terminated
                  ?>
                  </select>
                 
                    <div class="form-group pull-right ">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
         </div>
      </div>
      
    </div>
    

  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
   <script>
        $(".book").click(function(){
           var timeslot = $(this).attr('data-timeslot');
           $("#slot").html(timeslot); 
           $("#timeslot").val(timeslot);
            $("#myModal").modal('show');
        })
    </script>
</body>

</html>
