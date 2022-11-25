

<!DOCTYPE html>
<html lang=e n dir="ltr">

<head>
    <link rel="stylesheet" href="createaccount-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dental Clinic Web Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Create Account</title>

</head>






<body>



    <div class="main-header">

        <div class="header">
            <a type="button" href="patientlist.php">
                <i class="fa-solid fa-circle-arrow-left"></i>
            </a>
            <div class="ok">
                <h2>Cruz Dental Clinic</h2>
                <img src="logo dental.png" alt="dental logo">
            </div>



        </div>
    </div>




    <div class="main-cont">
        <div class="page-title">
            <h1>CREATE USER ACCOUNT</h1>
        </div>

        <div class="reg-form">
            <div class="container">
                <div class="content">
                    <form action="" method="POST">
                        <div class="role-cont">
                            <div class="role-details">
                                <span class="role-title">Select Role:</span>
                                <input type="radio" name="role" id="rdot-1" value="Administrator" required>Administrator
                                <input type="radio" name="role" id="rdot-2" value="Dentist" required>Dentist
                                <input type="radio" name="role" id="rdot-3" value="Patient" required>Patient
                                
                            </div>
                        </div>


                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">First Name</span>
                                <input type="text" name="fname" placeholder="Enter your first name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Last Name</span>
                                <input type="text" name="lname" placeholder="Enter your last name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Address</span>
                                <input type="text" name="address" placeholder="Enter your address" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Birthdate</span>
                                <input type="date" name="bdate" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Username</span>
                                <input type="text" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Phone Number</span>
                                <input type="text" name="phone" id="number" value="" placeholder="Enter your number" maxlength="11" required>
                                <span id="pnumber-error"> </span>
                             </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="text" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="password" class="pword" name="pw" placeholder="Enter your password" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Confirm Password</span>
                                <input type="password" class="cpword" name="cpw" placeholder="Confirm your password" required>
                            </div>
                            <div class="gender-cont">
                                <div class="gender-details">
                                    <span class="gender-title">Gender:</span>
                                    <div>
                                        <input type="radio" name="gender" id="dot-1" value="Male" required>Male
                                        <input type="radio" name="gender" id="dot-2" value="Female" required>Female

                                    </div>
                                    
                                    
                                </div>

                            </div>
                        </div>




                        <div class="button">
                            <button type="submit" id="addpbtn" name="submit">Add Account</button>
                        </div>


                        <!--check if email entered already exists -->
                        <div class="validation" style="text-align:center; color: red; ">
                            <?php
                                

                                $servername = "localhost";
                                $username = "root";
                                $password = "root";
                                $database = "users";

                                                    
                                //create connection
                                $connection = new mysqli($servername,$username,$password,$database);


                                if (isset($_POST['submit']))
                                {

                                    $role = $_POST['role'];
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $address = $_POST['address'];
                                    $bdate = $_POST['bdate'];
                                    $username = $_POST['username'];
                                    $phone = $_POST['phone'];
                                    $email = $_POST['email'];
                                    $pw = $_POST['pw'];
                                    $cpw = $_POST['cpw'];
                                    $gender = $_POST['gender'];

                                    //read email column
                                    $sql_email = mysqli_query($connection, "SELECT * from Persons where email = '$email'");
                                    $sql_username = mysqli_query($connection, "SELECT * from Persons where username = '$username'");
                                    


                                    //if statement to check if email entered already exists
                                    if(mysqli_num_rows($sql_email)>0) {
                                    
                                
                                        echo "
                                        <div class='error-mess'>
                                                <p>Email already in use.</p>
                                        </div>
                                        ";
                                     
                                    }
                                    if(mysqli_num_rows($sql_username)>0){
                                        echo "
                                        <div class='error-mess'>
                                                <p>Username already in use.</p>
                                        </div>
                                        ";

                                    }
                                    if($pw != $cpw){
                                        echo "
                                        <div class='error-mess'>
                                                <p>Passwords do not match.</p>
                                        </div>
                                        ";
                                    }
                                   


                                    else {
                                        $query = "INSERT INTO Persons(accrole,fname,lname,paddress,birthdate,username,phonenumber,gender,email,userpassword) 
                                        VALUES ('$role','$fname','$lname','$address','$bdate','$username','$phone','$gender','$email','$pw')";

                                        $query_run = mysqli_query($connection, $query);

                                        if ($query_run){

                                            

                                            echo "<script>window.location.href='patientlist.php' </script>";

                                            

                                        }
                                        else {
                                            die("Invalid query: " . $connection->error);
                                        }
                                    }

                                    
                                    

                                    
                                }

                            ?>

                        </div>
                    </form>
                </div>


            </div>



        </div>







    </div>













    <script>
        function phonevalidate() {
            var a = document.getElementById("number").value;

            if(isNaN(a)){
                document.getElementById("pnumber-error").innerHTML="Numbers only";
                return false;
            }

            if(a.length<10){
                document.getElementById("pnumber-error").innerHTML="Number must be 11 digits";
                return false;
            }

            if( (a.charAt(0)!=0) && (a.charAt(0)!=9) ){
                document.getElementById("pnumber-error").innerHTML="Number must start with 09";
                return false;
            }

             








        }
        

        //for password validation
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>



</body>


</html>