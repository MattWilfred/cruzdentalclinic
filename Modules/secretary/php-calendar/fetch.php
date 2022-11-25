<?php

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      global $connection;
      $output = '';  
      $query = "  
           SELECT * FROM bookings  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connection, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Name</th>  
                     <th width="30%">treatment</th>  
                     <th width="43%">Date</th>
                     <th width="43%">time</th>  
                     <th width="43%">Doctor</th>
                     <th width="43%">Status</th>  
                     
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["name"] .'</td>  
                          <td>'. $row["treatment"] .'</td>  
                          <td>'. $row["date"] .'</td>  
                          <td> '. $row["timeslot"] .'</td>  
                          <td>'. $row["doctor"] .'</td>
                          <td>'. ($row["status"] == '1' ? 'Upcoming' : 'Ongoing').'</td>
                          
                     </tr>
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 } 
 
 


 ?>