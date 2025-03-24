<?php
$host = "localhost"; // Change if needed
$user = "root"; // Your DB username
$pass = ""; // Your DB password
$dbname = "inkinindia"; // Change to your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
