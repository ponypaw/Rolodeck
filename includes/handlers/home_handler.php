<?php 

        // selects all posts by user

        $my_posts_query = mysqli_query($con, 
        "SELECT DISTINCT friends.user AS USER, posts.post, posts.id , users.f_name, users.l_name
        FROM posts LEFT JOIN friends
        ON posts.user = friends.user
        Left join users 
        ON friends.user = users.id
        WHERE friends.user = $user[0] 
        ORDER BY POSTS.ID DESC;
        ");

?>

