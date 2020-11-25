<?php
    $db = "localhost";
    $username = "root";
    $pass = "";
    $connection = mysqli_connect($db,$username,$pass);

     if (!$connection) {
         die("Could not connect ".mysql_error());
     }

?>