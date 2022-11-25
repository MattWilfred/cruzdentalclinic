<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
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
    <div class="side-menu">


        <nav>

            <header>
                <div class="logo"> <img src="logo dental.png" alt="dental logo"></div>
                Cruz Dental Clinic
            </header>


            <ul>

                <li>
                    <a href="index.html">
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
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-tooth"></i> Dentist
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-user"></i> Patients
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-users-gear"></i> Administrator
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#about"> <i class="fa-solid fa-money-bill-wave"></i> Billing </a>
                </li>
                <li><a href="#announcements"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
            </ul>


            <div class="logout">
                <li>
                    <a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
                </li>

            </div>



        </nav>

    </div>


    <div class="body_content">
        <a href="patientlist.php">
            <button>
                <i class="fa-solid fa-angle-left"></i>
                Back to Patient List
            </button>
        </a>
        <h1>Patient Profile</h1>
    </div>



    <div class="container">
    <?php
            include 'dbcon.php';
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
                <div class="mbg-edit"><button class="mbg-button">Edit</button>
                </div>

                <div class="med-form">
                    <form class="" onsubmit="">
                        <div>
                            <input type="checkbox" value="">AIDS/HIV positive
                        </div>
                        <div>
                            <input type="checkbox" value="">Anemia
                        </div>
                        <div>
                            <input type="checkbox" value="">Arthritis
                        </div>
                        <div>
                            <input type="checkbox" value="">Artificial heart valve/s
                        </div>
                        <div>
                            <input type="checkbox" value="">Artificial joint/s
                        </div>
                        <div>
                            <input type="checkbox" value="">Asthma
                        </div>
                        <div>
                            <input type="checkbox" value="">Back problems
                        </div>
                        <div>
                            <input type="checkbox" value="">Blood disease
                        </div>
                        <div>
                            <input type="checkbox" value="">Cancer
                            <div class="mbg-describe">
                                Describe:
                                <input type="text">
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" value="">Chemo/radiation therapy
                        </div>
                        <div>
                            <input type="checkbox" value="">Circulation problems
                        </div>
                        <div>
                            <input type="checkbox" value="">Cortisone treatments
                        </div>
                        <div>
                            <input type="checkbox" value="">Cough, persistent or bloody
                        </div>
                        <div>
                            <input type="checkbox" value="">Diabetes
                        </div>
                        <div>
                            <input type="checkbox" value="">Emphysema
                        </div>
                        <div>
                            <input type="checkbox" value="">Epilepsy
                        </div>
                        <div>
                            <input type="checkbox" value="">Fainting
                        </div>
                        <div>
                            <input type="checkbox" value="">Food allergies
                        </div>
                        <div>
                            <input type="checkbox" value="">Headaches, frequent/severe
                        </div>
                        <div>
                            <input type="checkbox" value="">Hearing loss
                        </div>
                        <div>
                            <input type="checkbox" value="">Heart murmur
                        </div>
                        <div>
                            <input type="checkbox" value="">Heart, any problems
                            <div class="mbg-describe">
                                Describe:
                                <input type="text">
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" value="">Hemophilia
                        </div>
                        <div>
                            <input type="checkbox" value="">Herpes
                        </div>
                        <div>
                            <input type="checkbox" value="">Hepatitis A B C D
                        </div>
                        <div>
                            <input type="checkbox" value="">High blood pressure
                        </div>
                        <div>
                            <input type="checkbox" value="">Jaundice
                        </div>
                        <div>
                            <input type="checkbox" value="">Jaw pain
                        </div>
                        <div>
                            <input type="checkbox" value="">Kidney disease
                        </div>
                        <div>
                            <input type="checkbox" value="">Liver disease
                        </div>
                        <div>
                            <input type="checkbox" value="">Low blood pressure
                        </div>
                        <div>
                            <input type="checkbox" value="">Mitral valve prolapse
                        </div>
                        <div>
                            <input type="checkbox" value="">Nervous problems
                        </div>
                        <div>
                            <input type="checkbox" value="">Pacemaker
                        </div>
                        <div>
                            <input type="checkbox" value="">Psychiatric care
                        </div>
                        <div>
                            <input type="checkbox" value="">Respiratory disease
                        </div>
                        <div>
                            <input type="checkbox" value="">Rheumatic fever
                        </div>
                        <div>
                            <input type="checkbox" value="">Seizure disorders
                        </div>
                        <div>
                            <input type="checkbox" value="">Shingles
                        </div>
                        <div>
                            <input type="checkbox" value="">Shortness of breath
                        </div>
                        <div>
                            <input type="checkbox" value="">Sinus problems
                        </div>
                        <div>
                            <input type="checkbox" value="">Skin rash
                        </div>
                        <div>
                            <input type="checkbox" value="">Stroke
                        </div>
                        <div>
                            <input type="checkbox" value="">Surgical implants
                        </div>
                        <div>
                            <input type="checkbox" value="">Swelling, feet or ankles
                        </div>
                        <div>
                            <input type="checkbox" value="">Thyroid problems
                        </div>
                        <div>
                            <input type="checkbox" value="">Tuberculosis
                        </div>
                        <div>
                            <input type="checkbox" value="">Ulcer/colitics/acid reflux
                        </div>
                        <div>
                            <input type="checkbox" value="">Visual impairment
                        </div>
                        <div>
                            <input type="checkbox" value="">Other
                            <div class="mbg-describe">
                                Describe:
                                <input type="text">
                            </div>
                        </div>
                    </form>
                </div>

                <!--for cancel and save buttons-->
                <div class="mbgcancelorsave">
                    <button class="mbg-cancelbutton">Cancel</button>
                    <button class="mbg-savebutton">Save</button>
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


        //for disabled button
        var boxes = $('.tcheckbox');

        boxes.on('change', function() {
            $('#adddesc-btn').prop('disabled', !boxes.filter(':checked').length);
        }).trigger('change');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>
