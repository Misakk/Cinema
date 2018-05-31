<?php
include "connect.php";

$sql = "CREATE TABLE IF NOT EXISTS Seats (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
phone VARCHAR(30) NOT NULL,
placeNum VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

mysqli_query($conn, $sql);
