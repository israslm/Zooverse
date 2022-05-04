<?php
    session_start();
    /*                  log/login_attempts.log */

    // get email and password from login.php
    $login_input_log = [$_POST["email"], $_POST["password"], gmdate("Y-m-d H:i:s")];
    // write $login_input_log in log/login_attempts.log
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/log/login_attempts.log', json_encode($login_input_log) . "\n", FILE_APPEND);


    /*                  log/login_successful.json */

    // log/login_successful.json structure definition
    $login_input_json = new class {
    };
    $login_input_json->log = [['email' => $_POST["email"], 'password' => $_POST["password"], 'date' => gmdate("Y-m-d H:i:s")]];


    // Vars
    $_SESSION["login"] = null;


    include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    // go through registred users in log/login_users.json and compare it with $login_input_json
    while ($row = mysqli_fetch_array($result)) {
        if ($row["login"] == $_POST["email"] && $row["password"] == $_POST["password"]) {
            // if entered (user/password) couple exists in log/login_users.json then set session variable
            $_SESSION["login"] = $_POST["email"];

            // log/login_successful.json -> php table (even if login_successful.json doesn't exist, in this case $login_successful = null)
            $login_successful = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/log/login_successful.json'), true);

            if ($login_successful == null) {
                // create log/login_successful.json and write $login_input_json
                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/log/login_successful.json', json_encode($login_input_json, JSON_PRETTY_PRINT));
            } else {
                // write $login_input_json in $login_successful (php table) using json suntax
                $login_successful["log"][count($login_successful["log"])] = ['email' => $_POST["email"], 'password' => $_POST["password"], 'date' => gmdate("Y-m-d H:i:s")];
                // write $login_successful (php table) -> log/login_successful.json
                file_put_contents($_SERVER['DOCUMENT_ROOT'].'/log/login_successful.json', json_encode($login_successful, JSON_PRETTY_PRINT));
            }
            break;
        }
    }
?>