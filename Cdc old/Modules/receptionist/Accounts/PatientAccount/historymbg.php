<?php

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function fetchMedicalBG($uid){
    global $connection;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $medicalBG = mysqli_query($connection, "SELECT * FROM medicalbackground WHERE user_id = $uid ORDER BY date_added DESC
    LIMIT  1" );
    return $medicalBG;
}

function fetchAllMedicalBackground($uid){
    global $connection;
    $allMedicalBG = mysqli_query($connection, "SELECT * FROM medicalbackground WHERE user_id = $uid ORDER BY date_added DESC");
    return $allMedicalBG;
}

function fetchHistoryMedicalBG($uid, $mbgid){
    global $connection;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $medicalBG = mysqli_query($connection, "SELECT * FROM medicalbackground WHERE medicalbackground_id = $mbgid AND user_id = $uid ORDER BY date_added DESC
    LIMIT  1" );
    return $medicalBG;
}

function fetchUniqueMedicalBG($id){
    global $connection;
    //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
    $medicalBG = mysqli_query($connection, "SELECT * FROM medicalbackground WHERE medicalbackground_id = $id");
    return $medicalBG;
}


?>


<html lang=en dir="ltr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="patientmbg-style.css?v=<?php echo time(); ?>">
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

            <i class='bx bxs-bell bx-flip-horizontal bx-tada nav__icon'></i>


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
           <img src="/Modules/receptionist/assets/img/logo dental.png" alt="" class="header__img">
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
                        <a href="/Modules/receptionist/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/receptionist/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/receptionist/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                <a href="/Modules/receptionist/blockdate.php" class="nav__dropdown-item">Block Date</a>
                                
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

                
                </div>
            <?php

            }


        
    ?>


        <div class="navbar">
            <div class="topnav">
                <a href="appthistory.php? id=<?= $currentid; ?>">Appointment History</a>
                <a class="active">Medical Background</a>
                <a href="patientdiagnosis.php? id=<?= $currentid; ?>">Diagnosis</a>
                <a href="patientdbg.php? id=<?= $currentid; ?>">Dental Background</a>
                <a href="patientprescription.php? id=<?= $currentid; ?>">E-Prescription</a>
                <a href="patientreferral.php? id=<?= $currentid; ?>">Referral</a>
            </div>

            <div class="medical-bg">

                <div class="medicalbg-header">
                    <h2>Medical Background </h2>
                </div>

                <?php

                $mbgid = $_GET['view-button'];

                $query = fetchUniqueMedicalBG($mbgid);

                $dBrow = mysqli_fetch_array($query);

                if(mysqli_num_rows($query) !== 0){

                    echo '<div class="mbg-edit"><button id="edit-button" class="mbg-button">Edit</button></div>';
                    echo '<div class="mbg-view"><button id="view-button" type="button" data-bs-target="#viewprev" data-bs-toggle="modal" class="mbg-vbutton">Medical Background History</button></div>';
                }

                ?>
            <div class="med-form">
                    <form class=""  method="POST" action="add-edit-mbg.php">
                    <div class="original-div" id="original-div">
                        <input type="hidden" name="id" value="<?php echo $currentid?>">
                        <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>

                        <div style="margin-bottom: 2%;">
                            <input type="checkbox" id="checkAll">Select/Deselect All
                        </div>

                        <div class="checkboxes">  
                       
                        <div>
                            <input type="checkbox" name="cb1" value="1"
                            <?php if ($dBrow['aids'] === '1') echo 'checked="checked"';?> >AIDS/HIV positive
                        </div>
                        <div>
                            <input type="checkbox" name="cb2" value="1"
                            <?php if ($dBrow['anemia'] === '1') echo 'checked="checked"';?> >Anemia
                        </div>
                        <div>
                            <input type="checkbox" name="cb3" value="1"
                            <?php if ($dBrow['arthritis'] === '1') echo 'checked="checked"';?> >Arthritis
                        </div>
                        <div>
                            <input type="checkbox" name="cb4" value="1"
                            <?php if ($dBrow['artificial_heart_valve'] === '1') echo 'checked="checked"';?> >Artificial heart valve/s
                        </div>
                        <div>
                            <input type="checkbox" name="cb5" value="1"
                            <?php if ($dBrow['artificial_joint'] === '1') echo 'checked="checked"';?> >Artificial joint/s
                        </div>
                        <div>
                            <input type="checkbox" name="cb6" value="1"
                            <?php if ($dBrow['asthma'] === '1') echo 'checked="checked"';?> >Asthma
                        </div>
                        <div>
                            <input type="checkbox" name="cb7" value="1"
                            <?php if ($dBrow['back_problems'] === '1') echo 'checked="checked"';?> >Back problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb8" value="1"
                            <?php if ($dBrow['blood_disease'] === '1') echo 'checked="checked"';?> >Blood disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb9" value="1"
                            <?php if ($dBrow['cancer'] === '1') echo 'checked="checked"';?> >Cancer
                            <div class="mbg-describe">
                                Describe:
                                <input type="text" name="cb51" 
                                value= " <?php echo $dBrow['cancer_type']; ?> " >
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" name="cb10" value="1"
                            <?php if ($dBrow['chemo'] === '1') echo 'checked="checked"';?> >Chemo/radiation therapy
                        </div>
                        <div>
                            <input type="checkbox" name="cb11" value="1"
                            <?php if ($dBrow['circulation_problems'] === '1') echo 'checked="checked"';?> >Circulation problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb12" value="1"
                            <?php if ($dBrow['cortisone'] === '1') echo 'checked="checked"';?> >Cortisone treatments
                        </div>
                        <div>
                            <input type="checkbox" name="cb13" value="1"
                            <?php if ($dBrow['cough'] === '1') echo 'checked="checked"';?> >Cough, persistent or bloody
                        </div>
                        <div>
                            <input type="checkbox" name="cb14" value="1"
                            <?php if ($dBrow['diabetes'] === '1') echo 'checked="checked"';?> >Diabetes
                        </div>
                        <div>
                            <input type="checkbox" name="cb15" value="1"
                            <?php if ($dBrow['emphysema'] === '1') echo 'checked="checked"';?>>Emphysema
                        </div>
                        <div>
                            <input type="checkbox" name="cb16" value="1"
                            <?php if ($dBrow['epilepsy'] === '1') echo 'checked="checked"';?>>Epilepsy
                        </div>
                        <div>
                            <input type="checkbox" name="cb17" value="1"
                            <?php if ($dBrow['fainting'] === '1') echo 'checked="checked"';?>>Fainting
                        </div>
                        <div>
                            <input type="checkbox" name="cb18" value="1"
                            <?php if ($dBrow['food_allergies'] === '1') echo 'checked="checked"';?> >Food allergies
                        </div>
                        <div>
                            <input type="checkbox" name="cb19" value="1"
                            <?php if ($dBrow['headaches'] === '1') echo 'checked="checked"';?> >Headaches, frequent/severe
                        </div>
                        <div>
                            <input type="checkbox" name="cb20" value="1"
                            <?php if ($dBrow['hearing_loss'] === '1') echo 'checked="checked"';?>>Hearing loss
                        </div>
                        <div>
                            <input type="checkbox" name="cb21" value="1"
                            <?php if ($dBrow['heart_murmur'] === '1') echo 'checked="checked"';?> >Heart murmur

                        </div>
                        <div>
                            <input type="checkbox" name="cb22" value="1"
                            <?php if ($dBrow['heart_problem'] === '1') echo 'checked="checked"';?>>Heart, any problems
                            <div class="mbg-describe">
                                Describe:
                                <input type="text" name="cb52" 
                                value=" <?php echo $dBrow['heart_problem_type']; ?> ">
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" name="cb23" value="1"
                            <?php if ($dBrow['hemophilia'] === '1') echo 'checked="checked"';?>>Hemophilia
                        </div>
                        <div>
                            <input type="checkbox" name="cb24" value="1"
                            <?php if ($dBrow['herpes'] === '1') echo 'checked="checked"';?> >Herpes
                        </div>
                        <div>
                            <input type="checkbox" name="cb25" value="1"
                            <?php if ($dBrow['hepatitis'] === '1') echo 'checked="checked"';?> >Hepatitis A B C D
                        </div>
                        <div>
                            <input type="checkbox" name="cb26" value="1"
                            <?php if ($dBrow['high_blood'] === '1') echo 'checked="checked"';?>>High blood pressure
                        </div>
                        <div>
                            <input type="checkbox" name="cb27" value="1"
                            <?php if ($dBrow['jaundice'] === '1') echo 'checked="checked"';?> >Jaundice
                        </div>
                        <div>
                            <input type="checkbox" name="cb28" value="1"
                            <?php if ($dBrow['jaw_pain'] === '1') echo 'checked="checked"';?> >Jaw pain
                        </div>
                        <div>
                            <input type="checkbox" name="cb29" value="1"
                            <?php if ($dBrow['kidney_disease'] === '1') echo 'checked="checked"';?> >Kidney disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb30" value="1"
                            <?php if ($dBrow['liver_disease'] === '1') echo 'checked="checked"';?> >Liver disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb31" value="1"
                            <?php if ($dBrow['low_blood'] === '1') echo 'checked="checked"';?> >Low blood pressure
                        </div>
                        <div>
                            <input type="checkbox" name="cb32" value="1"
                            <?php if ($dBrow['mitral_valve'] === '1') echo 'checked="checked"';?> >Mitral valve prolapse
                        </div>
                        <div>
                            <input type="checkbox" name="cb33" value="1"
                            <?php if ($dBrow['nervous_prob'] === '1') echo 'checked="checked"';?> >Nervous problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb34" value="1"
                            <?php if ($dBrow['pacemaker'] === '1') echo 'checked="checked"';?> >Pacemaker
                        </div>
                        <div>
                            <input type="checkbox" name="cb35" value="1"
                            <?php if ($dBrow['psychiatric_care'] === '1') echo 'checked="checked"';?> >Psychiatric care
                        </div>
                        <div>
                            <input type="checkbox" name="cb36" value="1"
                            <?php if ($dBrow['respiratory_disease'] === '1') echo 'checked="checked"';?> >Respiratory disease
                        </div>
                        <div>
                            <input type="checkbox" name="cb37" value="1"
                            <?php if ($dBrow['rheumatic_fever'] === '1') echo 'checked="checked"';?> >Rheumatic fever
                        </div>
                        <div>
                            <input type="checkbox" name="cb38" value="1"
                            <?php if ($dBrow['seizure'] === '1') echo 'checked="checked"';?> >Seizure disorders
                        </div>
                        <div>
                            <input type="checkbox" name="cb39" value="1"
                            <?php if ($dBrow['shingles'] === '1') echo 'checked="checked"';?> >Shingles
                        </div>
                        <div>
                            <input type="checkbox" name="cb40" value="1"
                            <?php if ($dBrow['shortness_breath'] === '1') echo 'checked="checked"';?> >Shortness of breath
                        </div>
                        <div>
                            <input type="checkbox" name="cb41" value="1"
                            <?php if ($dBrow['sinus_problems'] === '1') echo 'checked="checked"';?> >Sinus problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb42" value="1"
                            <?php if ($dBrow['skin_rash'] === '1') echo 'checked="checked"';?> >Skin rash
                        </div>
                        <div>
                            <input type="checkbox" name="cb43" value="1"
                            <?php if ($dBrow['stroke'] === '1') echo 'checked="checked"';?> >Stroke
                        </div>
                        <div>
                            <input type="checkbox" name="cb44" value="1"
                            <?php if ($dBrow['surgical_implants'] === '1') echo 'checked="checked"';?> >Surgical implants
                        </div>
                        <div>
                            <input type="checkbox" name="cb45" value="1"
                            <?php if ($dBrow['swelling'] === '1') echo 'checked="checked"';?> >Swelling, feet or ankles
                        </div>
                        <div>
                            <input type="checkbox" name="cb46" value="1" 
                            <?php if ($dBrow['thyroid_problems'] === '1') echo 'checked="checked"';?> >Thyroid problems
                        </div>
                        <div>
                            <input type="checkbox" name="cb47" value="1"
                            <?php if ($dBrow['tuberculosis'] === '1') echo 'checked="checked"';?> >Tuberculosis
                        </div>
                        <div>
                            <input type="checkbox" name="cb48" value="1"
                            <?php if ($dBrow['ulcer'] === '1') echo 'checked="checked"';?> >Ulcer/colitics/acid reflux
                        </div>
                        <div>
                            <input type="checkbox" name="cb49" value="1"
                            <?php if ($dBrow['visual_impairment'] === '1') echo 'checked="checked"';?> >Visual impairment
                        </div>
                        <div>
                            <input type="checkbox" name="cb50" value="1"
                            <?php if ($dBrow['other'] === '1') echo 'checked="checked"';?> >Other
                            <div class="mbg-describe">
                                Describe:
                                <input type="text" name="cb53" 
                                value=" <?php echo $dBrow['other_type']; ?> ">
                            </div>
                        </div>
                    </div>

    
                        <div id="save-button-div" class="mbg-save" style="display:none">
                            <input type="submit" id="cancel-button" class="mbg-cancelbutton" name="cancel" value="Cancel"/>
                            <input type="submit" id="save-button" class="mbg-savebutton" name="save" value="Save"/>
                        </div>


                        <?php

                            if(mysqli_num_rows($query) === 0){    
                                echo '<div class="mbgcancelorsave">';
                                echo '<button class="mbg-cancelbutton">Cancel</button>';
                                echo '<input class="mbg-savebutton" type="submit" name="submit"/>';
                            } else {
                                //function to disable Checkbox
                                echo '<script>$("input:checkbox").prop("disabled", true);</script>';
                            }
                        ?>

                        <!--<div class="mbgcancelorsave">
                            <button class="mbg-cancelbutton">Cancel</button>
                            <input class="mbg-savebutton" type="submit" name="submit"/>
                        </div>-->


                        </div>
                        <div id="save-button-div" class="mbg-save" style="display:none">
                            <input type="submit" id="cancel-button" class="mbg-cancelbutton" name="cancel" value="Cancel"/>
                            <input type="submit" id="save-button" class="mbg-savebutton" name="save" value="Save"/>
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

                    <form class="" method="GET" action="historymbg.php">
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
                    
                                $adb = fetchAllMedicalBackground($currentid);

                                while ($hrow = mysqli_fetch_assoc($adb)){


                                //echo "<option style='width:100px' value='" .$row['medicalbackground_id']. "'>" .$count. " - " .$row['date_added']. "</option>";
                                echo "<tr>";
                                    echo "<td>" .$hrow['date_added']. "</td>"; 
                                    echo "<td><button class='mbg-viewbutton btn btn-primary' type='submit' name='view-button' value='" .$hrow['medicalbackground_id']. "'>View</button></td>";
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
                </form>
            </div>
        </div>


                          <!-- Modal for viewing medical background -->
                          <div class="modal fade" id="viewmbg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="viewpresc-img">
                    <div class="modal-header">
                        <h5>Prescription Details</h5>
                        <button type="button" class="btn-close" data-bs-target="#viewprev" data-bs-toggle="modal" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="mbg-body">
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
        });

        $('#save-button').click(function() {
            $("#edit-button").css("display", "block");
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

                var mbgid = $(this).attr('id');
                
                $.ajax({
                    url: 'view-mbg.php',
                    type: 'post',
                    data: {mbgid: mbgid},
                     success: function(result){
                        $("#mbg-body").html(result);
                        $('#viewmbg').modal('show'); 
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>