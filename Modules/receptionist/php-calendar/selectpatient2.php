<?php

    include ('../../Database/connect.php');
             
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="selectstyle.css">
        <link rel="stylesheet" href="indent.css">
        <link rel="stylesheet" href="/Modules/secretary/assets/css/styles.css">
        
    </head>
        <body>
   <!--mobile navigation bar start-->

<!--========== HEADER ==========-->
<header class="header">
<div class="header__container">
<img src="/Secretary/assets/img/logo dental.png" alt="" class="header__img">

<a href="#" class="header__logo">Cruz Dental Clinic</a>


<div class="header__toggle">
    <i class='bx bx-menu' id="header-toggle"></i>
</div>
</div>
</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
<nav class="nav__container">
<div>
<a href="#" class="nav__link nav__logo">
   <i class='nav__icon'>
   <img class="header__img" src="/Secretary/assets/img/logo dental.png" alt="">
   </i>
        <span class="nav__logo-name">Cruz Dental Clinic</span>
    </a>

    <div class="nav__list">
        <div class="nav__items">

        <a href="/Secretary/index.php" class="nav__link active">
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
                    <a href="/Secretary/php-calendar/calendar.php" class="nav__dropdown-item">Calendar</a>
                        <a href="/Secretary/php-calendar/select.html" class="nav__dropdown-item">Schedule List</a>
                       
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
                    <a href="/Secretary/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Secretary</a>
                        <a href="/Secretary/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
                        <a href="/Secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                    </div>
                </div>
            </div>


            <a href="#" class="nav__link">
                <i class='bx bx-money nav__icon' ></i>
                <span class="nav__name">Billing</span>
            </a>
        </div>

        <a href="#" class="nav__link">
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
        
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>   
                        <th>Gender</th>
                        <th>Mobile No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

        
        <h1>Select A Patient</h1>
            <?php
                 //read rows from the database
              $sql = "SELECT * FROM users WHERE accrole ='Patient' ORDER BY lname ASC";
              $result = $connection->query($sql);

        
              if (!$result){
                  die("Invalid query: " . $connection->error);
              }

              if(mysqli_num_rows($result) > 0)
                              {
                                  foreach($result as $users)
                                  {
                                      ?>
                                      <tr>
                  
                                          <td><?= $users['fname'] . ' ' .$users['lname'];?></td>
                                          <td><?= $users['gender']; ?></td>
                                          <td><?= $users['phonenumber']; ?></td>
                                          <td>
                                              <a href="procedure2.php?currentid=<?= $users['id']; ?>" class="btn btn-info btn-sm">select</a>
                                             
                                          </td>
                                      </tr>
                                      <?php
                                  }
                              }
                              else
                              {
                                  echo "<h5> No Record Found </h5>";
                              }
    
            ?>
        
            </tbody>
        </table>
    </div>
     </div>    
    
    
    </body>
</html>