<?php

// if the submit post button has been pressed
if(isset($_POST['submit_post'])) {
    
    // adds in slashes to allow apostrophes to by typed
    $post = filter_var($_POST['new_post'], FILTER_SANITIZE_ADD_SLASHES);

    // strip tags to prevent injection
    $post = filter_var($_POST['new_post'], FILTER_SANITIZE_STRING);

    // add post to posts database
    $save_post = mysqli_query($con, "INSERT INTO posts (user, post) VALUES ('$user[0]', '$post') ");

    //update post count
    $update_count = mysqli_query($con, "UPDATE users SET num_posts = num_posts + 1 WHERE id = $user[0]");

    mysqli_close($con);
    
}

function delete_post($id){
    global $con, $user;
    $remove_friend_query = mysqli_query($con, "DELETE FROM posts WHERE user = $user[0] AND id = $id");
    echo 'Post removed.';
}

if(isset($_POST['remove_post'])){
    delete_post($_POST['id']);
}





?>