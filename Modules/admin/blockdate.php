<?php

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

$query = "SELECT * FROM holiday";  
$result = mysqli_query($connection, $query);  

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--========== CSS ==========-->
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="blockdate.css">
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
  <title>Block Date</title>
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
           <img src="/Modules/admin/assets/img/logo dental.png" alt="" class="header__img">
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
                        <a href="/Modules/admin/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/admin/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/admin/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                <a href="/Modules/admin/blockdate.php" class="nav__dropdown-item">Block Date</a>
                              
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
                                <a href="/Modules/admin/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="/Modules/admin/billing/billing.php" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="/Modules/admin/announcement/announcement.php" class="nav__link">
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
    <div class="container-form">
      

        <div class="float-container">
            <div class="float-child">
            <form action="dateblock.php" method="POST">
            <h1><label for="message-text">Event Description</label></h1>
            <label class="details"><b> Date to Block: </b></span>
            <input type="date" name="date" min="2022-01-01" require >
            <br /><br />
            <textarea class="form-control" placeholder="Your message.." name="desc" style="height: 150px; width: 700px; border-color: blueviolet;" id="message-text" required></textarea>

            <input type="submit" name="submit" value="Block Date" style="border-color: blueviolet; position:relative; left:1%;top:10px" >
        </form>
            </div>


            <table class="table">
            <h3>Event List</h3>
                <table>
               
                    <tr>
                  
                        <th>Date</th>
                        <th>Event Description</th>
                        <th>Action</th>
                    </tr>
                    <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                
                    <tr>
                        <td><?php echo $row['date']?></td>
                        <td><?php echo $row['description']?></td>
                        <td><a href="removedate.php?id=<?php echo $row['holiday_id']?>"><button>Remove</button></a></td>
                    </tr>

                    <?php
                     }
                     ?>
               </table>
            </div>

        </div>
  
</div>

    
    </div>
        
 </div>

<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>

</body>
</html>
