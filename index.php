<?php
    include("includes/header.php");
    require 'includes/handlers/register_handler.php';
    require 'includes/handlers/login_handler.php';
?>

    <div class="login_box">
            <div class="login_header">
               <?php isset($user) ? print "You are logged in!": print "Login or Signup below" ?> 
            </div>
            <div id="first">
            <form action="index.php" method="POST">
                    <input type="email" name="log_email" placeholder="Email address"value="<?php 
                            if (isset($_SESSION['log_email'])) {
                                echo $_SESSION['log_email'];
                            }
                        ?>" required>
                    <br>
                    <input type="password" name="log_password" placeholder="Password">
                    <br>
                    <input type="submit" name="login_button" value="Log In">
                    <br>
                    <?php  if(in_array("Email or password was incorrect.<br>", $error_array)){
                        echo "Email or password was incorrect.<br>";
                    } ?>
                    <br>

                </form>
            </div>

            <div id="second">
                <form action="index.php" method="POST">
                    <input type="text" name="reg_fname" placeholder="First name" 
                        value="<?php 
                            if (isset($_SESSION['reg_fname'])) {
                                echo $_SESSION['reg_fname'];
                            }
                        ?>"
                        required>
                    <br>
                    <?php if(in_array("Your first name must be between 2 and 25 characters long.<br>", $error_array)) 
                    { echo "Your first name must be between 2 and 25 characters long.<br>"; } ?>

                    <input type="text" name="reg_lname" placeholder="Last name" 
                        value="<?php 
                            if (isset($_SESSION['reg_lname'])) {
                                echo $_SESSION['reg_lname'];
                            }
                        ?>"
                        required>
                    <br>

                    <input type="date" name="reg_bday" placeholder="Birthday" required>
                    <br>
                    <?php if(in_array("You must be at least 13 to register.<br>", $error_array)) 
                    { echo "You must be at least 13 to register.<br>"; } ?>

                    <?php if(in_array("Your last name must be between 2 and 25 characters long.<br>", $error_array)) 
                    { echo "Your last name must be between 2 and 25 characters long.<br>"; } ?>

                    <input type="email" name="reg_email" placeholder="Email" 
                        value="<?php 
                            if (isset($_SESSION['reg_email'])) {
                                echo $_SESSION['reg_email'];
                            }
                        ?>"
                        required>
                    <br>
                    <?php if(in_array("Invalid email format.<br>", $error_array)) 
                    { echo "Invalid email format.<br>"; } ?>

                    <input type="email" name="reg_email2" placeholder="Confirm Email" 
                        value="<?php 
                            if (isset($_SESSION['reg_email2'])) {
                                echo $_SESSION['reg_email2'];
                            }
                        ?>"
                        required>
                    <br>
                    <?php if(in_array("Emails don't match.<br>", $error_array)) 
                    { echo "Emails don't match.<br>"; } ?>

                    <input type="password" name="reg_password" placeholder="Password" required>
                    <br>
                    <?php if(in_array("Your password can only contain English characters or numbers.<br>", $error_array)) 
                    { echo "Your password can only contain English characters or numbers.<br>"; } ?>

                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <?php if(in_array("Your passwords do not match.<br>", $error_array)) 
                    { echo "Your passwords do not match.<br>"; } ?>

                    <input type="submit" name="register_button" value="Register">
                    <br>
                    <?php if(in_array("<span style='color: #14C800'> You're all set! Go ahead and log in.</span>", $error_array)) 
                    { echo "<span style='color: #14C800'> You're all set! Go ahead and log in.</span>"; } ?>
                    
                </form>
            </div>
        
</div>



<?php
    include("includes/footer.php");
?>
