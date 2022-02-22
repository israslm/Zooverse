<?php session_start();

$_SESSION["login"] = null;

if (isset($_POST["txtEmail"])) {
    echo $_POST["txtEmail"];
    echo "<br/>";
}

$utilisateurs =["Lina@gmail.com","passeLina","Edgar@gmail.com","passeEdgar"];

$i = 0;

while ($i<=sizeof($utilisateurs)-2){
    if ($utilisateurs[$i]==$_POST["txtEmail"] && $utilisateurs[$i+1]==$_POST["txtPass"]) {
        $_SESSION["login"]=$utilisateurs[$i];
        echo "connecté : ";
        echo $_SESSION["login"];
        break;
    }
    $i=$i+2;
}

if ($_SESSION["login"] == null) {
    echo '<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>';
}