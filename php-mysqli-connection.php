<?php
$servername = "localhost";
$database = "cruzdentalclinic";
$username = "root";
$password = "";
$table = "users";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL Using Mysqli Successfully";
  echo "<h2>List Table Content</h2><ol>"; 
  foreach($conn->query("SELECT username FROM $table") as $row) {
    echo "<li>" . $row['content'] . "</li>";
  }
  echo "</ol>";
mysqli_close($conn);

?>