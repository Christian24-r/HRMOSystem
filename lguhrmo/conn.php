<?php

// $HOSTNAME = 'localhost';
// $USERNAME = 'root';
// $PASSWORD = '';
// $DATABASE = 'db_hrmo';

// $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
$conn = mysqli_connect("localhost", "root", "", "db_hrmo");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
