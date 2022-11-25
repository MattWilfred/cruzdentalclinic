<?php
  //include_once 'userlogs.php';

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "w";
$dbName = "cruzdentalclinic";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
  die("Connection error!");
}

function displayCardData(){
    global $conn;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $cardData = mysqli_query($conn, "SELECT a.*, b.dentist_first_name, b.dentist_surname, p.patient_first_name, p.patient_surname FROM appointment AS a INNER JOIN dentist b ON a.dentist_id = b.dentist_id INNER JOIN patients p ON a.patients_id = p.patients_id");
    return $cardData;
  }
?>

<!DOCTYPE html lang=e n dir="ltr">
<html>
    <head>
        <link rel="stylesheet" href="css/scheduleList.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Cruz Dental Clinic Website</title>
    </head>
    <body>
        <div>
            <nav>
    
                <header>
                    <div class="logo"> <img src="logo dental.png" alt="dental logo"></div>
                    Cruz Dental Clinic
                </header>
    
    
        <ul>
             <li>
                <a href="index.html">
                    <i class="fa-solid fa-house"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="#" class="sched-btn">
                    <i class="fa-solid fa-calendar-days"></i> Schedule
                    <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="sched-show">
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="ScheduleList.html">Schedule List</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="acct-btn">
                    <i class="fa-solid fa-user-group"></i> Accounts
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="acct-show">
                    <li><a href="patient.html">Profile</a></li>
                    <li><a href="#">Patients List</a></li>
                </ul>
            </li>

            <li><a href="announcement.html"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
        </ul>
    
    
                <div class="logout">
                    <li>
                        <a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
                    </li>
    
                </div>
    
    
    
            </nav>
    
        </div>

        <div class="body_content">
            <h1>Schedule List</h1>
        </div>

        <div class="container">
    
            <div class="schedule-tabs">
                <div class="btn-cont">
                    <button type="button" class="btn btn-outline-primary">Upcoming</button>
                    <button type="button" class="btn btn-outline-primary">Cancelled</button>
                    <button type="button" class="btn btn-outline-primary">Ongoing</button>
                    <button type="button" class="btn btn-outline-primary">Ended</button>
        
                </div>
            </div>
        </div>
    <br>
    <br>
        <div class="table-section"> <!--MUST BE ON TABLE FORM-->

        <div?
    
            <div id="border">
            <table>
            
    
                <tr>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Name of Patient</th>
                    <th>Procedure Type</th>
                    <th>Name of Dentist</th>
                </tr>

                <?php
                $result = displayCardData();
                $count = 0;
                while($rows= mysqli_fetch_assoc($result))
                { 
                ?>

                <tr>
                    <td>
                    <?php echo $rows['appointment_date']; ?>
                    </td>

                    <td><?php echo $rows['appointment_time']; ?></td>

                    <td><?php echo $rows['patient_first_name'] + " " + $rows["patient_surname"]; ?></td>

                    <td><?php echo $rows['appointment_type']; ?></td>
                    
                    <td><?php echo "Dr." + $rows['dentist_first_name'] + " " + $rows["dentist_surname"]; ?></td>
                
                </tr>

                <?php
                }
            ?>

            </table>
        </div>


        </div>
    
        <!--
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
    
    
    
            var buttons = document.querySelectorAll(".schedule-tabs .btn-cont button");
            var tabP = document.querySelectorAll(".schedule-tabs .tabPanel");
    
    
            function showPanel(panelIndex, colorCode) {
                buttons.forEach(function(node) {
                    node.style.backgroundColor = "";
                    node.style.color = "";
                });
                buttons[panelIndex].style.backgroundColor = colorCode;
                buttons[panelIndex].style.color = "white";
    
    
                tabP.forEach(function(node) {
                    node.style.display = "none";
                });
                tabP[panelIndex].style.display = "block";
            }
            showPanel(0, '#8d1ecd');
        </script>>
        -->
    </body>
</html>
    
