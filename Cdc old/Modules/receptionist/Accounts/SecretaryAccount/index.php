<?php
    session_start();
    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");


?>
<!DOCTYPE html>
<html lang=e n dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="css/DentistAccountBootstrap.css?v=<?php echo time(); ?>" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
        
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="/Modules/secretary/assets/css/styles.css">
        <link rel="stylesheet" href="css/SecretaryAccount-Style.css?v=<?php echo time(); ?>">
       
    
     
    
    

        <title>Secretary Account List</title>
    </head>
    <body>
   <!--========== HEADER ==========-->
   <header class="header">
    <div class="header__container">
        <img src="/Modules/secretary/assets/img/logo dental.png" alt="" class="header__img">
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

                    <a href="/Modules/receptionist/index.php" class="nav__link active">
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
                                <a href="/Modules/receptionist/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/receptionist/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                               
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
                            <a href="/Modules/receptionist/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Employees</a>
                                <a href="/Modules/receptionist/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
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

        <a href="#" class="nav__link nav__logout">
            <i class='bx bx-log-out nav__icon' ></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>

        <!--========== CONTENTS ==========-->
        <main>

 
        <div class="pl-header">
            <div class="page-title">
                <h1>Employees List</h1>
                <!--search bar-->
                <div class="box-cont">
                    <table class="elem-cont">
                        <tr>
                            <td>
                                <div>
                                    <input type="text" placeholder="Search" class="search">
                                    <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>

                            </td>
                        </tr>
                    </table>
</div> 
            </div>

            <div class="subh">
                <!--add patient acc button-->
                <div class="addpatient-btn">
                    <div>
                        <i class="fa-solid fa-user-plus"></i>
                        <a class="" type="button" href="createaccount.php">Add New Account</a>
                    </div>
                </div>
            </div>
        </div>



    <div class="secretary-content">
    <table class="table " style=border-color:violet;>
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Mobile No.</th>
                    <th>Birthdate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>  
            <?php 
                         //read rows from the database
                    $sql = "SELECT * FROM users WHERE accrole ='Administrator' ORDER BY lname ASC";
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
                                            <td><?php
                                                    if (isset($users['profile_picture']) && !empty($users['profile_picture'])) 
                                                    
                                                    {
                                                    ?>
                                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($users['profile_picture']); ?>" width='90' height='90' />
                                                    
                                                    <?php
                                                    } else {

                                                    ?>
                                                        <img src='/Modules/admin/assets/img/profile-pic.png' width ='90' height = '90' border-radius="20px"></a></td>
                                                    <?php
                                                    }

                                                    ?></td>
                                                <td><?= $users['fname'] . ' ' .$users['lname'];?></td>
                                                <td><?= $users['gender']; ?></td>
                                                <td><?= $users['phonenumber']; ?></td>
                                                <td><?= $users['birthdate']; ?></td>
                                                <td>
                                                    <a href="view.php?id=<?= $users['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    
                                                   
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
  
                                </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="/secretary/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>




</body>


</html>