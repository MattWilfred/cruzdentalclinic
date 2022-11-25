<?
    include ('Database/validatelogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="bg">
        <img src="images/298176372_391822296415558_6074440962774770000_n.png" alt="background">
      </div>

    <div class="container">
        <div class="row">
        <img src="images/298783880_5652912168104978_7318141653551353703_n.png" alt="logo"
        style="width:400px;height:400px;position:fixed;left:-100px;top:80px;">
            <div class="col-md-4 offset-md-4 form login-form">

                <form method="POST" action="/Database/validatelogin.php">
                <img src="images/298783880_5652912168104978_7318141653551353703_n.png" alt="logo"  style="width:75px;height:75px; display: block;
  margin-left: auto;
  margin-right: auto;
  ">
                <h4 class="text-center font-weight-bold"> Cruz Dental Clinic <br /><br /></h4>
                    <h2 class="text-center">Login</h2> 
                   
                    <div class="form-group">
                        <input class="form-control" type="text" name="uname" placeholder="Email Address OR Username" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="link login-link text-center"><a href="CreateAccount.html">Create Account</a></div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
