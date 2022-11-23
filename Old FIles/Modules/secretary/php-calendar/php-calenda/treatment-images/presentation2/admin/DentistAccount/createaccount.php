

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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/44763be3ea.js" crossorigin="anonymous"></script>
    <title>Create Account</title>

</head>



<body>

<div class="topnav" id="myTopnav">
            <a href="index.php">
            <button style='font-size:40px;color:white;background: #A14FD3;border: none;'>
            <i class="fa-solid fa-circle-arrow-left"></i></button>
</a>


</div>
            
                
         
          

<div class="container">
        <header>Create Account</header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
<br><br><br><br><br>

<div class="profile-pic-div">
                <img src="image.jpg" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
             
            </div>
                
            </div>
                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your First Name" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter tyour Last Name" required>
                        </div>

                       
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" required>
                        </div>

                        
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Address</label>
                            <input type="tecy" placeholder="Enter your Address" required>
                        </div>

                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" placeholder="Enter your Username" required>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="text" placeholder="Enter your Password" required>
                        </div>
                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="text" placeholder="Confirm your Password" required>
                        </div>
                    </div>
                    <button class="sumbit">
                            <span class="btnText">Add Account</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    
                </div>
<br>


                        <!--check if email entered already exists -->
                        <div class="validation" style="text-align:center; color: red; ">
                            <?php
                                

                               require 'dbcon.php';


                                if (isset($_POST['submit']))
                                {

                                    
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
                                    $sql_email = mysqli_query($con, "SELECT * from users where email = '$email'");
                                    $sql_username = mysqli_query($con, "SELECT * from users where username = '$username'");
                                    


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
                                    if(strlen($pw) < 8){
                                        echo "
                                        <div class='error-mess'>
                                                <p>Password should be at least 8 characters.</p>
                                        </div>
                                        ";
                                    }
                                   


                                    else {
                                        $query = "INSERT INTO users(accrole,fname,lname,paddress,birthdate,username,phonenumber,gender,email,userpassword) 
                                        VALUES ('$role','$fname','$lname','$address','$bdate','$username','$phone','$gender','$email','$pw')";

                                        $query_run = mysqli_query($con, $query);

                                        if ($query_run){

                                            

                                            echo "<script>window.location.href='index.php' </script>";

                                            

                                        }
                                        else {
                                            die("Invalid query: " . $con->error);
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


    <script src="app.js"></script>
</body>


</html>