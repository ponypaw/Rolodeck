<?php
    include("includes/header.php");
    
?>


    <div class="item2">
        <form action="" method="post">
            <label for="fname">First Name</label><br>
            <input name="fname" type="text"><br>
            <label for="lname">Last Name</label><br>
            <input name="lname" type="text"><br>
            <label for="birthday">Birthday</label><br>
            <input name="birthday" type="text"><br>
            <button name="search_button" type="submit">Search</button>
        </form>
        <br>
        <hr>
        <br>
        <?php
            include("includes/handlers/search_handler.php");
        ?>
    </div>



<?php
    include("includes/footer.php");
?>