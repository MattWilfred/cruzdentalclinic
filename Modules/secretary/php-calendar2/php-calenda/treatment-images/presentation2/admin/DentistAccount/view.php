<?php
    session_start();
    include 'connect.php';  

?>
    <!DOCTYPE html>
    <html lang=e n dir="ltr">

    <head>
        <link rel="stylesheet" href="editprofile-style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dental Clinic Web Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Doctor Accounts</title>

    </head>


    <body>
        <nav>
            <header>
                <div class="logo"> <img src="../logo dental.png" alt="dental logo"></div>
                Cruz Dental Clinic
            </header>


            <ul>

                <li>
                    <a href="../index.html">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="#" class="sched-btn">
                        <i class="fa-solid fa-calendar-days"></i> Schedule
                        <span class="fas fa-caret-down first"></span>
                    </a>
                    <ul class="sched-show">
                        <li><a href="#">Calendar</a></li>
                        <li><a href="#">Schedule List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="acct-btn">
                        <i class="fa-solid fa-user-group"></i> Accounts
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul class="acct-show">
                        <li><a href="../admin/DoctorAccont/index.php">Dentist</a></li>
                        <li><a href="../admin/PatientAccount/index.php">Patients</a></li>
                        <li><a href="../admin/AdminAccount/index.php">Administrator</a></li>
                    </ul>
                </li>

                <li>
                    <a href="../admin/Billing/index.php"> <i class="fa-solid fa-money-bill-wave"></i> Billing </a>
                </li>
                <li><a href="../announcement.html"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
            </ul>


            <div class="logout">
                <li>
                    <a href=""> <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
                </li>

            </div>
        </nav>



        <!--Edit Profile-->
        <div class="main-profile">

             <!--Add Picture -->
             <div class="profile-pic-div">
                <img src="dentist.png" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
                
            </div>

        <br><br><br><br>


            <div class="reg-form">
                <div class="container">
                    <div class="content">
                        <form action="editpatientprofile.php" method="POST">
                            <div>
                                <h4>ACCOUNT INFORMATION</h4>
                            </div>

                            
    
                            <?php
                        if(isset($_GET['id']))
                        {
                            $dentist_id = mysqli_real_escape_string($connection, $_GET['id']);
                            $query = "SELECT * FROM persons WHERE id='$dentist_id' ";
                            $query_run = mysqli_query($connection, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $currentid = mysqli_fetch_array($query_run);
                                ?>


                                 <div class="user-details">
                                <div class="input-box">
                                    <span class="details">First Name</span>
                                    <p id="rcorners2">
                                    <?=$currentid['fname'];?>
                                </p>
                                </div>   
                                
                                <div class="input-box">
                                    <span class="details">Last Name</span>
                                    <p id="rcorners2">
                                    <?=$currentid['lname'];?>
                                </p>

                                </div>

                                <div class="input-box">
                                    <span class="details">Email Address</span>
                                    <p id="rcorners2">
                                    <?=$currentid['email'];?>
                                    </p>

                                </div>  
 
                                <div class="input-box">
                                    <span class="details">Birth Date</span>
                                    <p id="rcorners2">
                                    <?=$currentid['birthdate'];?>
                                    </p>

                                </div>

                                <div class="input-box">
                                    <span class="details">Phone Number:</span>
                                    <p id="rcorners2">
                                    <?=$currentid['phonenumber'];?>
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
                           <a href="editpatientprofile.php?id=<?=$currentid['id']; ?>" class="btn btn-success btn-sm">Edit</a>
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

        <script src="app.js"></script>

    </body>

    </html>
