<?php 
# Server name
$sName = "localhost";
# User name
$uName = "root";
# Password
$pass = "";
# Database name 
$db_name = "bokland";

# Create connection
$conn = new mysqli($sName, $uName, $pass, $db_name);

# Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

