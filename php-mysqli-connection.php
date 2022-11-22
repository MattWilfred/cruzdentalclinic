<?php
$servername = "localhost";
$database = "cruzdentalclinic";
$username = "root";
$password = "";
$table = "users";

$conn = mysql_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL Using Mysqli Successfully";
  echo "<h2>List Table Content</h2><ol>"; 
  foreach($conn->query("SELECT * FROM $table") as $row) {
    echo "<li>" . $row['username'] . "</li>";
  }
  echo "</ol>";
mysql_close($conn);

?>