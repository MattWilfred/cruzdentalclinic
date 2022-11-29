<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/stylecalendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
	
    <title>Dra Marites Cruz Dental Clinic Website</title>

</head>

<body>
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
                    <li><a href="#">Dentist</a></li>
                    <li><a href="patient.html">Patients</a></li>
                    <li><a href="#">Administrator</a></li>
                </ul>
            </li>

            <li>
                <a href="#about"> <i class="fa-solid fa-money-bill-wave"></i> Billing </a>
            </li>
            <li><a href="announcement.html"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
        </ul>
        

        <div class="logout">
            <li><a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a></li>
            
        </div>
       
    </nav>

    <div class="body_content">
        <h1> Schedule Menu</h1>

          
        
            <div class="flex-container">

                <div class="calen">
            
                    <form>    
                        <div id="datepicker"></div>
                    </form>
                         <!--Configure Calendar below-->
                        <script>
                    
                             $(function() {
                                $("#datepicker").datepicker({
                                    width: '300px',
                                    height: '100px'
                                });
                            });
                        </script>
                        <!--Time Options-->
            
                </div>
                
                <div class="time111">
                    <form>                   
                        <h2>Select Available Schedule</h2>
                        <input type="radio" id="time1" name="time1" value="7:00">
                            <label for="tim1">7:00 am - 8:00 am</label><br>     
                            <br>
                            <input type="radio" id="time2" name="time2" value="8:00">
                            <label for="tim2">8:00 am - 9:00 am</label><br>
                            <br>

                            <input type="radio" id="time3" name="time3" value="10:00">
                            <label for="tim3">10:00 am - 11:00 am</label><br>  
                            <br>
                            <input type="radio" id="time4" name="time4" value="11:00">
                            <label for="tim3">11:00 am - 12:00 pm</label><br> 
                            <br>
                            <input type="radio" id="time5" name="time5" value="13:00">
                            <label for="tim3">1:00 pm - 2:00 pm</label><br> 
                            <br>
                            <input type="radio" id="time5" name="time5" value="13:00">
                            <label for="tim3">2:00 pm - 3:00 pm</label><br> 
                            <br>
                            <input type="radio" id="time5" name="time5" value="13:00">
                            <label for="tim3">3:00 pm - 4:00 pm</label><br> 
                            <br>


                            <input type="submit" value="Done">     
                </form>   
                </div>

              
              </div>

              <div class="msg-notice"> 
                 <h2>Please select the available schedule</h2>
              </div>
    </div> 
    




    <!--Script for schedule menu-->
     
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
    </script>>

</body>
