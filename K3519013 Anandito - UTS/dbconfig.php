<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'game';
    $port   = 3310;

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port);
    if(!$conn){
        die( "Connection Failed : ".mysqli_connect_error($conn));
    }

?>
