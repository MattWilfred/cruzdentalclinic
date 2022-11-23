<?php
  //include_once 'userlogs.php';

require ("$_SERVER[DOCUMENT_ROOT]/Database/connect.php");

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

  $un_sql = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
  $em_sql = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
  $pw_sql = mysqli_query($connection, "SELECT * FROM users WHERE userpassword='$userpassword'");

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
        

    $query = "INSERT INTO users
    VALUES (DEFAULT,'$fname','$lname','$paddress','$birthdate','$username','$phonenumber','$gender','$email','$userpassword','$accrole',NULL)";
    $query_run = mysqli_query($connection, $query);



    //pour le medical background
    $querymbg = "SELECT * from users ORDER by date DESC LIMIT 1";
    $mbgres = mysqli_query($connection,$querymbg);

    if ($mbgres){
      if(mysqli_num_rows($mbgres)>0){
                                
        while($row = $mbgres->fetch_assoc()){
    
          $newuid = $row['id'];
      
          $addmbg = "INSERT INTO medicalbackground VALUES 
          (DEFAULT, $newuid,
          '0','0','0','0','0','0','0','0','0','',
          '0','0','0','0','0','0','0','0','0','0',
          '0','0','0','','0','0','0','0','0','0',
          '0','0','0','0','0','0','0','0','0','0',
          '0','0','0','0','0','0','0','0','0','0',
          '0','0','0','')";
                            
          $addmbgres = mysqli_query($connection,$addmbg);
    
        }
    
      }

    }



  if ($query_run){



     // $newsoa = "INSERT INTO statement_of_account VALUES (DEFAULT, \)"
  //echo '<script> alert('$row['id']'); </script>';

  //echo '<script language="javascript">window.location = "reg-page.php";</script>';  
  echo '<script> alert("Inserted Successfully"); </script>';
  echo "<script>window.location='reg-page.php'</script>";
  //header("Location: index.php");
        //header("Location: {$_REQUEST["url"]}");
  } else {
    echo '<script> alert("error"); </script>';
  }
}
}


?>