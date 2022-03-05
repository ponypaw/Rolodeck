<?php
  require 'config/config.php';
  $con = mysqli_connect("localhost", "root", "", "rolodeck");

  # let user know if the database was not connected to
  if(mysqli_connect_errno()){
      echo "Failed to connect: " . mysqli_connect_errno();
  }

  # if user is logged in, sets up account details for use elsewhere
  if (isset($_SESSION['id'])) {
    $userLoggedIn = $_SESSION['id'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
  } 

  include("includes/handlers/logout_handler.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link to bootstrap styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Rolodeck</title>
</head>

<body>
    <div class="top-bar">
        <div class="nav_links"> <!-- nav bar links -->
            <ul class="nav justify-content-center nav-tabs">
                <li id="rolodeck"><a href="index.php">
                        <!-- bootstrap logo code -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                        <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
                        </svg> </a></li>
                    <li id="home" class="nav-item"><a href="home.php"> Home </a></li>
                    <li id="feed" class="nav-item"><a href="feed.php"> Feed </a></li>
                    <li id="search" class="nav-item"><a href="search.php"> Search </a></li>
                    <li id="contacts" class="nav-item"><a href="contacts.php"> Contacts </a></li>
                    <li><form action="" method="post"><button class="btn btn-warning float-right logout" type="submit" name="logout">Log Out</button></form></li>
            </ul>
        </div>

    </div>

    <div class="container">
        <div class="item1">
            <div class="welcome"><?php isset($user) ? print "Welcome $user[3]" :  print "Welcome stranger."  ?></div>
            <br>
            <img class="profile_pic" src="assets/images/<?php isset($user) ? print $user[6] : print 'blue.png' ?>" alt="Image">
            <br>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">   
                <input type="hidden" name='usernum' value=<?php isset($user) ? print $user[0] : print '0' ?>>
                <?php isset($user) ? print '<button name="image_file_submit" type="submit">+</button>': print ' ' ?>
            </form>
            <br>
            Posts: <?php isset($user) ? print $user[7] : print'0' ?>
            <br>
            Likes: <?php isset($user) ? print $user[8] : print'0' ?>
        </div>