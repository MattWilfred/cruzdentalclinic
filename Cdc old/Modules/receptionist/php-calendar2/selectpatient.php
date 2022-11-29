<?php

    include ('../../../Database/connect.php');
    $dentist=$_GET['dentistid'];
     
    
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="css/SelectDentistBootstrap.css?v=<?php echo time(); ?>" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
           <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="/Modules/admin/assets/css/styles.css">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
        <body>
    
         <!--========== HEADER ==========-->
         <header class="header">
          <div class="header__container">
          <img class="header__img" src="/Modules/receptionist/assets/img/logo dental.png" alt="">

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
           <img src="/Modules/receptionist/assets/img/logo dental.png" alt="" class="header__img">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Modules/receptionist/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="/Modules/receptionist/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/receptionist/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/receptionist/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                <a href="/Modules/receptionist/blockdate.php" class="nav__dropdown-item">Block Date</a>
                                
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
                                <a href="/Modules/receptionist/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="/Modules/receptionist/billing/billing.php" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="/Modules/receptionist/announcement/announcement.php" class="nav__link">
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


      <!--sidebar end-->
      <main>

 
<div class="pl-header">
    <div class="page-title">
       
        <!--search bar--> 
        <div class="box-cont">
            <table class="elem-cont">
                <tr>
                    <td>

                    <form action="" method="GET" enctype="multipart/form-data">
                        <div>
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="search" placeholder="Search data">
                            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        </form>

                    </td>
                </tr>
            </table>
</div> 
    </div>

    <div class="subh">
    <h1>Select A Patient</h1>
        <!--add patient acc button-->
        </div>
        </div>

<div class="dentist-content">
<table class="table " style=border-color:violet;>
    <thead>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Gender</th>
           
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>  
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
                                              <a href="procedure.php?dentistid=<?php echo $dentist?>&currentid=<?= $users['id']; ?>" class="btn btn-info btn-sm">select</a>
                                             
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
<script src="/Modules/admin/assets/js/main.js"></script>

</html>