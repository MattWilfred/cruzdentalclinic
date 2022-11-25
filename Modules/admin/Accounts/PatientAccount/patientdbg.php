<?php
  //include_once 'userlogs.php';

  require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function fetchDentalBG($uid){
    global $connection;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $dentalBG = mysqli_query($connection, "SELECT * FROM dentalbackground WHERE user_id = $uid ORDER  BY date_added DESC
    LIMIT  1");
    return $dentalBG;
}

function fetchAllDentalBackground($uid){
    global $connection;
    $allDentalBG = mysqli_query($connection, "SELECT * FROM dentalbackground WHERE user_id = $uid ORDER BY date_added DESC");
    return $allDentalBG;
}

function fetchHistoryDentalBG($uid, $dbgid){
    global $connection;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $dentalBG = mysqli_query($connection, "SELECT * FROM dentalbackground WHERE dental_background_id = $dbgid AND user_id = $uid ORDER BY date_added DESC
    LIMIT  1" );
    return $dentalBG;
}

function fetchUniqueDentalBG($dbgid){
    global $connection;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $dentalBG = mysqli_query($connection, "SELECT * FROM dentalbackground WHERE dental_background_id = $dbgid");
    return $dentalBG;
}
?>

<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="patientdbg-style.css?v=<?php echo time(); ?>">
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
           <img src="/Modules/dentist/assets/img/logo dental.png" alt="" class="header__img">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Modules/dentist/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="/Modules/dentist/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                            <a href="/Modules/dentist/blockdate.php" class="nav__dropdown-item">Block Date</a>
                             
                                <a href="/Modules/dentist/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                               
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
                                <a href="/Modules/dentist/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>

                  
                  </div>

                <a href="/Modules/dentist/announcement/announcement.php" class="nav__link">
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
            //include 'dbcon.php';
            $currentid = $_GET['id'];

            $sql = "SELECT * from users where id = $currentid";
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
                    <!--<div class="edit=prf" style="text-align: center; margin-top: 15%;">
                        <a href="patientlist.php">
                            <button>
                                <i class="fa-solid fa-pen"></i>
                                Edit Profile
                            </button>
                        </a>
                    </div>-->

                
                </div>
            <?php

            }


        
    ?>


        <div class="navbar">
            <div class="topnav">
                <a href="appthistory.php? id=<?= $currentid; ?>">Appointment History</a>
                <a href="patientmbg.php? id=<?= $currentid; ?>">Medical Background</a>
                <a href="patientdiagnosis.php? id=<?= $currentid; ?>">Diagnosis</a>
                <a class="active">Dental Background</a>
                <a href="patientprescription.php? id=<?= $currentid; ?>">E-Prescription</a>
                <a href="patientreferral.php? id=<?= $currentid; ?>">Referral</a>
            </div>

            <div class="dental-bg">

                <div class="dentalbg-header">
                    <h2>Dental Background </h2>
                </div>

                <?php

                $query = fetchDentalBG($currentid);

                $dBrow = mysqli_fetch_array($query);

                if(mysqli_num_rows($query) !== 0){

                    echo '<div class="dbg-edit"><button id="edit-button" class="dbg-button">Add</button></div>';
                    echo '<div class="dbg-view"><button id="view-button" type="button" data-bs-target="#viewprev" data-bs-toggle="modal" class="dbg-vbutton">Dental Background History</button></div>';
                }

                ?>
            <form name="form1" onsubmit="" method="POST" action="add-edit-dbg.php">
                <div class="form1st">
                    
                        <input type="hidden" name="id" value="<?php echo $currentid?>">
                        <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>

                        <div style="margin-bottom: 2%;">
                            <input type="checkbox" id="checkAll">Select/Deselect All
                        </div>
                        
                        

                        <div> Have you had any serious problem/s with any previous dental treatment? 
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb1" value="1"
                                <?php if ($dBrow['prev_treatment_problem'] === '1') echo 'checked="checked"';?> >
                            </label>
                        </div>
                        
                        <div> Have you had any injuries to your face, jaw, or teeeth?
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb2" value="1"
                                <?php if ($dBrow['injury'] === '1') echo 'checked="checked"';?> >
                            </label>
                        </div>

                        <div> Do you ever feel like you have a dry mouth?
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb3" value="1"
                                <?php if ($dBrow['dry_mouth'] === '1') echo 'checked="checked"';?> >
                            </label>
                        </div>

                        <div> Have you ever had an unusual reaction to local anaesthetic (numbing)?
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb4" value="1"
                                <?php if ($dBrow['anesthetic_reaction'] === '1') echo 'checked="checked"';?> >
                            </label>
                        </div>

                        <div> Do you wear full/partial dentures?
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb5" value="1"
                                <?php if ($dBrow['dentures'] === '1') echo 'checked="checked"';?> >
                            </label>
                        </div>

                        <div> Have you had any teeth replaced with a dental implant/s?
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb6" value="1"
                                <?php if ($dBrow['dental_implants'] === '1') echo 'checked="checked"';?>>
                            </label>
                        </div>

                        <div> Have you had any teeth replaced with a fixed bridge/s?
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cb7" value="1"
                                <?php if ($dBrow['fixed_bridges'] === '1') echo 'checked="checked"';?> >
                            </label>
                        </div>

                        <div> Have you had any of the following treatments?
                            <div class="treatments">
                                <div> Gum periodontal treatment
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cb8" value="1"
                                        <?php if ($dBrow['gum_periodontal'] === '1') echo 'checked="checked"';?> >
                                    </label>
                                </div>
                                
                                <div> Orthodontics (braces)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cb9" value="1"
                                        <?php if ($dBrow['orthodontics'] === '1') echo 'checked="checked"';?> >
                                    </label>
                                </div>

                                <div> Endodontics (root canal)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cb10" value="1"
                                        <?php if ($dBrow['endodontics'] === '1') echo 'checked="checked"';?> >
                                    </label>
                                </div>

                                <div> Extraction (teeth removed)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cb11" value="1"
                                        <?php if ($dBrow['extraction'] === '1') echo 'checked="checked"';?> >
                                    </label>
                                </div>

                                <div>Bleaching/whitening
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cb12" value="1"
                                        <?php if ($dBrow['bleaching'] === '1') echo 'checked="checked"';?> >
                                    </label>
                                </div>

                            </div>
                        </div>
                        
                            <div>
                                Check if you have any problems with the following:

                                <div class="subf2">
                                    <div>
                                        <input type="checkbox" name="cb13" value="1"
                                        <?php if ($dBrow['bad_breath'] === '1') echo 'checked="checked"';?> >Bad breath
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb14" value="1"
                                        <?php if ($dBrow['bleeding_gums'] === '1') echo 'checked="checked"';?> >Bleeding, sensitive gums
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb15" value="1"
                                        <?php if ($dBrow['canker_sore'] === '1') echo 'checked="checked"';?> >Canker sore or cold sores
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb16" value="1"
                                        <?php if ($dBrow['clicking_jaw'] === '1') echo 'checked="checked"';?> >Clicking or popping jaw: right or left
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb17" value="1"
                                        <?php if ($dBrow['trapped_food'] === '1') echo 'checked="checked"';?> >Food trapped between teeth
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb18" value="1"
                                        <?php if ($dBrow['grinding_teeth'] === '1') echo 'checked="checked"';?> >Grinding or clenching teeth
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb19" value="1"
                                        <?php if ($dBrow['loose_teeth'] === '1') echo 'checked="checked"';?> >Loose teeth
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb20" value="1"
                                        <?php if ($dBrow['broken_fillings'] === '1') echo 'checked="checked"';?> >Broken fillings
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb21" value="1"
                                        <?php if ($dBrow['periodontal'] === '1') echo 'checked="checked"';?> >Periodontal treatment
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb22" value="1"
                                        <?php if ($dBrow['cold_sensitivity'] === '1') echo 'checked="checked"';?> >Sensitivity to cold
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb23" value="1"
                                        <?php if ($dBrow['heat_sensitivity'] === '1') echo 'checked="checked"';?> >Sensitivity to heat
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb24" value="1"
                                        <?php if ($dBrow['sweet_sensitivity'] === '1') echo 'checked="checked"';?> >Sensitivity to sweets
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb25" value="1"
                                        <?php if ($dBrow['biting_sensitivity'] === '1') echo 'checked="checked"';?> >Sensitivity to biting
                                    </div>

                                    <div>
                                        <input type="checkbox" name="cb26" value="1"
                                        <?php if ($dBrow['staining'] === '1') echo 'checked="checked"';?> >Staining
                                    </div>

                                </div>
                            </div>
                        

                        <!--for cancel and save buttons
                        <div class="dbgcancelorsave">
                            <button class="dbg-cancelbutton">Cancel</button>
                            <input class="dbg-savebutton" type="submit" name="submit"/>
                        </div>-->

     
                        <div id="save-button-div" class="dbg-save" style="display:none">
                            <input type="submit" id="cancel-button" class="dbg-cancelbutton" name="cancel" value="Cancel"/>
                            <input type="submit" id="save-button" class="dbg-savebutton" name="save" value="Save"/>
                        </div>
                  
                        

                        <?php

                            if(mysqli_num_rows($query) === 0){    
                                echo '<div class="dbgcancelorsave">';
                                echo '<button class="dbg-cancelbutton">Cancel</button>';
                                echo '<input class="dbg-savebutton" type="submit" name="submit"/>';
                            } else {
                                //function to disable Checkbox
                                echo '<script>$("input:checkbox").prop("disabled", true);</script>';
                            }
                            ?>
                </div>
                <div id="save-button-div" class="dbg-save" style="display:none">
                            <input type="submit" id="cancel-button" class="dbg-cancelbutton" name="cancel" value="Cancel"/>
                            <input type="submit" id="save-button" class="dbg-savebutton" name="save" value="Save"/>
                        </div>


            </form>

            </div>

        </div>


                        <!-- Modal for viewing previous entries -->
                        <div class="modal fade" id="viewprev" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="viewprev-cont">
                    <div class="modal-header">
                        <h6>Previous Entries</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="presc-body">

                    <form class="" method="GET" action="historydbg.php">
                        <input type="hidden" name="id" value="<?php echo $currentid?>">
                        <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>

                        <table class="table table-sm">
                            <thead>
                                <tr>

                                    <th scope="col">Date Added</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                    
                                $adb = fetchAllDentalBackground($currentid);

                                while ($hrow = mysqli_fetch_assoc($adb)){


                                //echo "<option style='width:100px' value='" .$row['medicalbackground_id']. "'>" .$count. " - " .$row['date_added']. "</option>";
                                echo "<tr>";
                                    echo "<td>" .$hrow['date_added']. "</td>"; 
                                    echo "<td><button class='mbg-viewbutton btn btn-primary' type='submit' name='view-button' value='" .$hrow['dental_background_id']. "'>View</button></td>";
                                echo "</tr>";
                                
                                }                         
                                ?>

                            </tbody>


                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


                          <!-- Modal for viewing dental background -->
                          <div class="modal fade" id="viewdbg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="viewpresc-img">
                    <div class="modal-header">
                        <h5>Prescription Details</h5>
                        <button type="button" class="btn-close" data-bs-target="#viewprev" data-bs-toggle="modal" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="dbg-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-target="#viewprev" class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>






    <script>
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

        $('#edit-button').click(function() {
            $("#save-button-div").css("display","block")
            $("input:checkbox").prop("disabled", false);
            $("#edit-button").css("display", "none");
            $("#view-button").css("display", "none");
        });

        $('#save-button').click(function() {
            $("#edit-button").css("display", "block");
            $("#view-button").css("display", "block");
        });


        //for disabled button
        var boxes = $('.tcheckbox');

        boxes.on('change', function() {
            $('#adddesc-btn').prop('disabled', !boxes.filter(':checked').length);
        }).trigger('change');


        //for selecting/deselecting all checkboxes
        $("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
    </script>

           <!--script for viewing mbg-->
           <script type='text/javascript'>
         $(document).ready(function(){
            $('.viewbtn').click(function(){

                var dbgid = $(this).attr('id');
                
                $.ajax({
                    url: 'view-dbg.php',
                    type: 'post',
                    data: {dbgid: dbgid},
                     success: function(result){
                        $("#dbg-body").html(result);
                        $('#viewdbg').modal('show'); 
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>
