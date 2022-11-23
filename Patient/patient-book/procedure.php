<?php
    $user = $_GET['currentid'];
    $dentist = $_GET['dentistid']

?>
<html>
    <head> 
         <!--========== BOX ICONS ==========-->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
         <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
         
         <!--========== CSS ==========-->
         <link rel="stylesheet" href="/Modules/secretary/assets/css/styles.css">
        
        <link rel="stylesheet" href="treat-style.css?v=<?php echo time(); ?>">
        <link  rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <link rel="stylesheet" href="indent.css">

    </head>
    <body>
                
       <!--========== HEADER ==========-->
       <header class="header">
          <div class="header__container">
          <img class="header__img" src="/Modules/secretary/assets/img/logo dental.png" alt="">

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
                 <img class="header__img" src="/Modules/secretary/assets/img/logo dental.png" alt="">
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
                                  <a href="/Secretary/php-calendar/select.html" class="nav__dropdown-item">Calendar</a>
                                      <a href="/Secretary/php-calendar/table.php" class="nav__dropdown-item">Schedule List</a>
                                     
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

                  
                  
<br><br>
    <div class="indent-treatment">
        <form id="form" action="calendar.php?dentistid=<?php echo $dentist;?>&currentid=<?= $user;?>" method="POST">
        <h1 class="intro">Select a Procedure</h1>  
        <div class="container">
            <div class="grid-container">
            
                <div class="grid-item">
                    <input type="checkbox" id="trt1" name="list" value="Dental Checkup" />
                    <label for="trt1">
                        <img src="treatment-images/Dentalcheck-up.png" />
                    </label>
                    <h2> Dental Checkup </h2>
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt2" name="list" value="Cosmetic Dentistry" />
                    <label for="trt2">
                        <img src="treatment-images/CosmeticDentistry.png" />
                    </label>
                    <h2> Cosmetic Dentistry </h2>
                
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt3" name="list" value="Dental Bridge" />
                    <label for="trt3">
                        <img src="treatment-images/DentalBridge.png" />
                    </label>
                    <h2> Dental Bridge</h2>
            
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt4" name="list" value="Dental Crown" />
                    <label for="trt4">
                        <img src="treatment-images/DentalCrown.png" />
                    </label>
                    <h2> Dental Crown </h2>
                
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt5" name="list" value="Dental Implants" />
                    <label for="trt5">
                        <img src="treatment-images/DentalImplants.png" />
                    </label>
                    <h2> Dental Implants </h2>
                
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt6" name="list" value="Orhtodontics" />
                    <label for="trt6">
                        <img src="treatment-images/Orthoodntics.png" />

                    </label>
                    <h2> Orthodontics </h2>
                
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt7" name="list" value="Odontectomy" />
                    <label for="trt7">
                        <img src="treatment-images/Odontectomy.png" />

                    </label>
                    <h2> Odontectomy </h2>
                
                </div>

                <div class="grid-item">
                    <input type="checkbox" id="trt8" name="list" value="Restoration" />
                    <label for="trt8">
                        <img src="treatment-images/Restoration.png" />

                    </label>
                    <h2> Restoration </h2>
                
                </div>


                <div class="grid-item">
                    <input type="checkbox" id="trt9" name="list" value="Root Canal Treatment" />
                    <label for="trt9">
                        <img src="treatment-images/RootCanalTreatment.png" />

                    </label>
                    <h2> Root Canal Treatment </h2>
                
                </div>
                
            

            </div>
        </div>
        

            <input type="hidden" name="userid" value="<?php echo $user;?>" />
            <input type="hidden" name="userid" value="<?php echo $dentist;?>" />
            <div class="indent">
<input type="submit" name="submit"  value="proceed booking" />
</div>   
          
        </form>
        </div>
</div>

<script src="checkboxscript.js"></script>
</body>
</html>