<?php
    if(isset($_GET['code'])) {
        $code = $_GET['code'];

        $conn = new mySqli('localhost:8089', 'root', 'root', 'medicaldental');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }

        $verifyQuery = $conn->query("SELECT * FROM users_credentials WHERE code = '$code' and updated_time >= NOW() - Interval 1 DAY");

        if($verifyQuery->num_rows == 0) {
            header("Location: index.html");
            exit();
        }

        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];

            $changeQuery = $conn->query("UPDATE users_credentials SET user_password = '$new_password' WHERE email = '$email' and code = '$code' and updated_time >= NOW() - INTERVAL 1 DAY");

            if($changeQuery) {
                header("Location: success.php");
            }
        }
        $conn->close();
    }
    else {
        header("Location: index.html");
        exit();
    }
?>