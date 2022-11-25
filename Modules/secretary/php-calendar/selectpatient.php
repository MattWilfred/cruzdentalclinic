<?php

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
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
                <img src="/Modules/admin/assets/img/logo dental.png" alt="" class="header__img">

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
           <img src="/Modules/secretary/assets/img/logo dental.png" alt="" class="header__img">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Modules/secretary/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="/Modules/secretary/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/secretary/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/secretary/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                <a href="/Modules/secretary/blockdate.php" class="nav__dropdown-item">Block Date</a>
                              
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
                                <a href="/Modules/secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="/Modules/secretary/billing/billing.php" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="/Modules/secretary/announcement/announcement.php" class="nav__link">
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

                    <form method="POST">
                        <span><input type="text" name="search" class="search" placeholder="Search data">
                        <input name="submitsearch" class="sbutton" type="submit" value="Search"></span>     
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
            <?php
                 //read rows from the database
              $sql = "SELECT * FROM users WHERE accrole ='Patient' ORDER BY lname ASC";
              $result = $connection->query($sql);

        
              if (!$result){
                  die("Invalid query: " . $connection->error);
              }

              //read rows from the database


                if (isset($_POST["submitsearch"])){

                    $searchedTerm = $_POST["search"];
                    $entries = mysqli_query($connection, "SELECT * FROM users WHERE username LIKE  '$searchedTerm' AND accrole = 'Patient'|| fname LIKE '$searchedTerm' || lname LIKE '$searchedTerm'");

                    while ($users = mysqli_fetch_assoc($entries)) {
                        echo "<tbody id='searched-div'>";
                        echo "<tr>";
                        echo "<td>".$users['id']."</td>";
                        echo "<td>".$users['fname']." ".$users['lname']."</td>";
                        echo "<td>".$users['gender']."</td>";
                        echo "<td>".$users['phonenumber']."</td>";
                        echo "<td>".$users['birthdate']."</td>";
                        echo "<td><a href=view.php?id=<?=" .$users['id']. " class='btn btn-info btn-sm'>View</a></td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                }


              else if(mysqli_num_rows($result) > 0){
                    foreach($result as $users){
                        
                        ?>
                            <tbody id='original-div'>
                            <tr>
                            <td><?= $users['fname'] . ' ' .$users['lname'];?></td>
                            <td><?= $users['gender']; ?></td>
                            <td><?= $users['phonenumber']; ?></td>
                            <td>
                                <a href="procedure.php?dentistid=<?php echo $dentist?>&currentid=<?= $users['id']; ?>" class="btn btn-info btn-sm">select</a>
                            </td>
                            </tr>
                            </tbody>
                        
                        <?php
                                  }
                              }
                              else
                              {
                                  echo "<h5> No Patient Found called" .$_POST["search"]. "</h5>";
                              }
    
            ?>
        
        </table>
    </div>
     </div> 
     
     <script>
     
     $(document).ready(function(){
        $(".sbutton").on("click", function(){
            $("original-div").hide();
            $("searched-div").show();
        })
    })
    </script>
    
    
    </body>

<script src="/Modules/admin/assets/js/main.js"></script>

</html>