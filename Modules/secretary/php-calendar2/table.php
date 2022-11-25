<?php  
 require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
 $query = "SELECT * FROM bookings  ORDER BY sched_id AND timeslot asc";  
 $result = mysqli_query($connection, $query);  

 if(isset($_POST['ongoing'])){

 }


 //Get Update id and status  
 if (isset($_GET['sched_id']) && isset($_GET['status'])) {  
    $id=$_GET['sched_id'];  
    $status=$_GET['status'];  
    mysqli_query($connect,"update bookings set status='$status' where sched_id='$id'");  
    header("location: table.php");  
    die();  
}  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Date Range Search in Datatables using PHP Ajax | Date Range Search PHP | Datepicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
           <link rel="stylesheet" href="/Secretary/assets/css/styles.css">
        
           
        



      </head>  
      <body>  
             <!--========== HEADER ==========-->
             <header class="header">
            <div class="header__container">
                <img src="assets/img/logo dental.png" alt="" class="header__img">
                <a href="#" class="header__logo">Cruz Dental Clinic</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
    
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
           <img class="header__img" src="assets/img/logo dental.png" alt="">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Secretary/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="#" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="php-calendar/select.html" class="nav__dropdown-item">Calendar</a>
                                <a href="php-calendar/select.html" class="nav__dropdown-item">Schedule List</a>
                               
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
                                <a href="../Secretary/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Secretary</a>
                                <a href="../Secretary/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>
                                <a href="../Secretary/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="#" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="announcement/announcement.php" class="nav__link">
                    <i class='bx bxs-megaphone nav__icon'></i>
                    <span class="nav__name">Announcement</span>
                </a>
            </div>

        <a href="#" class="nav__link nav__logout">
            <i class='bx bx-log-out nav__icon' ></i>
            <span class="nav__name">Log Out</span>
        </a>
    </nav>
</div>

<!--========== CONTENTS ==========-->





           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Cruz Dental Clinic | Patient Appoinment List</h2>  
                <!-- <h3 align="center">Order Data</h3><br />   -->
                <div class="col-md-4">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
               </div>  
                <div class="col-md-4">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>
                
                
                <br />  
                <div id="order_table">  
                     <table id="sample_data" class="table table-bordered">  
                          <tr>      
                                <th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Treatment</th>
                                <th style="text-align:center;">Date</th>
                                <th style="text-align:center;">Time Slot</th>
                                <th style="text-align:center;">Doctor</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Action</th>
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["name"]; ?></td>  
                               <td><?php echo $row["treatment"]; ?></td>  
                               <td><?php echo $row["date"]; ?></td>  
                               <td><?php echo $row["timeslot"]; ?></td>  
                               <td><?php echo $row["doctor"]; ?></td>  
                               <td>  
                                    <?php  
                                    if ($row['status']==1) {  
                                        echo "Upcoming";  
                                    }if ($row['status']==2) {  
                                        echo "Ongoing";  
                                    }if ($row['status']==3) {  
                                        echo "Done";  
                                    }  
                                    ?>  
                                </td>
                                <td>  
                                <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['sched_id'] ?>')">  
                                <option value="">Update Status</option>  
                                <option value="1">Upcoming</option>  
                                <option value="2">Ongoing</option>  
                                <option value="3">Done</option>  
                                </select>  
                                </td>  
                          </tr>  
                     <?php  
                    }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'  
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
          $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"fetch.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  

                        {  
                               $('#order_table').html(data);  
                          }  
                     });  

              }  

               else  
                {  
                     alert("Please Select Date");  
                }  
          });  
      });  
 </script>

<script type="text/javascript">  
      function status_update(value,id){  
           //alert(id);  
           let url = "table.php";  
           window.location.href= url+"?sched_id="+id+"&status="+value;  
      }  
 </script>  
 
