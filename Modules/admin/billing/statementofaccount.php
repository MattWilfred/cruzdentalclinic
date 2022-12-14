<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="sched-list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                    <li><a href="#">Schedule List</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="acct-btn">
                    <i class="fa-solid fa-user-group"></i> Profile
                    <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="acct-show">
                    <li><a href="#">Dentist</a></li>
                    <li><a href="#">Patients</a></li>
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

    <br>
    <div class="body_content">
       <div class="cont">
            <h1>Schedule</h1>
            <button>Add Schedule</button>
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
    </script>>

</body>

</html>