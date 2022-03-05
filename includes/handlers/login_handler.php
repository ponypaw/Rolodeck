<?php
    

    if (isset($_POST['login_button'])) { // if log in button has been pressed
        $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // makes sure email in correct format

        $_SESSION['log_email'] = $email; // stores email in form for login in case password is wrong

        $password = md5($_POST['log_password']); // get password hash

        // see if a user exists with the given email and hashed password 
        $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password ='$password'");
        $check_login_query = mysqli_num_rows($check_database_query);

        if($check_login_query == 1){
            $row = mysqli_fetch_array($check_database_query);
            $userId = $row['id'];

            // if information matches, set up logged in session ID

            $_SESSION['id'] = $userId;
            echo "You have been logged in!";

        }
        else {
            echo "Account not found.";
            array_push($error_array, "Email or password was incorrect.<br>");
        }
    }

?>