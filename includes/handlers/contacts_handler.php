<?php
    

    $contacts_query = mysqli_query($con, 
    "SELECT users.id, f_name, l_name, birthday, pic 
    FROM users LEFT JOIN friends
    ON users.id = friends.friend
    where friends.user = $user[0]");

    function remove_friend($id){
        global $con, $user;
        $remove_friend_query = mysqli_query($con, "DELETE FROM friends WHERE user = $user[0] AND friend = $id");
        echo 'Friend removed.';
    }
    
    if(isset($_POST['remove_friend'])){
        remove_friend($_POST['id']);
    }



?>