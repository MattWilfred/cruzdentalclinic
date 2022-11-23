<?php


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cruzdentalclinic";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$con){
  die("Connection error!");
}

function getToothArray($uid){
    global $con;
    //read rows from the database
    $fetchteeth = mysqli_query($con, "SELECT tooth_number FROM diagnosis where userid = $uid");

    $tootharray = array();

    while($row = mysqli_fetch_assoc($fetchteeth)){
        $tootharray[] = $row;
    }

    return $tootharray;
}

function colorTooth($toothNum, $uid){

  global $con;
    //read rows from the database
  $fetchteeth = mysqli_query($con, "SELECT tooth_number, findings FROM diagnosis where userid = $uid AND tooth_number = $toothNum");

  //$teethquery = mysqli_fetch_assoc($fetchteeth);

  while($row = mysqli_fetch_array($fetchteeth)){


    if ($row['findings'] == "Missing"){
        echo "style= 'filter: grayscale(1000%)'";

    } else if ($row['findings'] == "Carries" || $row['findings'] == "Abrasion" || $row['findings'] == "Fracture" ||
    $row['findings'] == "Indicated for Extraction" || $row['findings'] == "Root Fragment"){
        echo "style='filter: hue-rotate(270deg)'"; //pink color
    }else if ($row['findings'] == "Tooth Present Without Carries" || $row['findings'] == "Composite" || $row['findings'] == "Fixed Partial Denture" || $row['findings'] == "Glass Ionomer" ||
    $row['findings'] == "INI24" || $row['findings'] == "21" || $row['findings'] == "Temporary Filling" || $row['findings'] == "Unfrupied" || $row['findings'] == "Jacket"){
    //echo "style='background-color:black'";
    //echo "style= 'filter: opacity(0.4)'";
    //echo "style= 'filter: sepia(0.5)'";
    //echo "style = 'filter: grayscale saturate(0%) brightness(30%) contrast(1000%)'";
    //echo "style= 'filter: grayscale(1000%)'";
    //echo "style= 'filter: invert(75%);'";
    //echo "style='filter: hue-rotate(50deg)'"; //green color
    echo "style='filter: hue-rotate(180deg)'"; //blue color
    //echo "style='filter: hue-rotate(270deg)'"; //pink color
    //echo "style='filter: hue-rotate(290deg)'"; //blue color
    //echo "style= 'filter: contrast(100%)'";
  //} if (mb_strpos($pattern, $str) !==false){
    //echo "style= 'filter: opacity(0.5)'";
  } else {
    echo "style='filter: hue-rotate(50deg)'"; //green color
  }
}
  //$teethArray = getToothArray($uid);

  //if (in_array($toothNum, $teethArray)){
    //echo "style=filter: opacity(0.5)";
  //}
}

function fetchFinding($toothNum){
    global $con;

    $findtoothquery = mysqli_query($con, "SELECT findings FROM diagnosis WHERE tooth_number = $toothNum");

    $toothFinding= mysqli_fetch_assoc($findtoothquery);

    return $toothFinding;
}

?>