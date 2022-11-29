<?php
    session_start();
    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

?>
    <!DOCTYPE html>
    <html lang=e n dir="ltr">

    <head>
     
        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="/Modules/secretary/assets/css/styles.css">
        <link rel="stylesheet" href="css/viewAccount-style.css?v=<?php echo time(); ?>">
     
       
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Doctor Accounts</title>

    </head>


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

        <  <!--========== HEADER ==========-->
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

                        <a href="/Modules/secretary/index.php" class="nav__link active">
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
                                    <a href="/Modules/secretary/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                    <a href="/Modules/secretary/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                   
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
                                <a href="/Modules/secretary/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Employees</a>
                                    <a href="/Modules/secretary/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
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

            <a href="#" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon' ></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>



        <!--Edit Profile-->
        <div class="main-cont">
         
        <div class="main-profile">
           
            <div class="reg-form">
                
                <div class="container">
                    
                    <div class="content">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $dentist_id = mysqli_real_escape_string($connection, $_GET['id']);
                            $query = "SELECT * FROM users WHERE id='$dentist_id' ";
                            $query_run = mysqli_query($connection, $query);
 
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $currentid = mysqli_fetch_array($query_run);
                                ?>
                        <form action="update.php" method="POST">
                            <div>
                                <h4>ACCOUNT INFORMATION</h4>
                            </div>

<br>
<br>
                       
<div class="user-details">
                                <div class="input-box">
                                    <span class="details">Name</span>
                                    <p id="rcorners2">
                                    <?=$currentid['fname']. ' ' .$currentid['lname'];?>
                                </p>
                                </div>   
                                
                                <div class="input-box">
                                    <span class="details">Address</span>
                                    <p id="rcorners2">
                                    <?=$currentid['paddress'];?>
                                </p>

                                </div>

                                <div class="input-box">
                                    <span class="details">Gender</span>
                                    <p id="rcorners2">
                                    <?=$currentid['gender'];?>
                                    </p>

                                </div>  

                                <div class="input-box">
                                    <span class="details">BirthDate</span>
                                    <p id="rcorners2">
                                    <?=$currentid['birthdate'];?>
                                    </p>

                                </div>  
 
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <p id="rcorners2">
                                    <?=$currentid['email'];?>
                                    </p>

                                </div>

                                <div class="input-box">
                                    <span class="details">Mobile Number</span>
                                    <p id="rcorners2">
                                    <?=$currentid['phonenumber'];?>
                                    </p>

                                </div>  

                                <div class="input-box">
                                    <span class="details">Username</span>
                                    <p id="rcorners2">
                                    <?=$currentid['username'];?>
                                    </p>

                                </div> 
                                
                                <div class="input-box">
                                    <span class="details">Role </span>
                                    <p id="rcorners2">
                                    <?=$currentid['accrole'];?>
                                    </p>

                                </div>


                               
                            </div>

                            
                       

                        

                            <div class="buttons">
                            <a href="index.php">
                            <button type="button" id="closebtn" class="btn btn-secondary">Close</button>
                            </a>
                           <a href="editprofile.php?id=<?=$currentid['id']; ?>" class="btn btn-primary">Edit</a>
                            </div>
            

                        </form>
                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>


                </div>

            </div>

        </div>
        </div>

     

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="/Modules/secretary/assets/js/main.js"></script>


    </body>

    </html>