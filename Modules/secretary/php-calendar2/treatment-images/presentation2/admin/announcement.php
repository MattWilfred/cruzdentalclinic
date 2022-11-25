<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="css/announcement-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/navstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Announcement</title>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src ="script/navscript.js"></script>
 

</head>


<body>

    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <div class="left_area">
          <h3>Cruz Dental <span>Clinic</span></h3>
        </div>
        <i class="fa fa-bars nav_btn"></i>
      </div>

      <div class="mobile_nav_items">
        <a href="index.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
      
      
      
      <div class="menu"> 
         <div class="item">
        <a class="sub-btn"><i class="fa-solid fa-calendar-days"></i>Schedule<i class="fas fa-caret-down drop-down"></i></a>
        <div class="sub-menu">
            <a href="booksched.html"><i class="fas fa-envelope"></i><span>Calendar</span></a>
            <a href="ScheduleList.html"><i class="fas fa-envelope-square"></i><span>Schedule List</span></a>
           
        </div>
      </div>
</div>

<div class="menu"> 
 
  <div class="item">
    
 <a class="sub-btn"><i class="fa-solid fa-user-group"></i>Accounts<i class="fas fa-caret-down drop-down"></i></a>
 <div class="sub-menu">
     <a href="DentistAccount/index.php"><i class="fas fa-envelope"></i><span>Dentist</span></a>
     <a href="PatientAccount/index.php"><i class="fas fa-envelope-square"></i><span>Patients</span></a>
     <a href="AdminAccount/index.php"><i class="fas fa-envelope-square"></i><span>Administrator</span></a>
    
 </div>
</div>
</div>

      <a href="#"><i class="fa-solid fa-money-bill-wave"></i><span>Billing </span></a>
      <a href="announcement.php"><i class="fa-solid fa-bullhorn"></i><span>Announcements</span></a>
     
      <div class="logout">
        <li><a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a></li>
        
    </div>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">

      <header>
        <div class="left_area">
         <img src="logo dental.png" alt="logo"><h3>Cruz Dental <span>Clinic</span></h3>
        </div>
      </header>

     


      <br><br><br><br><br><br>
      <a href="index.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
      <div class="menu"> 
         <div class="item">
        <a class="sub-btn"><i class="fa-solid fa-calendar-days"></i>Schedule<i class="fas fa-caret-down drop-down"></i></a>
        <div class="sub-menu">
            <a href="booksched.html"><i class="fas fa-envelope"></i><span>Calendar</span></a>
            <a href="ScheduleList.html"><i class="fas fa-envelope-square"></i><span>Schedule List</span></a>
           
        </div>
      </div>
</div>

<div class="menu"> 
  <div class="item">
 <a class="sub-btn"><i class="fa-solid fa-user-group"></i>Accounts<i class="fas fa-caret-down drop-down"></i></a>
 <div class="sub-menu">
     <a href="DentistAccount/index.php"><i class="fas fa-envelope"></i><span>Dentist</span></a>
     <a href="PatientAccount/index.php"><i class="fas fa-envelope-square"></i><span>Patients</span></a>
     <a href="AdminAccount/index.php"><i class="fas fa-envelope-square"></i><span>Administrator</span></a>
    
 </div>
</div>
</div>

      <a href="#"><i class="fa-solid fa-money-bill-wave"></i><span>Billing </span></a>
      <a href="announcement.php"><i class="fa-solid fa-bullhorn"></i><span>Announcements</span></a>
     
      <div class="logout">
        <li><a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a></li>
        
    </div>
    </div>
    <!--sidebar end-->

    







 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src ="navscript.js"></script>



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
                            include 'connect.php';

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
                                                <a class='btn btn-primary btn-sm'>View</a>
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
                                <input type="text" placeholder="Enter your name" name="user" class="form-control" style="border-color: blueviolet;" id="title-annc" required>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>



</body>


</html>