<?php
  //include_once 'userlogs.php';

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

function fetchUserID($username){
  global $connection;
  //$defaultData = mysqli_query($conn, "SELECT * FROM logs ORDER BY logs_id DESC");
  $un = mysqli_query($connection, "SELECT id FROM users WHERE username = $username");
  return $un;
}

if (isset($_POST['create'])){
       
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $paddress = $_POST['address'];
  $birthdate = $_POST['bdate'];
  $username = $_POST['username'];
  $phonenumber = $_POST['phone'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $userpassword = $_POST['password'];
  $cuserpassword = $_POST['cpassword'];
  $accrole = $_POST['role'];

  $un_sql = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
  $em_sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $pw_sql = mysqli_query($conn, "SELECT * FROM users WHERE userpassword='$userpassword'");

  if (mysqli_num_rows($un_sql) > 0) {
    echo '<script> alert("Sorry... Username already taken"); </script>';
    echo "<script>window.location='reg-page.php'</script>";

  } else if(mysqli_num_rows($em_sql) > 0){
    echo '<script> alert("Sorry... Email already taken"); </script>';
    echo "<script>window.location='reg-page.php'</script>";

  } else if(mysqli_num_rows($pw_sql) > 0){
    echo '<script> alert("Sorry... Password already taken"); </script>';
    echo "<script>window.location='reg-page.php'</script>";

  } else if ($userpassword != $cuserpassword){
    echo '<script> alert("Passwords do not match"); </script>';
    echo "<script>window.location='reg-page.php'</script>";

  } else {
        
    $query = "INSERT INTO users (fname, lname, paddress, birthdate, username, phonenumber, gender, email, userpassword, accrole, profilepicture, status)
    VALUES ('$fname','$lname','$paddress','$birthdate','$username',$phonenumber,'$gender','$email','$userpassword','$accrole',NULL, 0)";
    $query_run = mysqli_query($connection, $query);

    if ($query_run){

      $user_id = fetchUserID($username);

      if ($accrole == 'Administrator'){
        $adq = "INSERT INTO `admins` (`user_id`, `admin_first_name`, `admin_surname`, `admin_email_address`, `admin_contact_number`, `admin_birthdate`) 
        VALUES ($user_id, '$fname', '$lname', '$email', $phonenumber, '$birthdate')";

        $adq_run = mysqli_query($connection, $adq);
      } else if ($accrole == 'Secretary'){
        $req = "INSERT INTO `secretary` (`user_id`, `secretary_first_name`, `secretary_surname`, `secretary_email_address`, `secretary_contact_number`,`secretary_gender`, `secretary_birthdate`) 
        VALUES ($user_id, '$fname', '$lname', '$email', $phonenumber,'$gender', '$birthdate')";

        $req_run = mysqli_query($connection, $req);
      }

    echo '<script> alert("Inserted Successfully"); </script>';
    echo "<script>window.location='/Modules/admin/index.php'</script>";
    
    } else {
      echo '<script> alert("error"); </script>';
      echo $query . "<br>" . mysqli_error($connection);
    }
  }

}




?>