<?php
    include("includes/header.php");
    include("includes/handlers/friend_handler.php");

?>

    <div class="item2">
        
        <table class="table">

            <tr>
                <td><img class="friend_pic" src="assets/images/<?php print $friend_array[6] ?>" alt=""></td>
                <td><?php print $friend_array[3] ?> <?php print $friend_array[4] ?></td>
            </tr>
            <tr>
                <td>Birthday: <?php print $friend_array[5] ?></td>
                <td><form action="" method="post"><button name="add_friend"> Add Friend </button><form></td>
            </tr>

        </table>

    </div>




<?php
    include("includes/footer.php");
?>