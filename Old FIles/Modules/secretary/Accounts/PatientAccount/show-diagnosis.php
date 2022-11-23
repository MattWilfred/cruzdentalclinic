<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cruzdentalclinic";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$con){
  die("Connection error!");
}

/**if (isset($_REQUEST['tooth_button'])) {

  switch ($_REQUEST['tooth_button']) {
     case "18":
          displayToothInfo($t, $i);
          break;
     case "17":
           print "You pressed Button 2";
           break;
  }
}**/

function getToothInfo($toothNum, $uid){
  global $con;
  //read rows from the database
  $toothinfo = mysqli_query($con, "SELECT * FROM diagnosis where userid = $uid AND tooth_number = $toothNum ORDER BY date_added desc");
  return $toothinfo;
}

function displayToothInfo($t, $i){

 /**$t = 18;
  $i = 7;**/

  $query = getToothInfo($t, $i);

  while($row = mysqli_fetch_array($query)){

    $new_date_format = (new DateTime($row['date_added']))->format(' M d, Y ');
    echo "<tr>";
        echo "<td> ".$new_date_format. "</td>";
        echo "<td>" .$row['tooth_number']. "</td>";
        echo "<td>" .$row['findings']. "</td>";
        echo "<td>" .$row['description']. "</td>";
    echo "</tr>";
  }
}

function showFullFindings($toothNum){
  if ($toothNum === 'M'){
    echo "Missing";
  }
}
