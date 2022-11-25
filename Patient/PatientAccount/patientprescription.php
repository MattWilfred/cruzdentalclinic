<?php
    require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

    session_start();
    include('/Database/sessioncheck.php');
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="patientprescription-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Patient Profile</title>


</head>

<body>
<header class="header">
        <div class="header__container">

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
                    <i class='bx bxs-disc nav__icon'></i>
                    <span class="nav__logo-name">Cruz Dental Clinic</span>
                </a>

                <div class="nav__list">

                    <div class="nav__items">
                        <a href="/Secretary/index.php" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bxs-calendar nav__icon'></i>

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
                                    <i class='bx bx-user nav__icon'></i>
                                    <span class="nav__name">Accounts</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="/Patient/PatientAccount/appthistory.php?id=<?php echo $id;?>" class="nav__dropdown-item">Profile</a>

                                </div>
                            </div>
                        </div>

                        <a href="#" class="nav__link">
                            <i class='bx bx-money nav__icon'></i>
                            <span class="nav__name">Billing</span>
                        </a>
                    </div>

                    <a href="#" class="nav__link">
                        <i class='bx bxs-megaphone nav__icon'></i>
                        <span class="nav__name">Announcement</span>
                    </a>
                </div>

                <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon'></i>
                    <span class="nav__name">Log Out</span>
                </a>
        </nav>
        </div>


    <div class="body_content">
        <h1>Patient Profile</h1>
    </div>



    <div class="container">
    <?php
            $currentid = $_SESSION['id'];

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
                <a class="active">E-Prescription</a>
                <a href="patientreferral.php? id=<?= $currentid; ?>">Referral</a>
            </div>
                                            
        

            <div class="prescription">
                <div class="presc-header">
                    <h2>E-Prescriptions </h2>
                </div>

                <div class="presc-cont">
                    <div class="data-containter">
                        <div class="each-presc">
                            <?php

                                $query_presc = "SELECT * from prescription WHERE user_id=$currentid ORDER by date_added DESC";
                                $res = mysqli_query($connection,$query_presc);

                                if(mysqli_num_rows($res)>0){

                                    while($row = mysqli_fetch_array($res)){
                                        $new_date_format = (new DateTime($row['date_added']))->format(' M d, Y  l');
                            ?>
                                <!--for list view of prescriptions-->
                                <div class="presc-body">
                                  
                                    <div class="col1">
                                       
                                            <h5> Prescription Date: <?php echo $new_date_format ?>
                                            </h5>
        
                                    </div>
                                    

                                    <div class="actions">
                                        <button type="button" id="<?php echo $row['prescription_id'] ?>" class="viewbtn btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>





                                <?php
                                    }

                                }else {
                                  
                                    ?>
                                        <div class="no-presc">
                                            <h5>No prescriptions</h5>
                                        
                                        </div>
                                    <?php
                                }
                                ?>
                            

                        </div>
                    </div>


                </div>





            </div>



        </div>

        <!-- Modal for adding digital prescription -->
        <div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" id="add-img">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Prescription</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Form -->
                    <form action="addprescription.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $currentid?>">
                        <input type="hidden" name="url" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                        <div class="modal-body">
                            <label>Select Image File:</label>
                            <input type="file" name="image" class="form-control" required>
                         

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" name="submit" class="uploadbtn btn btn-primary" value="Upload">
                        </div>
                    </form>

                </div>
            </div>
        </div>

            <!-- Modal for viewing prescription image -->
        <div class="modal fade" id="viewpresc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" id="viewpresc-img">
                    <div class="modal-header">
                        <h5>Prescription Details</h5>
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


    </div>













    <!--script for nav menu-->
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

    <!--script for viewing prescription-->
    <script type='text/javascript'>
         $(document).ready(function(){
            $('.viewbtn').click(function(){

                var prescid = $(this).attr('id');
                
                $.ajax({
                    url: 'viewprescription.php',
                    type: 'post',
                    data: {prescid: prescid},
                     success: function(result){
                        $("#presc-body").html(result);
                        $('#viewpresc').modal('show'); 
                    }
                });
            });
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


</body>

</html>