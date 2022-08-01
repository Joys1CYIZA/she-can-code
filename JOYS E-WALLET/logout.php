<?php
   session_start();
   session_destroy();
   echo "<h1> you have successfully logged out </h1>";
    header('location:signin.php');
?>