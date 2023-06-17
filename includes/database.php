<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "uiucms";
$con2 = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($con2->connect_error) {
    die("Connection failed: " . $con2->connect_error);
}
