<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="patientreferral-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <a href="patientmbg.php? id=<?= $currentid; ?>">Medical Background</a>
                <a href="patientdiagnosis.php? id=<?= $currentid; ?>">Diagnosis</a>
                <a href="patientdbg.php? id=<?= $currentid; ?>">Dental Background</a>
                <a href="patientprescription.php? id=<?= $currentid; ?>">E-Prescription</a>
                <a class="active">Referral</a>
            </div>

            <div class="prescription">
                <div class="presc-header">
                    <h2>Referral </h2>
                </div>
                <div class="addpresc-btn"><button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" class="presc-button">Add</button>
                </div>

                <div class="presc-cont">
                    <div class="data-containter">
                        <div class="each-presc">
                            <!--
                            <?php
                                include 'dbcon.php';

                                $query_presc = "SELECT * from prescriptions ORDER by prescriptiondate DESC";
                                $res = mysqli_query($connection,$query_presc);

                                if(mysqli_num_rows($res)>0){

                                    while($row = mysqli_fetch_array($res)){
                            ?>
                                <div class="presc-body">
                                    <div class="col1">
                                        <div>
                                            <h4>
                                                <?php echo $row['generic'] ?>
                                            </h4>
                                            <p>Prescribed on:
                                                <?php echo $row['prescriptiondate'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="drtn">
                                        <h6>Duration </h5>
                                            <p>Until
                                                <?php echo $row['duration'] ?>
                                            </p>
                                    </div>
                                    <div class="freq">
                                        <h6>Frequency </h5>
                                            <p>
                                                <?php echo $row['frequency'] ?>
                                            </p>
                                    </div>

                                    <div class="actions">
                                        <button type="button" id="<?php echo $row['prescription_id'] ?>" class="viewbtn btn btn-primary btn-sm">View</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </div>





                                <?php
                                    }

                                }else {
                                    echo "No prescriptions";
                                }
                            ?>
                            -->

                        </div>
                    </div>


                </div>





            </div>



        </div>

        <!-- Modal -->
        <div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Referral</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="addprescription.php" method="post" style="overflow:scroll">
                        <div class="modal-body">
                            <div class="presc-inputs">

                                <label for="generic" class="col-form-label">Title</label>
                                <input type="text" id="generic" name="generic" class="form-control form-control-sm" required>


                                <label for="notes" class="col-form-label">Message</label>
                                <textarea type="text" id="notes" name="notes" class="form-control form-control-sm" style="height: 120px; border-color: blueviolet" required></textarea>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary" id="add-btn">Add</button>
                        </div>

                    </form>


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
    </script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.viewbtn').click(function() {

                var userid = $(this).attr('id');

                $.ajax({
                    url: 'viewprescription.php',
                    type: 'post',
                    data: {
                        userid: userid
                    },
                    success: function(result) {
                        $("#presc-body").html(result);
                        $('#viewpresc').modal('show');
                    }
                });
            });
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="viewpresc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Prescription Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="presc-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>
