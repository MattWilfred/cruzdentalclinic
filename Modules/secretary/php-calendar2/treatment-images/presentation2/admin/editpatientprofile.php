<?php
    session_start();
    require 'dbcon.php';
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

            <div class="page-profile">
                <br>
                <h1>Edit Profile</h1>

            </div>

            <!--Add Picture -->
            <div class="profile-pic-div">
                <img src="image.jpg" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
                <br><br><br>
            </div>
            <br><br><br>


            <div class="reg-form">
                <div class="container">
                    <div class="content">
                        <form action="" method="POST">
                            <div>
                                <h4>ACCOUNT INFORMATION</h4>
                            </div>


                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">First Name</span>
                                    <input autofocus type="text" name="Firstname" id="Firstname" placeholder="Enter your first name" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Last Name</span>
                                    <input type="text" name="Lastname" id="Lastname" placeholder="Enter your last name" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Address</span>
                                    <input type="text" name="Address" placeholder="Enter your address" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Birthdate</span>
                                    <input type="date" name="dob" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" name="MobileNumber" id="MobileNumber" placeholder="Enter your number" maxlength="11" required>
                                    <span id="pnumber-error"> </span>
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="text" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Password</span>
                                    <input type="password" class="pword" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Confirm Password</span>
                                    <input type="password" class="cpword" name="password" placeholder="Confirm your password" required>
                                </div>
                                <div class="gender">
                                    <label for="gender">Gender: </label>
                                    <select id="dropdown" name="Gender" class="dropdown">
                                        <option disabled value>Gender</option>
                                        <option value="admin">Male</option>
                                        <option value="dentist">Female</option>
                                  </select>
                                </div>

                            </div>




                            <div class="buttons">
                            <button type="button" id="closebtn" class="btn btn-secondary">Discard</button>
                                <button id="submit" type="submit">Save changes</button>
                            </div>



                        </form>
                    </div>


                </div>



            </div>


        </div>

        <script src="app.js"></script>

    </body>

    </html>
