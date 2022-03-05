<?php

    // if search button is pressed
    if (isset($_POST['search_button'])) {
        
        // set up variables to prevent errors 
        $fname ="";
        $lname ="";
        $birthday ="";

        // filters input to avoid security risks
        if (isset($_POST['fname'])){
            $fname = filter_var($_POST['fname'],FILTER_SANITIZE_STRING);
        }
        if (isset($_POST['lname'])){
            $lname = filter_var($_POST['lname'],FILTER_SANITIZE_STRING);
        }
        if (isset($_POST['birthday'])){
            $birthday = filter_var($_POST['birthday'],FILTER_SANITIZE_STRING);
        }

        $search_query = mysqli_query($con,"SELECT id, f_name, l_name, birthday 
        FROM users 
        WHERE f_name='$fname' OR l_name='$lname' OR birthday='$birthday'");

        while ($row = mysqli_fetch_array($search_query)) {
            echo "<a href='friend.php?friend=$row[0]' >";
            echo $row[1] . ' ' . $row[2] . ', Born ' . $row[3] . '<br>';      
            echo '</a>';         
}
    }









?>