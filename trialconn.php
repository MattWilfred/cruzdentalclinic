<?php
$servername = "192.168.64.5";
$database = "cruzdentalclinic";
$username = "cruzdentalclinic";
$password = "cruzdentalclinic";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL Using Mysqli Successfully";
  echo "<h2>List Table Content</h2><ol>"; 
  foreach($conn->query("SELECT * FROM users") as $row) {
    echo "<li>" . $row['username'] . "</li>";
  }
  echo "</ol>";
mysqli_close($conn);

?>