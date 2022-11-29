<?php
    session_start();
    require 'dbcon.php';
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 03;
    $start_from = ($page-1)*03;
    
    $query = "select * from persons limit $start_from,$num_per_page";
    $result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang=e n dir="ltr">
<head>
    <link rel="stylesheet" href="DentistAccount-Style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/navstyle.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">  
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/b0931e4ab7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src ="script/navscript.js"></script>
 
    <title>Doctor Accounts</title>
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



<div class="main-cont">
 
<div class="page-title">
<br>
            <h1>Dentist Account List</h1>
        </div>

        <div class="subh">
            <!--search bar-->
            <div class="box-cont">
                <table class="elem-cont">
                    <tr>
                     <td>
                                <form action="" method="GET">
                                    <div>
                                        <input class="search" type="text" name="search" required value="<?php if(isset($_GET['search']))
                                        {echo $_GET['search']; } ?>" 
                                        class="form-control" placeholder="Search" >
                                        <button type="submit" class="fa fa-search" ></button>
                                    </div>
                                </form>
                                
                        </td>
                    </tr>
                </table>
            </div>

       
            
            <!--add admin button-->
            <div class="add">
                <div>
                <a class="fa-solid fa-user-plus fa-s" href="createaccount.php"></a>
            </div>

            <div class = "addb">
                <p>Add User</p>
            </div>
                
            </div>

        </div>


        <div class="doctor-content">
            <table class="table">
                <thead>
                <td> User ID </td>
                <td> First Name </td>
                <td> Last Name </td>
              
                </thead>
                <tbody>
                    
                    <?php 
                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
                    <td> <?php echo $row['id'] ?> </td>
                    <td> <?php echo $row['fname'] ?> </td>
                    <td> <?php echo $row['lname'] ?> </td>
                    <td>
                        <a href="view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                   
                        </td>
                   
            </tr>
         <?php 
                }
                ?>
        </table>

        <?php 
        
                $pr_query = "select * from persons ";
                $pr_result = mysqli_query($con,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);

                if($page>1)
                {
                    echo "<a href='index.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='index.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script>
        $(document).ready(function () {

            $('.btn-sm').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


</body>
</html>
