<?php
$servername = "localhost";
$username = "uexyrer_localbite";
$password = "m9eJYFkklxuznaqkyum7";
$dbname = "uexyrer_localbite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
