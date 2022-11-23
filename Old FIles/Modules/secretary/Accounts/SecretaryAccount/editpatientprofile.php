<?php
    session_start();
    require 'dbcon.php';

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
        <link rel="stylesheet" href="css/editprofile-style.css?v=<?php echo time(); ?>">
     
       
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Doctor Accounts</title>

    </head>


    <body>
         <!--========== HEADER ==========-->
         <header class="header">
            <div class="header__container">
                <img src="/assets/img/perfil.jpg" alt="" class="header__img">

                <a href="#" class="header__logo">Cruz Dental Clinic</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
    
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
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name">Cruz Dental Clinic</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
    
                            <a href="/index.php" class="nav__link active">
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
                                    <a href="/php-calendar/calendar.php" class="nav__dropdown-item">Calendar</a>
                                        <a href="/php-calendar/select.html" class="nav__dropdown-item">Schedule List</a>
                                       
                                       
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
                                        <a href="#" class="nav__dropdown-item">Administrator</a>
                                        <a href="#" class="nav__dropdown-item">Dentist</a>
                                        <a href="#" class="nav__dropdown-item">Patients</a>
                                       
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



        <!--Edit Profile-->
        <div class="main-cont">
        <div class="main-profile">

            <div class="page-profile">
              

            </div>

        


            <div class="reg-form">
                <div class="container">
                    <div class="content">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $dentist_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM users WHERE id='$dentist_id' ";
                            $query_run = mysqli_query($con, $query);
 
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $currentid = mysqli_fetch_array($query_run);
                                ?>
                        <form action="update.php" method="POST">
                            <div>
                            <h1>Edit Profile</h1>
                                <h4>ACCOUNT INFORMATION</h4>
                               
                            </div>


                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">First Name</span>
                                    <input  type="text" name="fname" id="Firstname"value="<?=$currentid['fname'];?>" placeholder="Enter your first name" required>
                                    
                                </div>
                                <div class="input-box">
                                    <span class="details">Last Name</span>
                                    <input  type="text" name="lname" id="Firstname"value="<?=$currentid['lname'];?>" placeholder="Enter your first name" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Address</span>
                                    <input type="text" name="paddress" value="<?=$currentid['paddress'];?>" placeholder="Enter your address" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Birthdate</span>
                                    <input type="date" name="birthdate" value="<?=$currentid['birthdate'];?>" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" name="phonenumber" id="MobileNumber"value="<?=$currentid['phonenumber'];?>" placeholder="Enter your number" maxlength="11" required>
                                    <span id="pnumber-error"> </span>
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="text" name="email" value="<?=$currentid['email'];?>" placeholder="Enter your email" required>
                                    <input type="hidden" name="id" value= <?php echo $_GET['id'];?> >
                                </div>

                                <div class="input-box">
                                <span class="details">Profile Picture</span>
                               <input type="file"class="form-control"name="profile_picture"<?=$currentid['profile_picture'];?> >
                              </div>
                            </div>


                        

                            <div class="buttons">
                            <a href="index.php">
                            <button type="button" id="closebtn" class="btn btn-secondary">Close</button>
                            </a>
                            <button type="submit" name="Update_DentistAccount" class="btn btn-primary">
                                            Update Profile
                            </button>
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
    <script src="/secretary/assets/js/main.js"></script>


    </body>

    </html>