<?php
include "connect.php";

$sql = "SELECT placeNum FROM seats";
$result = mysqli_query($conn, $sql);
$k = 0;
$places = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        for ($i = 0; $i < strlen($row["placeNum"]); $i++ ) {
            if($row["placeNum"][$i] === ',') {
                array_push($places, ["place" => (string)$k]);
                $k = 0;
            } else {
                $k = $k * 10 + intval($row["placeNum"][$i]);
            }
        }
    }
}

print_r(json_encode(json_encode($places)));
