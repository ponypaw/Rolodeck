<?php
    include("includes/header.php");
    include("includes/handlers/home_handler.php");
    include("includes/handlers/post_handler.php");
?>


    <div class="item2">
        <form action="home.php" method="post">
            <label for="newpost">Say something:</label>
            <br>
            <textarea wrap="soft" id="newpost" name="new_post" cols="50" rows="4" maxlength="200"> </textarea>
            <br><button name="submit_post" type="submit">Submit</button>
        </form>
        <br>

        <?php
        
            while ($row = mysqli_fetch_array($my_posts_query)) {
                echo $row[1] . '<br>';
                echo "-" . $row['f_name'] . " " . $row['l_name'] . "<br>";
                echo "<td><form action='' method='post'><input type='hidden' name='id' value='" . $row['id'] ."'><button name='remove_post'>Delete</button></form></tr></td>";
                echo '<br><br>';
            }
        
        ?>


    </div>



<?php
    include("includes/footer.php");
?>