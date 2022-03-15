<?php
$servername = "localhost";
$username = "root";
$password = "KyStFWGXyw4gdzx";
$dbname = "zooverse";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}