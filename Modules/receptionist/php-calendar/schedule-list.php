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
    mysqli_query($connection,"update bookings set status='$status' where sched_id='$id'");  
    header("location: schedule-list.php");  
    die();  
}  
 ?>  

<html>
	<head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/Modules/admin/assets/css/styles.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	</head>
	<body>
      <!--========== HEADER ==========-->
      <header class="header">
    <div class="header__container">
        <a href="/Modules/receptionist/index.php" class="header__logo">Cruz Dental Clinic</a>
        
      
    </div>
</header>

<!--========== NAV ==========-->


<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="#" class="nav__link nav__logo">
           <i class='nav__icon'>
           <img src="/Modules/receptionist/assets/img/logo dental.png" alt="" class="header__img">
           </i>
                <span class="nav__logo-name">Cruz Dental Clinic</span>
            </a>

            <div class="nav__list">
                <div class="nav__items">

                    <a href="/Modules/receptionist/index.php" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <div class="nav__dropdown">
                        <a href="/Modules/receptionist/index.php" class="nav__link">
                            <i class='bx bxs-calendar nav__icon' ></i>
                            
                            <span class="nav__name">Schedule</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </a>

                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <a href="/Modules/receptionist/php-calendar/selectdentist.php" class="nav__dropdown-item">Calendar</a>
                                <a href="/Modules/receptionist/php-calendar/schedule-list.php" class="nav__dropdown-item">Schedule List</a>
                                <a href="/Modules/receptionist/blockdate.php" class="nav__dropdown-item">Block Date</a>
                                
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
                            <a href="/Modules/receptionist/Accounts/SecretaryAccount/index.php" class="nav__dropdown-item">Employees</a>
                                    <a href="/Modules/receptionist/Accounts/DentistAccount/index.php" class="nav__dropdown-item">Dentist</a>    
                                    <a href="/Modules/receptionist/Accounts/PatientAccount/index.php" class="nav__dropdown-item">Patients</a>
                               
                            </div>
                        </div>
                    </div>


                    <a href="/Modules/receptionist/billing/billing.php" class="nav__link">
                        <i class='bx bx-money nav__icon' ></i>
                        <span class="nav__name">Billing</span>
                    </a>
                </div>

                <a href="/Modules/receptionist/announcement/announcement.php" class="nav__link">
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

        <br><br><br>
		<div class="container">
			<div class="content">
				<div class="row">
					
					<div class="col-4">
						<div class="btn-group submitter-group float-right">
							<div class="input-group-prepend">
								<div class="input-group-text">Status</div>
							</div>
							<select class="form-control status-dropdown">
							<option value="">All</option>
								<option value="1">Upcoming</option>
								<option value="2">Ongoing</option>
								<option value="3">Done</option>
								<option value="4">Cancelled</option>
								
							</select>
						</div>
					</div>
				</div>
			</div>
            <br><br>    
			<table id="example" class="table">
				<thead>
					<tr>
	  <th class="th-sm">Name
      </th>
      <th class="th-sm">Treatment
      </th>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Time
      </th>
      <th class="th-sm">Doctor
      </th>
      <th class="th-sm">Status
      </th>
      <th class="th-sm">Action
      </th>
	  
            <th>Hidden</th>
					</tr>
				</thead>
			
				<tbody>
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
                                <option value="2">Ongoing</option>  
                                <option value="3">Done</option>
                                </select>
                                
                                <a href="cancelappointment.php?id=<?php echo $row['sched_id']?>"><button>Cancel</button></a>
                                </td> 
                                
          <td><?php echo $row['status']?></td>
                          </tr>  
                     <?php  
                    }  
                     ?>  
				</tbody>
			</table>
		</div>
		
	</body>
</html>`




<script>
	$(document).ready(function() {
    dataTable = $("#example").DataTable({
      "columnDefs": [
            {
                "targets": [7],
                "visible": false
            }
        ]
      
    });
  
  
  
  /*dataTable.columns().every( function () {
        var that = this;
 
        $('input', this.footer()).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that.search(this.value).draw();
            }
        });
      });*/
  
  
    $('.filter-checkbox').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      dataTable.column(1).search(searchTerms.join('|'), true, false, true).draw();
    });
  
    $('.status-dropdown').on('change', function(e){
      var status = $(this).val();
      $('.status-dropdown').val(status)
      console.log(status)
      //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
      dataTable.column(7).search(status).draw();
    })
});
</script>

<script type="text/javascript">  
      function status_update(value,id){  
           //alert(id);  
           let url = "schedule-list.php";  
           window.location.href= url+"?sched_id="+id+"&status="+value;  
      }  
 </script>  