<?php  
 $connect = mysqli_connect("localhost", "root", "", "cruzdentalclinic");  
 $query = "SELECT * FROM bookings ORDER BY sched_id AND timeslot asc";  
 $result = mysqli_query($connect, $query);  

 if(isset($_POST['ongoing'])){

 }


 //Get Update id and status  
 if (isset($_GET['sched_id']) && isset($_GET['status'])) {  
    $id=$_GET['sched_id'];  
    $status=$_GET['status'];  
    mysqli_query($connect,"update bookings set status='$status' where sched_id='$id'");  
    header("location: get.php");  
    die();  
}  
 ?>  
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	</head>
	<body>
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

                               <div class="badge status-badge badge-info">
						
                                    <?php  
                                    if ($row['status']==1) {  
                                        echo "Upcoming";  
                                    }if ($row['status']==2) {  
                                        echo "Ongoing";  
                                    }if ($row['status']==3) {  
                                        echo "Done";  
                                    }if ($row['status']==4) {  
                                      echo "Cancelled";
                                    }  
                                    ?>  
                              </div>
                                </td>
                              
                                <td>  
                                <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['sched_id'] ?>')">  
                                <option value="">Update Status</option>  
                                <option value="1">Upcoming</option>  
                                <option value="2">Ongoing</option>  
                                <option value="3">Done</option>
                                <option value="4">Cancel</option>    
                                </select> 
                                </td> 
                                
          <td><?php echo $row['status']?></td>
                          </tr>  
                     <?php  
                    }  
                     ?>  
				</tbody>
			</table>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
           let url = "get.php";  
           window.location.href= url+"?sched_id="+id+"&status="+value;  
      }  
 </script>  