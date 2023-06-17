<?php
include("database.php");
if (isset($_POST['updateId'])) {
    $updateId = $_POST['updateId'];
    updateStatus($con2, $updateId);
}

function updateStatus($con2, $updateId)
{

    $getStatus = getStatus($con2, $updateId);
    if (!empty($getStatus)) {

        if ($getStatus['status'] == 0) {
            $sql = "UPDATE events SET status=1 WHERE id=$updateId";

            if ($con2->query($sql) === TRUE) {
                echo 1;
            }
        } elseif ($getStatus['status'] == 1) {
            $sql = "UPDATE events SET status=0 WHERE id=$updateId";

            if ($con2->query($sql) === TRUE) {
                echo 0;
            }
        }
    } else {
        echo "No data is exist in database";
    }
}

function getStatus($con2, $id)
{

    $query = "SELECT status FROM events WHERE id=$id";
    $result = $con2->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $row = [];
    }
    return $row;
}
