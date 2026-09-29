<?php
// Database configuration
$host = "localhost";
$user = "root";
$password = "12345";
$database = "typing.sql";

// Create database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>