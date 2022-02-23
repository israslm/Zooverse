<?php session_start();

$_SESSION["login"] = null;

$input = [$_POST["email"],$_POST["password"],date("Y-m-d H:i:s")];

file_put_contents('log/long.log',json_encode($input),FILE_APPEND);

if (isset($_POST["email"])) {
    echo $_POST["email"];
    echo "<br/>";
}

$utilisateurs =["Lina@gmail.com","passeLina","Edgar@gmail.com","passeEdgar"];

$i = 0;

while ($i<=sizeof($utilisateurs)-2){
    if ($utilisateurs[$i]==$_POST["email"] && $utilisateurs[$i+1]==$_POST["password"]) {
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