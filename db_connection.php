<?php
$servername = "localhost"; 
$username = "admin"; 
$password = "Admin123@"; 
$dbname = "id21771873_admin"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>