<?php session_start();
$servername = "localhost";
$username = "root";
$password = "KyStFWGXyw4gdzx";
$dbname = "zooverse";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql ="INSERT INTO ticket(login,sujet,description,prio,secteur,statut) VALUES('".$_POST["login"]."','".$_POST["sujet"]."','".$_POST["description"]."','".$_POST["prio"]."','".$_POST["secteur"]."','".$_POST["statut"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>