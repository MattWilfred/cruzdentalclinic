<?php
  //include_once 'userlogs.php';

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

?>

<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="patientdiagnosis-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Patient Profile</title>


</head>

<body>
<header class="header">
        <div class="header__container">

            <a href="patientlist.php">
                <button>
                    <i class="fa-solid fa-angle-left"></i>
                    Back to Patient List
                </button>
            </a>
            
            <div class="header__container">
            <img src="/Modules/admin/assets/img/logo dental.png" alt="" class="header__img">


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
                        <a href="#" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/admin/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/admin/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                               
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
                            <a href="/Modules/admin/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Employees</a>
                                <a href="/Modules/admin/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
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

    <div class="body_content">
        <h1>Patient Profile</h1>
    </div>



    <div class="container">

    <?php
            
            $i = $_GET['id'];

            $sql = "SELECT * from users where id = $i";
            $result = mysqli_query($connection,$sql);
    

            if(mysqli_num_rows($result)>0){
                while ($row = $result->fetch_assoc()){
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $gender = $row['gender'];
                    $phone = $row['phonenumber'];
                    $bday = $row['birthdate'];
                    $address = $row['paddress'];


                }
                ?>

                <div class="patient-info">
                    <div class="info-header">
                        <img src="user-logo.png" alt="user logo">
                        <h1><?php echo $fname ?> <?php echo $lname ?> </h1>
                        <p class="pemail"><?php echo $email ?> </p>

                    </div>
                    

                    <div class="username">
                        <span>Username</span>
                        <p><?php echo $username ?></p>
                    </div>
                    <div class="gender">
                        <span>Gender</span>
                        <p><?php echo $gender ?></p>
                    </div>
                    <div class="phone">
                        <span>Phone</span>
                        <p><?php echo $phone ?></p>
                    </div>
                    <div class="bday">
                        <span>Birthday</span>
                        <p><?php echo $bday ?></p>
                    </div>
                    <div class="address">
                        <span>Address</span>
                        <p><?php echo $address ?></p>
                    </div>

                
                </div>
            <?php

            }


        
    ?>


        <div class="navbar">
            <div class="topnav">
                    <a href="appthistory.php? id=<?= $i; ?>">Appointment History</a>
                    <a href="patientmbg.php? id=<?= $i; ?>">Medical Background</a>
                    <a class="active">Diagnosis</a>
                    <a href="patientdbg.php? id=<?= $i; ?>">Dental Background</a>
                    <a href="patientprescription.php? id=<?= $i; ?>">E-Prescription</a>
                    <a href="patientreferral.php? id=<?= $i; ?>">Referral</a>
            </div>



            

            <div class="diagnosis" id="diagnosis">
                <div class="diagnosis-header">
                    <h2>Diagnosis </h2>
                </div>
                <div class="adddgns-btn"><button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" class="adddgns-btn">Add</button>
                </div>


                <form  method="post">

                <?php require 'color-diagnosis.php'?>

                    <div class="top-teeth">

                        <div class="top-ind">
                            <p>Top</p>
                        </div>

                        <div class="top">

                            <div class="t18">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="18" for="ct18" <?php colorTooth(18, $i)?> >
                                        <img src="tooth-numbering-images/18.png">
                                    </button>
                                    <p>18</p>
                                </div>
                            </div>

                            <div class="t17">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="17" for="ct17" <?php colorTooth(17, $i)?>>
                                        <img src="tooth-numbering-images/17.png">
                                    </button>
                                    <p>17</p>
                                </div>
                            </div>

                            <div class="t16">
                                <div>
                                    <button for="ct16" type="submit" name="tooth_button" class="tbutton" value="16" for="ct16" <?php colorTooth(16, $i)?>>
                                        <img src="tooth-numbering-images/16.png">
                                    </button>
                                    <p>16</p>
                                </div>
                            </div>

                            <div class="t15">
                                <div>
                                    <button for="ct15" type="submit" name="tooth_button" class="tbutton" value="15" for="ct15" <?php colorTooth(15, $i)?>>
                                        <img src="tooth-numbering-images/15.png">
                                    </button>
                                    <p>15</p>
                                </div>
                            </div>
                            <div class="t14">
                                <div>
                                    <button for="ct14" type="submit" name="tooth_button" class="tbutton" value="14" for="ct14" <?php colorTooth(14, $i)?>>
                                        <img src="tooth-numbering-images/14.png">
                                    </button>
                                    <p>14</p>
                                </div>

                            </div>
                            <div class="t13">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="13" for="ct13" <?php colorTooth(13, $i)?>>
                                        <img src="tooth-numbering-images/13.png">
                                    </button>
                                    <p>13</p>
                                </div>

                            </div>
                            <div class="t12">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="12" for="ct12" <?php colorTooth(12, $i)?>>
                                        <img src="tooth-numbering-images/12.png">
                                    </button>
                                    <p>12</p>
                                </div>

                            </div>
                            <div class="t11">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="11" for="ct11" <?php colorTooth(11, $i)?>>
                                        <img src="tooth-numbering-images/11.png">
                                    </button>
                                    <p>11</p>
                                </div>

                            </div>
                            <div class="t21">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="21" for="ct21" <?php colorTooth(21, $i)?>>
                                        <img src="tooth-numbering-images/21.png">
                                    </button>
                                    <p>21</p>
                                </div>

                            </div>
                            <div class="t22">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="22" for="ct22" <?php colorTooth(22, $i)?>>
                                        <img src="tooth-numbering-images/22.png">
                                    </button>
                                    <p>22</p>
                                </div>

                            </div>
                            <div class="t23">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="23" for="ct23" <?php colorTooth(23, $i)?>>
                                        <img src="tooth-numbering-images/23.png">
                                    </button>
                                    <p>23</p>
                                </div>

                            </div>
                            <div class="t24">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="24"for="ct24" <?php colorTooth(24, $i)?>>
                                        <img src="tooth-numbering-images/24.png">
                                    </button>
                                    <p>24</p>
                                </div>

                            </div>
                            <div class="t25">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="25" for="ct25" <?php colorTooth(25, $i)?>>
                                        <img src="tooth-numbering-images/25.png">
                                    </button>
                                    <p>25</p>
                                </div>

                            </div>
                            <div class="t26">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="26" for="ct26" <?php colorTooth(26, $i)?>>
                                        <img src="tooth-numbering-images/26.png">
                                    </button>
                                    <p>26</p>
                                </div>

                            </div>
                            <div class="t27">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="27" for="ct27" <?php colorTooth(27, $i)?>>
                                        <img src="tooth-numbering-images/27.png">
                                    </button>
                                    <p>27</p>
                                </div>

                            </div>
                            <div class="t28">
                        
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="28" for="ct28" <?php colorTooth(28, $i)?>>
                                        <img src="tooth-numbering-images/28.png">
                                    </button>
                                    <p>28</p>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="bottom-teeth">
                        <div class="bottom-ind">
                            <p>Bottom</p>
                        </div>

                        <div class="bottom">
                            <div class="b48">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="48" for="cb48" <?php colorTooth(48, $i)?>>
                                        <img src="tooth-numbering-images/48.png">
                                    </button>
                                    <p>48</p>
                                </div>
                            </div>
                            <div class="b47">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="47" for="cb47" <?php colorTooth(47, $i)?>>
                                        <img src="tooth-numbering-images/47.png">
                                    </button>
                                    <p>47</p>
                                </div>
                            </div>
                            <div class="b46">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="46" for="cb46" <?php colorTooth(46, $i)?>>
                                        <img src="tooth-numbering-images/46.png">
                                    </button>
                                    <p>46</p>
                                </div>

                            </div>
                            <div class="b45">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="45" for="cb45" <?php colorTooth(45, $i)?>>
                                        <img src="tooth-numbering-images/45.png">
                                    </button>
                                    <p>45</p>
                                </div>

                            </div>
                            <div class="b44">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="44" for="cb44" <?php colorTooth(44, $i)?>>
                                        <img src="tooth-numbering-images/44.png">
                                    </button>
                                    <p>44</p>
                                </div>

                            </div>
                            <div class="b43">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="43" for="cb43" <?php colorTooth(43, $i)?>>
                                        <img src="tooth-numbering-images/43.png">
                                    </button>
                                    <p>43</p>
                                </div>

                            </div>
                            <div class="b42">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="42" for="cb42" <?php colorTooth(42, $i)?>>
                                        <img src="tooth-numbering-images/42.png">
                                    </button>
                                    <p>42</p>
                                </div>

                            </div>
                            <div class="b41">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="41" for="cb41" <?php colorTooth(41, $i)?>>
                                        <img src="tooth-numbering-images/41.png">
                                    </button>
                                    <p>41</p>
                                </div>

                            </div>
                            <div class="b31">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="31" for="cb31" <?php colorTooth(31, $i)?>>
                                        <img src="tooth-numbering-images/31.png">
                                    </button>
                                    <p>31</p>
                                </div>

                            </div>
                            <div class="b32">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="32" for="cb32" <?php colorTooth(32, $i)?>>
                                        <img src="tooth-numbering-images/32.png">
                                    </button>
                                    <p>32</p>
                                </div>

                            </div>
                            <div class="b33">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="33" for="cb33" <?php colorTooth(33, $i)?>>
                                        <img src="tooth-numbering-images/33.png">
                                    </button>
                                    <p>33</p>
                                </div>

                            </div>
                            <div class="b34">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="34" for="cb34" <?php colorTooth(34, $i)?>>
                                        <img src="tooth-numbering-images/34.png">
                                    </button>
                                    <p>34</p>
                                </div>

                            </div>
                            <div class="b35">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="35" for="cb35" <?php colorTooth(35, $i)?>>
                                        <img src="tooth-numbering-images/35.png">
                                    </button>
                                    <p>35</p>
                                </div>

                            </div>
                            <div class="b36">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="36" for="cb36" <?php colorTooth(36, $i)?>>
                                        <img src="tooth-numbering-images/36.png">
                                    </button>
                                    <p>36</p>
                                </div>

                            </div>
                            <div class="b37">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="37" for="cb37" <?php colorTooth(37, $i)?>>
                                        <img src="tooth-numbering-images/37.png">
                                    </button>
                                    <p>37</p>
                                </div>

                            </div>

                            <div class="b38">
                                <div>
                                    <button type="submit" name="tooth_button" class="tbutton" value="38" for="cb38" <?php colorTooth(38, $i)?>>
                                        <img src="tooth-numbering-images/38.png">
                                    </button>
                                    <p>38</p>
                                </div>
                            </div>
                        </div>
                    </div>

        </form>
   

                    <!-- Modal for adding diagnosis  -->
                    <div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content" id="add-img">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Diagnosis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <!-- Form -->

                                <form action="add-diagnosis.php" method="post">

                                <?php require 'block-tooth.php'?>
                              
                                    <input type="hidden" name="id" value="<?php echo $i?>">
                                    <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                                    <div class="modal-body">
                                        Select tooth:
                                    <div class="top-teeth">
                        <div class="top-ind">
                            <p>Top</p>
                        </div>


                        <div class="top">
                            <div class="t18">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct18" value="18" <?php echo checkIfMissing(18); ?> />
                                <div>
                                    <label for="ct18">
                                        <img src="tooth-numbering-images/18.png" <?php echo colorIfMissing(18); ?>>
                                        <!-- style= 'filter: grayscale(1000%)' -->
                                    </label>
                                    <p>18</p>
                                </div>

                            </div>
                            <div class="t17">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct17" value="17" <?php echo checkIfMissing(17); ?> />
                                <div>
                                    <label for="ct17">
                                        <img src="tooth-numbering-images/17.png"  <?php echo colorIfMissing(17); ?> >
                                    </label>
                                    <p>17</p>
                                </div>
                            </div>
                            <div class="t16">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct16" value="16" <?php echo checkIfMissing(16); ?> />
                                <div>
                                    <label for="ct16">
                                        <img src="tooth-numbering-images/16.png"<?php echo colorIfMissing(16); ?>>
                                    </label>
                                    <p>16</p>
                                </div>

                            </div>
                            <div class="t15">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct15" value="15" <?php echo checkIfMissing(15); ?>/>
                                <div>
                                    <label for="ct15">
                                        <img src="tooth-numbering-images/15.png"<?php echo colorIfMissing(15); ?>>
                                    </label>
                                    <p>15</p>
                                </div>

                            </div>
                            <div class="t14">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct14" value="14" <?php echo checkIfMissing(14); ?>/>
                                <div>
                                    <label for="ct14">
                                        <img src="tooth-numbering-images/14.png"<?php echo colorIfMissing(14); ?>>
                                    </label>
                                    <p>14</p>
                                </div>

                            </div>
                            <div class="t13">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct13" value="13" <?php echo checkIfMissing(13); ?>/>
                                <div>
                                    <label for="ct13">
                                        <img src="tooth-numbering-images/13.png"<?php echo colorIfMissing(13); ?>>
                                    </label>
                                    <p>13</p>
                                </div>

                            </div>
                            <div class="t12">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct12" value="12" <?php echo checkIfMissing(12); ?>/>
                                <div>
                                    <label for="ct12">
                                        <img src="tooth-numbering-images/12.png"<?php echo colorIfMissing(12); ?>>
                                    </label>
                                    <p>12</p>
                                </div>

                            </div>
                            <div class="t11">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct11" value="11" <?php echo checkIfMissing(11); ?>/>
                                <div>
                                    <label for="ct11">
                                        <img src="tooth-numbering-images/11.png"<?php echo colorIfMissing(11); ?>>
                                    </label>
                                    <p>11</p>
                                </div>

                            </div>
                            <div class="t21">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct21" value="21" <?php echo checkIfMissing(21); ?>/>
                                <div>
                                    <label for="ct21">
                                        <img src="tooth-numbering-images/21.png"<?php echo colorIfMissing(21); ?>>
                                    </label>
                                    <p>21</p>
                                </div>

                            </div>
                            <div class="t22">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct22" value="22" <?php echo checkIfMissing(22); ?>/>
                                <div>
                                    <label for="ct22">
                                        <img src="tooth-numbering-images/22.png"<?php echo colorIfMissing(22); ?>>
                                    </label>
                                    <p>22</p>
                                </div>

                            </div>
                            <div class="t23">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct23" value="23" <?php echo checkIfMissing(23); ?> />
                                <div>
                                    <label for="ct23">
                                        <img src="tooth-numbering-images/23.png"<?php echo colorIfMissing(23); ?>>
                                    </label>
                                    <p>23</p>
                                </div>

                            </div>
                            <div class="t24">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct24" value="24" <?php echo checkIfMissing(24); ?>/>
                                <div>
                                    <label for="ct24">
                                        <img src="tooth-numbering-images/24.png"<?php echo colorIfMissing(24); ?>>
                                    </label>
                                    <p>24</p>
                                </div>

                            </div>
                            <div class="t25">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct25" value="25" <?php echo checkIfMissing(25); ?>/>
                                <div>
                                    <label for="ct25">
                                        <img src="tooth-numbering-images/25.png"<?php echo colorIfMissing(25); ?>>
                                    </label>
                                    <p>25</p>
                                </div>

                            </div>
                            <div class="t26">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct26" value="26" <?php echo checkIfMissing(26); ?>/>
                                <div>
                                    <label for="ct26">
                                        <img src="tooth-numbering-images/26.png"<?php echo colorIfMissing(26); ?>>
                                    </label>
                                    <p>26</p>
                                </div>

                            </div>
                            <div class="t27">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct27" value="27"<?php echo checkIfMissing(27); ?> />
                                <div>
                                    <label for="ct27">
                                        <img src="tooth-numbering-images/27.png"<?php echo colorIfMissing(27); ?>>
                                    </label>
                                    <p>27</p>
                                </div>

                            </div>
                            <div class="t28">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="ct28" value="28" <?php echo checkIfMissing(28); ?>/>
                                <div>
                                    <label for="ct28">
                                        <img src="tooth-numbering-images/28.png"<?php echo colorIfMissing(28); ?>>
                                    </label>
                                    <p>28</p>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="bottom-teeth">
                        <div class="bottom-ind">
                            <p>Bottom</p>
                        </div>

                        <div class="bottom">
                            <div class="b48">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb48" value="48" <?php echo checkIfMissing(48); ?>/>
                                <div>
                                    <label for="cb48">
                                        <img src="tooth-numbering-images/48.png"<?php echo colorIfMissing(48); ?>>
                                    </label>
                                    <p>48</p>
                                </div>
                            </div>
                            <div class="b47">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb47" value="47" <?php echo checkIfMissing(47); ?>/>
                                <div>
                                    <label for="cb47">
                                        <img src="tooth-numbering-images/47.png"<?php echo colorIfMissing(47); ?>>
                                    </label>
                                    <p>47</p>
                                </div>
                            </div>
                            <div class="b46">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb46" value="46" <?php echo checkIfMissing(46); ?>/>
                                <div>
                                    <label for="cb46">
                                        <img src="tooth-numbering-images/46.png"<?php echo colorIfMissing(46); ?>>
                                    </label>
                                    <p>46</p>
                                </div>

                            </div>
                            <div class="b45">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb45" value="45" <?php echo checkIfMissing(45); ?>/>
                                <div>
                                    <label for="cb45">
                                        <img src="tooth-numbering-images/45.png"<?php echo colorIfMissing(45); ?>>
                                    </label>
                                    <p>45</p>
                                </div>

                            </div>
                            <div class="b44">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb44" value="44" <?php echo checkIfMissing(44); ?>/>
                                <div>
                                    <label for="cb44">
                                        <img src="tooth-numbering-images/44.png"<?php echo colorIfMissing(44); ?>>
                                    </label>
                                    <p>44</p>
                                </div>

                            </div>
                            <div class="b43">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb43" value="43" <?php echo checkIfMissing(43); ?>/>
                                <div>
                                    <label for="cb43">
                                        <img src="tooth-numbering-images/43.png"<?php echo colorIfMissing(43); ?>>
                                    </label>
                                    <p>43</p>
                                </div>

                            </div>
                            <div class="b42">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb42" value="42" <?php echo checkIfMissing(42); ?>/>
                                <div>
                                    <label for="cb42">
                                        <img src="tooth-numbering-images/42.png"<?php echo colorIfMissing(42); ?>>
                                    </label>
                                    <p>42</p>
                                </div>

                            </div>
                            <div class="b41">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb41" value="41" <?php echo checkIfMissing(41); ?>/>
                                <div>
                                    <label for="cb41">
                                        <img src="tooth-numbering-images/41.png"<?php echo colorIfMissing(41); ?>>
                                    </label>
                                    <p>41</p>
                                </div>

                            </div>
                            <div class="b31">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb31" value="31" <?php echo checkIfMissing(31); ?> />
                                <div>
                                    <label for="cb31">
                                        <img src="tooth-numbering-images/31.png"<?php echo colorIfMissing(31); ?>>
                                    </label>
                                    <p>31</p>
                                </div>

                            </div>
                            <div class="b32">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb32" value="32" <?php echo checkIfMissing(32); ?> />
                                <div>
                                    <label for="cb32">
                                        <img src="tooth-numbering-images/32.png"<?php echo colorIfMissing(32); ?>>
                                    </label>
                                    <p>32</p>
                                </div>

                            </div>
                            <div class="b33">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb33" value="33" <?php echo checkIfMissing(33); ?>/>
                                <div>
                                    <label for="cb33">
                                        <img src="tooth-numbering-images/33.png"<?php echo colorIfMissing(33); ?>>
                                    </label>
                                    <p>33</p>
                                </div>

                            </div>
                            <div class="b34">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb34" value="34"<?php echo checkIfMissing(34); ?> />
                                <div>
                                    <label for="cb34">
                                        <img src="tooth-numbering-images/34.png"<?php echo colorIfMissing(34); ?>>
                                    </label>
                                    <p>34</p>
                                </div>

                            </div>
                            <div class="b35">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb35" value="35" <?php echo checkIfMissing(35); ?>/>
                                <div>
                                    <label for="cb35">
                                        <img src="tooth-numbering-images/35.png"<?php echo colorIfMissing(35); ?>>
                                    </label>
                                    <p>35</p>
                                </div>

                            </div>
                            <div class="b36">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb36" value="36" <?php echo checkIfMissing(36); ?>/>
                                <div>
                                    <label for="cb36">
                                        <img src="tooth-numbering-images/36.png"<?php echo colorIfMissing(36); ?>>
                                    </label>
                                    <p>36</p>
                                </div>

                            </div>
                            <div class="b37">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb37" value="37" <?php echo checkIfMissing(37); ?>/>
                                <div>
                                    <label for="cb37">
                                        <img src="tooth-numbering-images/37.png"<?php echo colorIfMissing(37); ?>>
                                    </label>
                                    <p>37</p>
                                </div>

                            </div>
                            <div class="b38">
                                <input class="tcheckbox" name="tooth[]" type="checkbox" id="cb38" value="38" <?php echo checkIfMissing(38); ?>/>
                                <div>
                                    <label for="cb38">
                                        <img src="tooth-numbering-images/38.png"<?php echo colorIfMissing(38); ?>>
                                    </label>
                                    <p>38</p>
                                </div>

                            </div>
                        </div>
                    </div>
                                    

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" id="adddesc-btn" name="adddesc-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                                    </div>
                                

                            </div>
                        </div>
                    </div>





                     <!-- Modal for add description in diagnosis tab-->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                       
                                <input type="hidden" name="id" value="<?php echo $i?>">
                                <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="findings" class="col-form-label">Findings:</label>

                                   <!-- <select class="form-control" name="findings" id="findings" style=" border-color: blueviolet;" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="" disabled>Code Red</option>
                                        <option value="C">Carries</option>
                                        <option value="Abr">Abrasion</option>
                                        <option value="Fr">Fracture</option>
                                        <option value="X">Indicted for Extraction</option>
                                        <option value="M">Missing</option>
                                        <option value="Rf">Root Fracment</option>
                                        <option value="" disabled>Code Blue</option>
                                        <option value="WC">Tooth present without carries</option>
                                        <option value="Co">Composite</option>
                                        <option value="FPD">Fixed Partial Denture</option>
                                        <option value="Gi">Glass Ionomer</option>
                                        <option value="I">INI24</option>
                                        <option value="L">21</option>
                                        <option value="Tf">Tf</option>
                                        <option value="Vn">Unfrupied</option>
                                        <option value="Jc">Jacket</option>
                                        <option disabled></option>
                                        <option value="customOption">---Other---</option>
                                        <input class="form-control" placeholder="Enter findings here.." name="findings" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}" required>
                                    </select>-->

                                   <!--<select class="form-control" name="findings" id="findings" style=" border-color: blueviolet;" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="" disabled>Code Red</option>
                                        <option value="C - Carries">C - Carries</option>
                                        <option value="Abr - Abrasion">Abr - Abrasion</option>
                                        <option value="Fr - Fracture">Fr - Fracture</option>
                                        <option value="X - Indicted for Extraction">X - Indicted for Extraction</option>
                                        <option value="M - Missing">M - Missing</option>
                                        <option value="Rf - Root Fracment">Rf - Root Fracment</option>
                                        <option value="" disabled>Code Blue</option>
                                        <option value=" - Tooth present without carries">✔ - Tooth present without carries</option>
                                        <option value="Co - Composite">Co - Composite</option>
                                        <option value="FPD - Fixed Partial Denture">FPD - Fixed Partial Denture</option>
                                        <option value="Gi - Glass Ionomer">Gi - Glass Ionomer</option>
                                        <option value="I - INI24">I - INI24</option>
                                        <option value="L - 21">L - 21</option>
                                        <option value="Tf - Temporary Filling">Tf - Temporary Filling</option>
                                        <option value="Vn - Unfrupied">Vn - Unfrupied</option>
                                        <option value="Jc - Jacket">Jc - Jacket</option>
                                        <option disabled></option>
                                        <option value="customOption">---Other---</option>
                                        <input class="form-control" placeholder="Enter findings here.." name="findings" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}" required>
                                    </select>-->

                                    <select class="form-control" name="findings" id="findings" style=" border-color: blueviolet;" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="" disabled>Code Red</option>
                                        <option value="Carries">Carries</option>
                                        <option value="Abrasion">Abrasion</option>
                                        <option value="Fracture">Fracture</option>
                                        <option value="Indicted for Extraction">Indicted for Extraction</option>
                                        <option value="Missing">Missing</option>
                                        <option value="Root Fragment">Root Fragment</option>
                                        <option value="" disabled>Code Blue</option>
                                        <option value="Tooth Present Without Carries">Tooth Present Without Carries </option>
                                        <option value="Composite">Composite</option>
                                        <option value="Fixed Partial Denture">Fixed Partial Denture</option>
                                        <option value="Glass Ionomer">Glass Ionomer</option>
                                        <option value="INI24">INI24</option>
                                        <option value="21">21</option>
                                        <option value="Temporary Filling">Temporary Filling</option>
                                        <option value="Unfrupied">Unfrupied</option>
                                        <option value="Jacket">Jacket</option>
                                        <option disabled></option>
                                        <option value="customOption">---Other---</option>
                                        <input class="form-control" placeholder="Enter findings here.." name="findings" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}" required>
                                    </select>

                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea class="form-control" placeholder="Enter text here.." name="description" style="height: 200px; border-color: blueviolet;" id="message-text" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="closebtn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="savebtn" name="add-diagnosis-button" class="btn btn-primary">Add</button>
                            </div>
                    


                    </div>
            </div>
        </div>
        </form>



        <div class="legends" style="width: 100%"> 
            <div class="lsquare" style="background-color: grey; height: 10px; width: 10px;"></div>
            <div class="nsquare" >Missing Tooth</div>
            <div class="lsquare" style="background-color: red; height: 10px; width: 10px;"></div>
            <div class="nsquare" >Red Code</div>
            <div class="lsquare" style="background-color: blue; height: 10px; width: 10px;"></div>
            <div class="nsquare" >Blue Code</div>
            <div class="lsquare" style="background-color: green; height: 10px; width: 10px;"></div>
            <div class="nsquare">Green Code</div>
        </div>

        <style>
            .lsquare, .nsquare {
                display: inline-block;
                width: 20%;
                
            }
            .lsquare{
                margin-left: 25px;
            }

            .legends:after{
                content: "";
                display: table;
                clear: both;

            }



            .diagnosis-table {
                margin-top: 100px;
            }

            </style>



        <div class="diagnosis-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="date">Date</th>
                        <th class="tooth-no">Tooth No.</th>
                        <th class="tooth-no">Findings</th>
                        <th class="desc">Description/Procedure</th>
                    </tr>
                </thead>
            <!--<tbody>-->

                    
        <?php
        require 'show-diagnosis.php';

        /**if (isset($_REQUEST['tooth_button'])) {

            switch ($_REQUEST['tooth_button']) {
               case "18":
                    echo "<div>" .displayToothInfo(18, $i). "</div>";
                    break;
               case "17":
                    echo "<div>" .displayToothInfo(17, $i). "</div>";
                    break;
            }
        }**/
        ?>

            <tbody id="tbody18" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(18, $i) ?> </tbody>
            <tbody id="tbody17" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(17, $i) ?> </tbody>
            <tbody id="tbody16" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(16, $i) ?> </tbody>  
            <tbody id="tbody15" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(15, $i) ?> </tbody>  
            <tbody id="tbody14" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(14, $i) ?> </tbody>  
            <tbody id="tbody13" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(13, $i) ?> </tbody>  
            <tbody id="tbody12" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(12, $i) ?> </tbody>           
            <tbody id="tbody11" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(11, $i) ?> </tbody>  
            <tbody id="tbody21" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(21, $i) ?> </tbody>  
            <tbody id="tbody22" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(22, $i) ?> </tbody>  
            <tbody id="tbody23" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(23, $i) ?> </tbody>  
            <tbody id="tbody24" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(24, $i) ?> </tbody>  
            <tbody id="tbody25" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(25, $i) ?> </tbody>  
            <tbody id="tbody26" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(26, $i) ?> </tbody>  
            <tbody id="tbody27" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(27, $i) ?> </tbody>  
            <tbody id="tbody28" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(28, $i) ?> </tbody>  
            <tbody id="tbody48" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(48, $i) ?> </tbody>  
            <tbody id="tbody47" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(47, $i) ?> </tbody>  
            <tbody id="tbody46" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(46, $i) ?> </tbody>  
            <tbody id="tbody45" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(45, $i) ?> </tbody>  
            <tbody id="tbody44" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(44, $i) ?> </tbody>  
            <tbody id="tbody43" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(43, $i) ?> </tbody>  
            <tbody id="tbody42" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(42, $i) ?> </tbody>  
            <tbody id="tbody41" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(41, $i) ?> </tbody>
            <tbody id="tbody31" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(31, $i) ?> </tbody>  
            <tbody id="tbody32" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(32, $i) ?> </tbody>  
            <tbody id="tbody33" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(33, $i) ?> </tbody>  
            <tbody id="tbody34" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(34, $i) ?> </tbody>  
            <tbody id="tbody35" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(35, $i) ?> </tbody>  
            <tbody id="tbody36" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(36, $i) ?> </tbody>  
            <tbody id="tbody37" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(37, $i) ?> </tbody>
            <tbody id="tbody38" class="tbclass" style="display:none; overflow-y:scroll"> <?php echo displayToothInfo(38, $i) ?> </tbody>     

        <!--</tbody>-->


        </table>

        </div>
    </div>



    </div>



    <script>

        $(document).ready(function(){
            $('.tbutton').on('click', function () {
                if(this.value == "18"){
                    $(".tbclass").hide();
                    $("#tbody18").show();
                } else if (this.value == "17"){
                    $(".tbclass").hide();
                    $("#tbody17").show();
                } else if (this.value == "16"){
                    $(".tbclass").hide();
                    $("#tbody16").show();
                } else if (this.value == "15"){
                    $(".tbclass").hide();
                    $("#tbody15").show();
                } else if (this.value == "14"){
                    $(".tbclass").hide();
                    $("#tbody14").show();
                } else if (this.value == "13"){
                    $(".tbclass").hide();
                    $("#tbody13").show();
                } else if (this.value == "12"){
                    $(".tbclass").hide();
                    $("#tbody12").show();
                } else if (this.value == "11"){
                    $(".tbclass").hide();
                    $("#tbody11").show();
                } else if (this.value == "21"){
                    $(".tbclass").hide();
                    $("#tbody21").show();
                } else if (this.value == "22"){
                    $(".tbclass").hide();
                    $("#tbody22").show();
                } else if (this.value == "23"){
                    $(".tbclass").hide();
                    $("#tbody23").show();
                } else if (this.value == "24"){
                    $(".tbclass").hide();
                    $("#tbody24").show();
                } else if (this.value == "17"){
                    $(".tbclass").hide();
                    $("#tbody17").show();
                } else if (this.value == "25"){
                    $(".tbclass").hide();
                    $("#tbody25").show();
                } else if (this.value == "26"){
                    $(".tbclass").hide();
                    $("#tbody26").show();
                } else if (this.value == "27"){
                    $(".tbclass").hide();
                    $("#tbody27").show();
                } else if (this.value == "28"){
                    $(".tbclass").hide();
                    $("#tbody28").show();
                } else if (this.value == "48"){
                    $(".tbclass").hide();
                    $("#tbody48").show();
                } else if (this.value == "47"){
                    $(".tbclass").hide();
                    $("#tbody47").show();
                } else if (this.value == "46"){
                    $(".tbclass").hide();
                    $("#tbody46").show();
                } else if (this.value == "45"){
                    $(".tbclass").hide();
                    $("#tbody45").show();
                } else if (this.value == "44"){
                    $(".tbclass").hide();
                    $("#tbody44").show();
                } else if (this.value == "43"){
                    $(".tbclass").hide();
                    $("#tbody43").show();
                } else if (this.value == "42"){
                    $(".tbclass").hide();
                    $("#tbody42").show();
                } else if (this.value == "41"){
                    $(".tbclass").hide();
                    $("#tbody41").show();
                } else if (this.value == "31"){
                    $(".tbclass").hide();
                    $("#tbody31").show();
                } else if (this.value == "32"){
                    $(".tbclass").hide();
                    $("#tbody32").show();
                } else if (this.value == "33"){
                    $(".tbclass").hide();
                    $("#tbody33").show();
                } else if (this.value == "34"){
                    $(".tbclass").hide();
                    $("#tbody34").show();
                } else if (this.value == "35"){
                    $(".tbclass").hide();
                    $("#tbody35").show();
                } else if (this.value == "36"){
                    $(".tbclass").hide();
                    $("#tbody36").show();
                } else if (this.value == "37"){
                    $(".tbclass").hide();
                    $("#tbody37").show();
                } else if (this.value == "38"){
                    $(".tbclass").hide();
                    $("#tbody38").show();
                }
            });
        });


        $('.sched-btn').click(function() {
            $('nav ul .sched-show').toggleClass("show");
            $('nav ul .first').toggleClass("rotate");
        });
        $('.acct-btn').click(function() {
            $('nav ul .acct-show').toggleClass("show1");
            $('nav ul .second').toggleClass("rotate");
        });
        $('nav ul li').click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        });


        //for disabled button
        var boxes = $('.tcheckbox');

        boxes.on('change', function() {
            $('#adddesc-btn').prop('disabled', !boxes.filter(':checked').length);
        }).trigger('change');

        //for select form
        function toggleField(hideObj,showObj){
            hideObj.disabled=true;		
            hideObj.style.display='none';
            showObj.disabled=false;	
            showObj.style.display='inline';
            showObj.focus();
        }
    </script>

    <!--script for viewing diagnosis-->
    <script type='text/javascript'>
         $(document).ready(function(){
            $('.viewbtn').click(function(){

                var userid = $(this).attr('id');
                
                $.ajax({
                    url: 'viewdiagnosis.php',
                    type: 'post',
                    data: {userid: userid},
                     success: function(result){
                        $('#diagnosis-body').html(result);
                        $('#viewdiagnosis').modal('show'); 
                    }
                });
            });
        });
    </script>

    <!--<script type='text/javascript'>
            $('input:checkbox').click(function(){
                var $inputs = $('input:checkbox')
                if($(this).is(':checked')){
                    $inputs.not(this).prop('disabled',true);
                    /**$inputs.not(this). // <-- disable all but checked one;
                } else{
                    $inputs.prop('disabled',false); // <--**/
                }
            })
    </script>-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>