<?
    include ('/Database/validatelogin.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="regpage-css.css">
    </head>

    <body>

        <div id="bg">
            <img src="wp5228894.jpg" alt="background">
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1 form login-form">

                    <form method="POST" action="add-account.php">

                        <h4 class="text-center font-weight-bold"> Cruz Dental Clinic <br /><br /></h4>
                        <h2 class="text-center">Create Account</h2>

                        <div>
                            <div style="text-align: center; display: flex; align-items: center;">
                                <div class="col" style="margin-left: 250px; margin-right: 250px;">
                                    Select Role
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="" selected disabled>Select</option>      
                                        <option value="Employee">Employee</option>
                                        <option value="Dentist">Dentist</option>
                                        <option value="Patient">Patient</option>
                                    </select>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col">
                                    First Name
                                    <input class="form-control" class="inpt" id="nm" type="text" name="fname" placeholder="First Name" required>
                                    <p id="nmmsg" class="inptmsg" style="color:red"></p>
                                </div>
                                <div class="col">
                                    Last Name
                                    <input class="form-control" class="inpt" id="nm" type="text" name="lname" placeholder="Last Name" required>
                                    <p id="nmmsg" class="inptmsg" style="color:red"></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    Gender
                                    <select class="form-control" class="inpt"  name="gender" required>
                                        <option value="" selected disabled>Select</option>      
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col">
                                    Birthdate
                                    <input class="form-control" id="birthday" class="inpt" type="date" name="bdate" placeholder="Birthdate" max="<?= date('Y-m-d'); ?>" required>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    Address
                                    <input class="form-control" class="inpt" type="text" name="address" placeholder="Address" required>
                                    <p id="addmsg" class="inptmsg" style="color:red"></p>
                                </div>
                                <div class="col">
                                    Phone Number
                                    <input class="form-control" class="inpt" id="pn" type="number" name="phone" id="number" placeholder="09*********" maxlength="10" required>
                                    <p id="pnmsg" class="inptmsg" style="color:red"></p>                                
                            </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    Username
                                    <input class="form-control" class="inpt" id="un" type="text" name="username" placeholder="Username" required>
                                    <p id="unmsg" class="inptmsg" style="color:red"></p>
                                </div>
                                <div class="col">
                                    Email Address
                                    <input class="form-control" type="email" class="inpt" id="em" type="text" name="email" placeholder="Email address" required>
                                    <p id="emmsg" class="inptmsg" style="color:red"></p>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col">
                                    Password
                                    <input class="form-control" class="inpt" type="password" name="password" placeholder="Password" required>
                                    <p id="pwdmsg" class="inptmsg" minlength="8" maxlength="15" style="color:red"></p>
                                </div>
                                <div class="col">
                                    Confirm Password
                                    <input class="form-control" class="inpt" type="password" name="cpassword" minlength="8" maxlength="15" placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <div id="guardian-id" style="display:none">

                                    <div>
                                        Name of Guardian
                                        <input class="form-control" class="inpt" id="un" type="text" name="guardian_name" placeholder="Name of guardian">
                                        <p id="unmsg" class="inptmsg" style="color:red"></p>
                                    </div>

                                    <div class="form-group">
                                        Contact Number
                                        <input class="form-control" class="inpt" id="un" type="number" name="guardian_number" placeholder="Contact number">
                                        <p id="unmsg" class="inptmsg" style="color:red"></p>
                                    </div>

                                    <div class="form-group">
                                        Relationship
                                        <input class="form-control" class="inpt" id="un" type="text" name="guardian_relationship" placeholder="Relationship">
                                        <p id="unmsg" class="inptmsg" style="color:red"></p>
                                    </div>

                            </div>



                            <div class="row" style="margin-left: 12%; margin-right: 12%; margin-bottom: 4%;">
                                <div class="col" style="margin-top: 3%;">
                                    <button class="form-control btn btn-danger" type="submit" name="cancel">Cancel</button>
                                </div>
                                <div class="col" style="margin-top: 3%;">
                                    <button class="form-control btn btn-primary" type="submit" name="create">Create</button>
                                </div>
                            </div>

                        </div>


                                    


                    </form>

                    <style>
                        input:invalid, select:invalid{
                            border: 2px solid red;
                        }

                        input:valid, select:valid{
                            border: 2px solid green;
                        }
                    </style>
                </div>
            </div>
        </div>
        </div>

        <script type="text/javascript" src="validator-accountcreation.js"></script>

        <script> 
        
        function ageCount(){

            var now = new Date();
            var currentY = now.getFullYear();

            var dobget = document.getElementById('birthday').value;
            var dob = new Date(dobget);
            var prevY = dob.getFullYear();

            var ageY = currentY - prevY;

            return ageY;
            
        }

        document.getElementById("birthday").addEventListener('input', function(){
             var age = document.getElementById("birthday").value;

             if (age < 18){
                document.getElementById("guardian-id").style.display = "block";
             }

        });
    
        </script>

    </body>

    </html>