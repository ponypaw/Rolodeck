<?php
// Declaring variables to prevent errors
    $fname = ""; // lirst name
    $lname = ""; // last name
    $em = ""; // email
    $em2 = ""; // email confirm
    $password = ""; // password
    $password2 = ""; // password confirm
    $date = ""; // birth date
    $pic = '';
    $error_array = array(); // holds error messages

    if(isset($_POST['register_button'])){
        // If registration button has been pressed

        // fname
        $fname = strip_tags($_POST['reg_fname']); // remove html tags for security
        $fname = str_replace(' ', '', $fname); // remove spaces
        $_SESSION['reg_fname'] = $fname; // Stores first name into session variable

        // lname
        $lname = strip_tags($_POST['reg_lname']); // remove html tags for security
        $lname = str_replace(' ', '', $lname); // remove spaces
        $_SESSION['reg_lname'] = $lname; // Stores first name into session variable
        
        // Email
        $em = strip_tags($_POST['reg_email']); // remove html tags for security
        $em = str_replace(' ', '', $em); // remove spaces
        $_SESSION['reg_email'] = $em; // Stores email into session variable
        
        // Email 2
        $em2 = strip_tags($_POST['reg_email2']); // remove html tags for security
        $em2 = str_replace(' ', '', $em2); // remove spaces
        $_SESSION['reg_email2'] = $em2; // Stores email 2 into session variable
    
        // Password
        $password = strip_tags($_POST['reg_password']); // remove html tags for security
        $password2 = strip_tags($_POST['reg_password2']); // remove html tags for security
    
        $date = $_POST['reg_bday'];
        $_SESSION['reg_joined'] = $date; // Stores birthdate into session variable

        // Check if emails match
        if ($em == $em2) {

            // Check if email is in valid format
            if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
                $em = filter_var($em, FILTER_VALIDATE_EMAIL);

                // search for email in database
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

                // Check number of rows returned from email search
                $num_rows = mysqli_num_rows($e_check);

                // if email already exists
                if ($num_rows > 0) {
                    array_push($error_array, "Email already in use.<br>");
                }

            }
            else {
                array_push($error_array, "Invalid email format.<br>");
            }
        }
        else {
            array_push($error_array, "Emails don't match.<br>");
        }

        if (strlen($fname) > 25 || strlen($fname) < 2) {
            array_push($error_array, "Your first name must be between 2 and 25 characters long.<br>");
        }

        if (strlen($lname) > 25 || strlen($lname) < 2) {
            array_push($error_array, "Your last name must be between 2 and 25 characters long.<br>");
        }

        if (strtotime($date) > strtotime('-4745 days')) {
            array_push($error_array, "You must be at least 13 to register.<br>");
        }

        if ($password != $password2) {
            array_push($error_array, "Your passwords do not match.<br>");
        }
        else {
            if(preg_match('/[^A-Za-z0-9]/', $password)) {
                array_push($error_array, "Your password can only contain English characters or numbers.<br>");
            }
        }

        if (strlen($password) > 30 || strlen($password) < 5) {
            array_push($error_array, "Your password must be between 5 and 30 characters.<br>");
        }

        $picNum = rand(1, 3);
        $next_user_num_query = mysqli_query($con, "SELECT id FROM users ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_array($next_user_num_query);
        $next_user_num = (int)$row[0] + 1;

        // assign random default user image
        if ($picNum == 1) {
            
            copy('assets/images/blue.png', 'assets/temp/blue.png');
            rename('assets/temp/blue.png', 'assets/temp/' . $next_user_num . '.' . 'png');
            copy('assets/temp/' . $next_user_num . '.' . 'png', 'assets/images/' . $next_user_num . '.' . 'png');
            $pic = $next_user_num . '.' . 'png';

        } elseif ($picNum == 2) {
            copy('assets/images/green.png', 'assets/temp/green.png');
            rename('assets/temp/green.png', 'assets/temp/' . $next_user_num . '.' . 'png');
            copy('assets/temp/' . $next_user_num . '.' . 'png', 'assets/images/' . $next_user_num . '.' . 'png');
            $pic = $next_user_num . '.' . 'png';
        } else {
            copy('assets/images/red.png', 'assets/temp/red.png');
            rename('assets/temp/red.png', 'assets/temp/' . $next_user_num . '.' . 'png');
            copy('assets/temp/' . $next_user_num . '.' . 'png', 'assets/images/' . $next_user_num . '.' . 'png');
            $pic = $next_user_num . '.' . 'png';
        }

        if(empty($error_array)) {
            $password = md5($password); // Encrypts password
           
            $query = mysqli_query($con, "INSERT INTO users (f_name, l_name,email,password, birthday, pic ) 
                                        VALUES ('$fname', '$lname', '$em', '$password', '$date', '$pic')");

            mysqli_close($con);

            array_push($error_array, "<span style='color: #14C800'> You're all set! Go ahead and log in.</span>");

            unlink('assets/temp/' . $next_user_num . '.' . 'png');

            session_destroy();

        }
    }
?>