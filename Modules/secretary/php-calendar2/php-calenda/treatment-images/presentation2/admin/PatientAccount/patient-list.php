<?php
    session_start();
    require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang=e n dir="ltr">
<head>
    <link rel="stylesheet" href="../css/patient-style.css?v=<?php echo time(); ?>">
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
    <title>Patient Accounts</title>

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
    <li><a href=""> <i class="fa-solid fa-right-from-bracket"></i> Logout </a></li>
    
</div>
</nav>

<div class="main-cont">
 
<div class="page-title">
<br>
            <h1>Patient List</h1>
        </div>

        <div class="subh">
            <!--search bar-->
            <div class="box-cont">
                <table class="elem-cont">
                    <tr>
                     <td>
                            <div>
                                <input type="text" placeholder="Search" class="search">
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            
            <!--add transaction button-->
            <div class="transaction">
                <div>
                <i class="fa-solid fa-user-plus fa-s"></i>
                    <a class="btn btn-primary" href="admin-create.php " data-bs-toggle="modal" data-bs-target="#staticBackdrop"></a>
                </div>
            </div>
        </div>


        
           
          
            <div class="doctor-content">
            <table class="table">
                <thead>
                <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>Mobile No.</th>
                                    <th>Birthdate</th>
                                    <th>Action</th>
                </thead>
                <tbody>
                                <?php 
                                    $query = "SELECT * FROM `persons`";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $users)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $users['id']; ?></td>
                                                <td><?= $users['fname']; ?></td>
                                                <td><?= $users['lname']; ?></td>
                                                <td><?= $users['username']; ?></td>
                                                <td><?= $users['gender']; ?></td>
                                                <td><?= $users['phonenumber']; ?></td>
                                                <td><?= $users['birthdate']; ?></td>
                                                <td>
                                                    <a href="referral/patient.php?id=<?= $users['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="editpatientprofile.php?id=<?= $users['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                   
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                            </table>
    </div>
    </div>

   
    <script>
        //for the sidebar menu
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

        //for dropdown menu
        const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelectorAll(".option"),
            sBtn_text = optionMenu.querySelector(".sBtn-text");

        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;

                optionMenu.classList.remove("active");
            });
        });

        //
    </script>
    <script>
        $(".searchddl").chosen();
    </script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>
</html>
