<?php
session_start();
// Setting up the Database Connection
$servername = "localhost";
$username = "lellinger51";
$password = "a7e7ezanu";
$dbname = "lellinger51_lecturesnippets";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>