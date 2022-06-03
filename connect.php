<?php

$servername = "localhost:3306";
$username = "root";
$password = "p@ssword";
$database = "bosch_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}

?>