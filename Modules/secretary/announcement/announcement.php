<?php 
require 'notification3.php';
include('../../../Database/sessioncheck.php');
include('../../../Database/connect.php');	
?>
<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="announcement-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c262b249a.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="/Modules/admin/assets/css/styles.css">
    <title>Announcement</title>

</head>


<body>

    <!--========== HEADER ==========-->
    <header class="header">
    <div class="header__container">
        <a href="/Modules/secretary/index.php" class="header__logo">Cruz Dental Clinic</a>
        
      
    </div>
</header>

<!--========== NAV ==========-->


<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="#" class="nav__link nav__logo">
           <i class='nav__icon'>
           <img src="/Modules/secretary/assets/img/logo dental.png" alt="" class="header__img">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Modules/secretary/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="/Modules/secretary/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/secretary/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/secretary/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                               
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
                                <a href="/Modules/secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="/Modules/secretary/billing/billing.php" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="/Modules/secretary/announcement/announcement.php" class="nav__link">
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





    <div class="main-cont">

        <div class="annc-header">
            <div class="page-title">
                <h1>Announcements</h1>
            </div>



            <!--add announcement button-->
            <div class="add-annc">

                <i class="fa-solid fa-bullhorn"></i>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                 Add New Announcement
                </button>
                

            </div>

            <!--drop down menu-->

         
        </div>
         


        <div class="annc-cont">
            <div class= "data-container">
                <div class="each-annc">
                            <?php
                            include 'dbcon.php';

                            $query = "SELECT * FROM `announcement`";
                                    $query_run = mysqli_query($connection, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cruzdentalclinic)
                                        {
                                            ?>
                                            <div>
                                            <h3><?php echo $cruzdentalclinic['title'] ?></h3>
                                            <p><?php echo $cruzdentalclinic['date'] ?></p>
                                            <h5><?php echo $cruzdentalclinic['message'] ?></h5>
                                            <h6> By: <?php echo  $cruzdentalclinic['user_'] ?></h6>
                                            <section>
                                                <form action="add-annc.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_account" value="<?=$cruzdentalclinic['annc_id'];?>" 
                                                    class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                            </section>
                                        </div>
                                        <?php
                                        }
                                    }


                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
  

                                ?>
                                
                            
        </div>
    </div>

    

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 600px; height: 600px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="add-annc.php" method="POST">
                    <div class="modal-body">
                    
                        <div class="mb-3">
                                <label for="user-annc" class="col-form-label">Name:</label>
                                <input type="text" readonly name="user" class="form-control" style="border-color: blueviolet;" id="title-annc" value= "<?php echo $_SESSION['username'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="title-annc" class="col-form-label">Title:</label>
                                <input type="text" placeholder="Title" name="title" class="form-control" style="border-color: blueviolet;" id="title-annc" required>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" placeholder="Your message.." name="message" style="height: 200px; border-color: blueviolet;" id="message-text" required></textarea>
                            </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closebtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="savebtn" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>


            </div>
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

        
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--========== MAIN JS ==========-->
    <script src="/Secretary/assets/js/main.js"></script>

</body>


</html>