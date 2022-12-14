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
    <title>Announcement</title>

</head>


<body>

    <nav>

        <header>
            <div class="logo"> <img src="logo dental.png" alt="dental logo"></div>
            Cruz Dental Clinic
        </header>


        <ul style="list-style-type: none;">

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
                <a href="billing.html"> <i class="fa-solid fa-money-bill-wave"></i> Billing </a>
            </li>
            <li><a href="annc.html"><i class="fa-solid fa-bullhorn"></i> Announcements </a></li>
        </ul>


        <div class="logout">
            <li>
                <a href="#logout"> <i class="fa-solid fa-right-from-bracket"></i> Logout </a>
            </li>

        </div>



    </nav>




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

            <!--drop down menu
            
            <div class="select-menu">

                <form action="" method="GET">
                    <select class="form-select" name="sort">
                        <option value="" disabled="" selected>Sort</option>
                        <option value="By Title">By Title</option>
                        <option value="By User">By User </option>
                        <option value="By Date">By Date </option>
                    </select>
                    <button type="submit" class="input-group-text btn btn-primary">Sort</button>
                </form>
                
            </div>
            -->

        </div>


        <div class="annc-cont">
            <div class= "data-container">
                <div class="each-annc">
                            <?php
                            require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

                            /*
                             if (isset($_GET['sort'])){
                                 //SORT ROWS ACC TO TITLE
                                if ($_GET['sort'] == "By Title"){
                                    $sort_bytitle = "SELECT * from announcement ORDER by title ASC";
                                    $bytitleres = mysqli_query($connection,$sort_bytitle);
                
                                    if(mysqli_num_rows($bytitleres)>0){
                                        while($row = $bytitleres->fetch_assoc()){
                                    ?>
                                            <div>
                                            <h3><?php echo $row['title'] ?></h3>
                                            <p><?php echo $row['date'] ?></p>
                                            <h5><?php echo $row['message'] ?></h5>
                                            <h6> By: <?php echo  $row['user_'] ?></h6>
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
                
                                }
                                //SORT ROWS ACC TO USER
                                elseif ($_GET['sort'] == "By User"){
                                    $sort_byuser = "SELECT * from announcement ORDER by user_ ASC";
                                    $byuserres = mysqli_query($connection,$sort_byuser);
                
                                    if(mysqli_num_rows($byuserres)>0){
                                        while($row = $byuserres->fetch_assoc()){
                                    ?>
                                            <div>
                                            <h3><?php echo $row['title'] ?></h3>
                                            <p><?php echo $row['date'] ?></p>
                                            <h5><?php echo $row['message'] ?></h5>
                                            <h6> By: <?php echo  $row['user_'] ?></h6>
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
                
                                }
                                //SORT ROWS ACC TO DATE
                                else {
                                    $sort_bydate= "SELECT * from announcement ORDER by date DESC";
                                    $bydateres = mysqli_query($connection,$sort_bydate);
                    
                                    if(mysqli_num_rows($bydateres)>0){
                                        while($row = $bydateres->fetch_assoc()){
                                    ?>
                                            <div>
                                            <h3><?php echo $row['title'] ?></h3>
                                            <p><?php echo $row['date'] ?></p>
                                            <h5><?php echo $row['message'] ?></h5>
                                            <h6> By: <?php echo  $row['user_'] ?></h6>
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
                    
                                }
                                
                            }
                            */
                            //SORT ROWS ACCORDING TO DATE DEFAULT
                           
                                $sort_bydate= "SELECT * from announcement ORDER by date DESC";
                                $bydateres = mysqli_query($connection,$sort_bydate);

                                if(mysqli_num_rows($bydateres)>0){
                                
                                    while($row = $bydateres->fetch_assoc()){
                                ?>
                                        <div>
                                        <h3><?php echo $row['title'] ?></h3>
                                        <p><?php echo $row['date'] ?></p>
                                        <h5><?php echo $row['message'] ?></h5>
                                        <h6> By: <?php echo  $row['user_'] ?></h6>
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
                                }else {
                                    echo "No record found";
                                }
                    
                                
                
                            
                              
                    
                
                            
                
                
                            ?>

                        
                            
                </div>

            </div>
           




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
                                <input type="text" placeholder="Enter your name" name="user" class="form-control" style="border-color: blueviolet;" id="user-annc" required>
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