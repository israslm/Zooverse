<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php session_start();

$_SESSION["login"] = null;

$input = [$_POST["email"],$_POST["password"],date("Y-m-d H:i:s")];

file_put_contents('log/long.log',json_encode($input)."\n",FILE_APPEND);

if (isset($_POST["email"])) {
    echo $_POST["email"];
    echo "<br/>";
}

$utilisateurs =["Lina@gmail.com","passeLina","Edgar@gmail.com","passeEdgar"];

$i = 0;
$valid_input = new class{};
$valid_input->log=[['email'=>$_POST["email"],'password'=>$_POST["password"]]];
while ($i<=sizeof($utilisateurs)-2){
    if ($utilisateurs[$i]==$_POST["email"] && $utilisateurs[$i+1]==$_POST["password"]) {
        $_SESSION["login"]=$utilisateurs[$i];
        file_put_contents('log/login.json',json_encode($valid_input));
        echo "connecté : ";
        echo $_SESSION["login"];
        break;
    }
    $i=$i+2;
}


if ($_SESSION["login"] == null) {
    echo '<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>';
}