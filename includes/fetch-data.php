<?php
include('database.php');

function fetchData($con2)
{

    $sql = "SELECT * FROM events";
    $result = $con2->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    } else {
        return $row = [];
    }
}
