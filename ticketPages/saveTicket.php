<?php 
    include_once 'connectSQL.php';
    $sql ="INSERT INTO ticket(login,subject,description,priority,sector,status) VALUES('".$_POST["login"]."','".$_POST["subject"]."','".$_POST["description"]."','".$_POST["priority"]."','".$_POST["sector"]."','".$_POST["status"]."')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>