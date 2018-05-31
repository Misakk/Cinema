<?php
// insert values in db

include "connect.php";

$firstName =  $_POST['firstName'];
$lastName =  $_POST['lastName'];
$phone =  $_POST['phone'];
$placeId = $_POST["hiddenVal"] . ',';
$sql = "INSERT INTO Seats (firstname, lastname, phone, placeNum) VALUES ('$firstName', '$lastName', '$phone', '$placeId')";

mysqli_query($conn, $sql);
