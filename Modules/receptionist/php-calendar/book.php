<?php
require "compute.php";
$userid = $_GET['id'];
$dentistid= $_GET['dentist'];
$treat = $_GET['treat'];
$newtime=0;
$newtime1=0;
$SS= date("h:i");


$mysqli = new mysqli('localhost', 'root', '', 'cruzdentalclinic');

if(isset($_GET['date'])){
    
  $date = $_GET['date'];
  $dentistid= $_GET['dentist'];
  
    $stmt = $mysqli->prepare("select * from bookings where dentist_id='$dentistid' and date=?");
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



// Get name of user depending on the userid from users table
$sql = "SELECT * FROM `users` WHERE id= '$userid'";
$all_categories = mysqli_query($mysqli,$sql);

// Get information of the dentist based on id.
$sql = "SELECT * FROM `users` WHERE id= '$dentistid' AND accrole ='Dentist'";
$find_dentist = mysqli_query($mysqli,$sql);

$sql = "SELECT * FROM `users` WHERE id= '$dentistid' AND accrole ='Dentist'";
$id_dentist = mysqli_query($mysqli,$sql);

$sql = "SELECT * FROM `users` WHERE id= '$userid' AND accrole ='Patient'";
$id_patient = mysqli_query($mysqli,$sql);



// The following code checks if the submit button is clicked
// and inserts the data in the database accordingly
if(isset($_POST['submit'])){
    $name = $_POST['Patient'];
    $timeslot = $_POST['timeslot'];
    $drselect = $_POST['Dr'];
    $dentist_id_fk = $_POST['dID'];
    $patient_id_fk = $_POST['pID'];
    $procedure = $_POST['list'];   
    $status = $_POST['status'];

       

    $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, date, doctor, treatment,status, dentist_id, patient_id) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss', $name, $timeslot , $date, $drselect, $procedure, $status, $dentist_id_fk, $patient_id_fk);
    $stmt->execute();
    //$msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $bookings[]=$timeslot;
    $stmt->close();
    $mysqli->close();

    echo  "<script> alert('Booked Successfully'); window.location='/Modules/receptionist/index.php'; </script>";
}

$newtime = computer($treat);


//AM
$duration = $newtime; 
$cleanup = 0;
$start = "8:00";
$end = "12:30";

//PM
$duration1 = $newtime; 
$cleanup1 = 0;
$start1 = "14:00";
$end1 = "18:30";


function timeslotsAM($duration, $cleanup,$start,$end){
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
 
        $slots[] = $intStart->format("h:i:a")." - ".$endPeriod->format("h:i:a");

    }

    return $slots; 

}

function timeslotsPM($duration1, $cleanup1,$start1,$end1){
  $start1 = new DateTime ($start1);
  $end1 = new DateTime ($end1);
  $interval1 = new DateInterval("PT".$duration1."M");
  $clinterval1 = new DateInterval("PT".$cleanup1."M");
  $slots1 = array();

  for ($intStart = $start1; $intStart <$end1; $intStart ->add($interval1)->add($clinterval1)){
      $endPeriod = clone $intStart;
      $endPeriod ->add($interval1);
      if($endPeriod > $end1){
          break;
      }

      $slots1[] = $intStart->format("h:i:a")." - ".$endPeriod->format("h:i:a");

  }

  return $slots1; 

}


