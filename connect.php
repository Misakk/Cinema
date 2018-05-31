<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS cinema";
mysqli_query($conn, $sql);

$conn = mysqli_connect($servername, $username, $password, "cinema");
