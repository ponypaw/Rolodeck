<?php

    if(isset($_POST['logout'])) {
        echo 'Logout pressed';

        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }

?>