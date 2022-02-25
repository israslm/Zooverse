<?php 
    include_once 'connectSQL.php';
    $sql ="INSERT INTO ticket(login,sujet,description,prio,secteur,statut) VALUES('".$_POST["login"]."','".$_POST["sujet"]."','".$_POST["description"]."','".$_POST["prio"]."','".$_POST["secteur"]."','".$_POST["statut"]."')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>