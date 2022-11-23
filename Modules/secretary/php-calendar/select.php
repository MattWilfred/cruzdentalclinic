<?php
  require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="all.min.css">
		<link rel="stylesheet" href="fontawesome.min.css">
        <link rel="stylesheet" href="../css/navstyle.css">
        <link rel="stylesheet" href="indent.css">
        <link rel="stylesheet" href="selectstyle.css">
     
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 
		
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
              <a href="calen.php"><i class="fas fa-envelope"></i><span>Calendar</span></a>
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
              <a href="php-calendar/index.php"><i class="fas fa-envelope"></i><span>Calendar</span></a>
              <a href="ScheduleList.html"><i class="fas fa-envelope-square"></i><span>Schedule List</span></a>
             
          </div>
        </div>
  </div>
  
  <div class="menu"> 
    <div class="item">
   <a class="sub-btn"><i class="fa-solid fa-user-group"></i>Accounts<i class="fas fa-caret-down drop-down"></i></a>
   <div class="sub-menu">
       <a href="DentistAccount/index.php"><i class="fas fa-envelope"></i><span>Dentist</span></a>
       <a href="PatientAccount/patientlist.php"><i class="fas fa-envelope-square"></i><span>Patients</span></a>
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
  

      <div class="indent">
        
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Dentist Name</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>

        
        <h1>Select A Dentist</h1>
            <?php
                 //read rows from the database
              $sql = "SELECT * FROM users WHERE accrole ='Dentist' ORDER BY lname ASC";
              $result = $connection->query($sql);

        
              if (!$result){
                  die("Invalid query: " . $connection->error);
              }

              if(mysqli_num_rows($result) > 0)
                              {
                                  foreach($result as $users)
                                  {
                                      ?>
                                      <tr>
                                          <td><?= $users['profilepicture'];?></td>
                                          <td><?= $users['fname'] . ' ' .$users['lname'];?></td>
                                          <td><?= $users['phonenumber']; ?></td>
                                          <td>
                                              
                                              <  <a href="selectpatient.php?dentistid=<?= $users['id']; ?>" class="btn btn-info btn-sm">select</a>
                                              </form>
                                          
                                             
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
    
    
          
    </body>
</html>