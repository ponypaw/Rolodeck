<?php
    include("includes/header.php");
    include('includes/handlers/contacts_handler.php');
?>


    <div class="item2">
        <table class=table>
            <tr>
                <th>Pic</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Remove Friend</th>
            </tr>

            <?php  

                while ($row = mysqli_fetch_array($contacts_query)) {
                    echo "<tr><td><img class='tiny_pic' src='assets/images/" . $row['pic'] . "'></td>";
                    echo "<td><a href='friend.php?friend=" . $row['id'] . "'>" . $row['f_name'] . ' ' . $row['l_name'] . '</td>';
                    echo "<td>" .$row['birthday'] . "</td>";
                    echo "<td><form action='' method='post'><input type='hidden' name='id' value='" . $row['id'] ."'><button name='remove_friend'>Remove Friend</button></form></tr></td>";
                }


            
            ?>

        </table>
    </div>



<?php
    include("includes/footer.php");
?>