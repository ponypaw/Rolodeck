<?php

    $friendID = $_GET['friend'];
    
    // searches database for friend
    $friend_query = mysqli_query($con, "SELECT * FROM users WHERE id = $friendID");

    // turns friend data into array for retrieval in browser
    $friend_array = mysqli_fetch_array($friend_query);

    // if add friend button is pressed
    if(isset($_POST['add_friend'])){
        
        // checks to see if loggied in user and new person are already friends
        $duplicate_check_query = mysqli_query($con, "SELECT * FROM friends WHERE user = $user[0] AND friend = $friend_array[0]");
        
        $duplicate_check = mysqli_num_rows($duplicate_check_query );
        
        if ($duplicate_check == 0) {
            $query = mysqli_query($con, "INSERT INTO friends (user, friend) VALUES ($user[0], $friend_array[0])");
            echo "Friend added!";
        } else {
            echo "You two are already friends!";
        }
        
        
    }


?>