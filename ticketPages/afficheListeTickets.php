<?php session_start();
$servername = "localhost";
$username = "root";
$password = "KyStFWGXyw4gdzx";
$dbname = "zooverse";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id FROM ticket";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

} else {
  echo "0 results";
}
$conn->close();
?>