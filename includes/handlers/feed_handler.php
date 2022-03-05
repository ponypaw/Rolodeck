<?php 

        // selects all posts by friends of user

        $my_posts_query = mysqli_query($con, 
        "SELECT friends.friend AS USER, posts.post, posts.id, users.f_name, users.l_name
        FROM posts LEFT JOIN friends
        ON posts.user = friends.friend
        Left join users
        ON users.id = friends.friend
        WHERE friends.user = $user[0]
        ORDER BY POSTS.ID DESC;
        ");

    function add_thumbs_up($id){
        global $con, $user;
        $find_friend_query = mysqli_query($con, "UPDATE users SET num_likes = num_likes + 1 WHERE id = $id");
    }


    if(isset($_POST['thumbs_up'])) {
        add_thumbs_up($_POST["id"]);
    }


?>

