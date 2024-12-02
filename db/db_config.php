<?php
$host = 'localhost';
$user = 'root';   // Default XAMPP MySQL username
$pass = '';       // Default XAMPP MySQL password (empty)
$dbname = 'causelist_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
