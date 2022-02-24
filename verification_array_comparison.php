<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php session_start();

$_SESSION["login"] = null;

$input = [$_POST["email"],$_POST["password"],date("Y-m-d H:i:s")];

file_put_contents('log/login_attempts.log',json_encode($input)."\n",FILE_APPEND);

if (isset($_POST["email"])) {
    echo $_POST["email"];
    echo "<br/>";
}

$utilisateurs =["Lina@gmail.com","passeLina","Edgar@gmail.com","passeEdgar"];

$i = 0;

$valid_input = new class{};
$valid_input->log=[['email'=>$_POST["email"],'password'=>$_POST["password"],'date'=>date("Y-m-d H:i:s")]];

while ($i<=sizeof($utilisateurs)-2){
    if ($utilisateurs[$i]==$_POST["email"] && $utilisateurs[$i+1]==$_POST["password"]) {
        $_SESSION["login"]=$utilisateurs[$i];
        $b = json_decode(file_get_contents('log/login_successful.json'),true);
        if ($b == null) {
            file_put_contents('log/login_successful.json',json_encode($valid_input,JSON_PRETTY_PRINT));
        }
        else {
            $b["log"][count($b["log"])] = ['email'=>$_POST["email"],'password'=>$_POST["password"],'date'=>date("Y-m-d H:i:s")];
            file_put_contents('log/login_successful.json',json_encode($b,JSON_PRETTY_PRINT));
        }
        

        echo "connecté : ";
        echo $_SESSION["login"];
        break;
    }
    $i=$i+2;
}   


if ($_SESSION["login"] == null) {
    echo '<div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>';
}