?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookcss.css">
    <link rel="stylesheet" href="Book.Bootstrap.min.css?v=<?php echo time(); ?>">

    <title></title>

   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    
  </head>

  <body>




  
    

    <div class="indent">
    <h1 style='text-align:center;'> Select Time For Appointment </h1>
      <h1 style='text-align:center;'>Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
    </div>

    <div class="time">
        <div class="container">

        
        <div class="row">
            <div class="row"> 
                <div class="col-md-12">
                    <?php echo isset ($msg)?$msg:"";?>
                </div>
            </div>
          
            <h1>MORNING SCHEDULE</h1><hr>
           <?php $timeslots = timeslotsAM($duration, $cleanup, $start,$end);
                // $timeslots1 = timeslotsPM($duration1, $cleanup1, $start1,$end1);  
              foreach($timeslots as $ts){
            ?>
           
           <br><br>
            <div class="col-md-4">
                <div class="form-group"> 
                    <?php if(in_array($ts,$bookings)){ ?>
                    <button class="btn btn-secondary"> <?php echo $ts;?> </button>
                    <?php } else{?>
                    <button class="btn btn-success book"  data-timeslot="<?php echo $ts;?>"> <?php echo $ts;?> </button>
                    <?php } ?>
                </div>
            </div>
             
            <?php } ?>
            </div>
            
            <br><br>     <br><br>
          <div class ="row">
              </br>
            <h1>AFTERNOON SCHEDULE</h1><hr>

            <?php $timeslots1 = timeslotsPM($duration1, $cleanup1, $start1,$end1);
                // $timeslots1 = timeslotsPM($duration1, $cleanup1, $start1,$end1);  
              foreach($timeslots1 as $ts1){
            ?>    <br><br>
           
           
            <div class="col-md-4">
                <div class="form-group"> 
                    <?php if(in_array($ts1,$bookings)){ ?>
                    <button class="btn btn-secondary btn-md"> <?php echo $ts1;?> </button>
                    <?php } else{?>
                    <button class="btn btn-success book"  data-timeslot="<?php echo $ts1;?>"> <?php echo $ts1;?> </button>
                    <?php } ?>
                </div>
            </div>
             
            <?php } ?>

            </div>
          </div>

          


        </div> <!-- end here-->

    </div>




<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
   
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-11">
                <form action="" method="POST">
                    <div class="form-group">
                    <h3> Appointment Summary</h3>
                      
                    <div class="form-group">
                      
                    <?php
                  // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                         while ($category = mysqli_fetch_array(
                                  $all_categories,MYSQLI_ASSOC)):;
                      ?>
                        <label for="">Patient Name </label>
                    <input type= "text" readonly name="Patient" value="<?php echo $category['fname']; echo $category['lname']  ;?>"  class="form-control">
                        
                    <?php
                     endwhile;
                // While loop must be terminated
                 
                   ?> 
                   
                    </div>


                    <div class="form-group">
                      
                    <?php
                    // use a while loop to fetch data
                    // from the $fiind_Dentist variable
                    // and individually display as an option
                         while ($find = mysqli_fetch_array(
                                  $find_dentist,MYSQLI_ASSOC)):;
                      ?>
                        <label for="">Dentist Name </label>
                    <input type= "text" readonly name="Dr" value="<?php echo $find['fname'];  echo $find['lname']; ?>"  class="form-control">
                        
                    <?php
                     endwhile;
                // While loop must be terminated
                 
                   ?> 
                   
                    </div>  


                    <div class="form-group">
                      
                    <?php
                    // use a while loop to fetch data
                    // from the $all_categories variable
                    // and individually display as an option
                         while ($find = mysqli_fetch_array(
                                  $id_dentist,MYSQLI_ASSOC)):;
                      ?>
                      
                    <input type= "hidden" readonly name="dID" value="<?php echo $find['id']; ?>"  class="form-control">
                        
                    <?php
                     endwhile;
                // While loop must be terminated
                 
                   ?> 
                   
                    </div>




                    <div class="form-group">
                      
                      <?php
                    // use a while loop to fetch data
                  // from the $all_categories variable
                  // and individually display as an option
                           while ($find = mysqli_fetch_array(
                                    $id_patient,MYSQLI_ASSOC)):;
                        ?>
                        
                      <input type= "hidden" readonly name="pID" value="<?php echo $find['id']; ?>"  class="form-control">
                          
                      <?php
                       endwhile;
                  // While loop must be terminated
                   
                     ?> 
                     
                      </div>
  



                  <div class="treatment">
                  <label for="">Treatment</label>
                  <input type="text" readonly name="list" value="<?php echo $treat;?>"  class="form-control"/>
                 
                  </div>

                  
                   
                  
                  
                  
                  

                    <div class="form-group">
                        <label for="">Time Slot </label>
                        <input type= "text" readonly name="timeslot" id="timeslot"  class="form-control">
                    </div>

                    <div class="form-group">
                        <input type= "hidden" readonly name="status" id="status"  class="form-control" value="1">
                    </div>

                 
                    <div class="form-group pull-right ">
                        <button class="btn btn-primary" type="submit" name="submit">Confirm Appointment</button>
                    </div>
                </form>
            </div>
         </div>
      </div>
      
    </div>
    

  </div>
</div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
