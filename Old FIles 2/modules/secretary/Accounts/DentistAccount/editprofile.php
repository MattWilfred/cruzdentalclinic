<?php
  //include_once 'userlogs.php';

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cruzdentalclinic";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
  die("Connection error!");
}

?>



<!DOCTYPE html>
<html lang=en dir="ltr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="editprofile-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Modules/secretary/assets/css/styles.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Patient Profile</title>


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


    <div class="body_content">
        <h1>Edit Profile</h1>
    </div>

    <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1 form login-form">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $query = "SELECT * FROM users WHERE id='$user_id' ";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $currentid = mysqli_fetch_array($query_run);
                            ?>


                
                            <div>
                                <h4 style="margin-top: 1%">
                                    Account Information
                                </h4>



                                <form action="update.php" method="POST" enctype="multipart/form-data">
    
                                    <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>

                                    <input type="hidden" name="id" value= <?php echo $_GET['id'];?> >

       

                                
                                    <div class="row">
                                        <div class="col">
                                            First Name
                                            <input class="form-control" class="inpt" id="nm" type="text" name="fname" value="<?=$currentid['fname'];?>"   required>
                                            <p id="nmmsg" class="inptmsg" style="color:red"></p>
                                        </div>
                                        <div class="col">
                                            Last Name
                                            <input class="form-control" class="inpt" id="nm" type="text" name="lname" value="<?=$currentid['lname'];?>"required>
                                            <p id="nmmsg" class="inptmsg" style="color:red"></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            Address
                                            <input class="form-control" class="inpt" type="text" name="address" value="<?=$currentid['paddress'];?>"  required>
                                            <p id="addmsg" class="inptmsg" style="color:red"></p>
                                        </div>
                                        <div class="col">
                                            Birthdate
                                            <input class="form-control" id="birthday" class="inpt" type="date" name="bdate" value="<?=$currentid['birthdate'];?>" max="<?= date('Y-m-d'); ?>" required>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            Phone Number
                                            <input class="form-control" class="inpt" type="number" name="phone" value="<?=$currentid['phonenumber'];?>"  required>
                                            <p id="addmsg" class="inptmsg" style="color:red"></p>
                                        </div>
                                        <div class="col">
                                            Email
                                            <input class="form-control" class="inpt" id="pn" type="text" name="email" value="<?=$currentid['email'];?>" id="number"  required>
                                            <p id="pnmsg" class="inptmsg" style="color:red"></p>                                
                                    </div>

                                    </div>

                                    <div class="row" style="margin-left: 20%; margin-right: 20%">
                                        <div class="col" style="text-align:center;" >
                                            Profile Picture
                                            <div style="display: flex;">
                                                <input class="form-control" class="inpt" id="un" type="file" name="profpic" >

                                            </div>
                                            
                                            <p id="unmsg" class="inptmsg" style="color:red"></p>
                                        </div>
                                    </div>




                                    <div class="row" style="margin-left: 12%; margin-right: 12%; margin-bottom: 4%;">
                                        <div class="col" style="margin-top: 3%;">
                                            <a class="form-control btn btn-danger" href="index.php? id=<?= $user_id; ?>" type="button" name="cancel">Cancel</a>
                                        </div>
                                        <div class="col" style="margin-top: 3%;">
                                            <button class="form-control btn btn-primary" type="submit" name="create">Update</button>
                                        </div>
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


                                    


                    </form>

                    <style>
                        input:invalid, select:invalid{
                            border: 2px solid red;
                        }

                        input:valid, select:valid{
                            border: 2px solid green;
                        }
                    </style>
                </div>
            </div>
        </div>
        </div>



    









    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>
