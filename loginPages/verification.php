<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../css/verification.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- Background operations -->
        <?php 
                session_start();
                /*                  log/login_attempts.log */

                // get email and password from authentification.html
                $authentification_input_log = [$_POST["email"],$_POST["password"],gmdate("Y-m-d H:i:s")];
                // write $authentification_input_log in log/login_attempts.log
                file_put_contents('../log/login_attempts.log',json_encode($authentification_input_log)."\n",FILE_APPEND);


                /*                  log/login_successful.json */

                // log/login_successful.json structure definition
                $authentification_input_json = new class{};
                $authentification_input_json->log=[['email'=>$_POST["email"],'password'=>$_POST["password"],'date'=>gmdate("Y-m-d H:i:s")]]; 
                // log/login_users.json -> php table
                $login_users = json_decode(file_get_contents('../log/login_users.json'),true);
                // Vars
                $_SESSION["login"] = null;
                $i = 0;
                // go through registred users in log/login_users.json and compare it with $authentification_input_json
                while ($i<=count($login_users["users"])-1){
                    if ($login_users["users"][$i]["email"]==$_POST["email"] && $login_users["users"][$i]["password"]==$_POST["password"]) {
                        // if entered (user/password) couple exists in log/login_users.json then set session variable
                        $_SESSION["login"]=$login_users["users"][$i]["email"];

                        // log/login_successful.json -> php table (even if login_successful.json doesn't exist, in this case $login_successful = null)
                        $login_successful = json_decode(file_get_contents('../log/login_successful.json'),true);

                        if ($login_successful == null) {
                            // create log/login_successful.json and write $authentification_input_json
                            file_put_contents('../log/login_successful.json',json_encode($authentification_input_json,JSON_PRETTY_PRINT));
                        }
                        else {
                            // write $authentification_input_json in $login_successful (php table) using json suntax
                            $login_successful["log"][count($login_successful["log"])] = ['email'=>$_POST["email"],'password'=>$_POST["password"],'date'=>gmdate("Y-m-d H:i:s")];
                            // write $login_successful (php table) -> log/login_successful.json
                            file_put_contents('../log/login_successful.json',json_encode($login_successful,JSON_PRETTY_PRINT));
                        }
                        break;
                    }
                    $i=$i+1;
                }
        ?>
        <header>
            <!-- Menu -->
            <nav class="navagation-bar">
                <div>
                    <ul class="menu">
                        <li><a href="../index.php">index</a></li>
                        <li><a href="authentification.html">authentification</a></li>
                        <li><a href="ticketPages/formTicket.php">formTicket</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-sm-5">
                    <div>
                        <h1>Login</h1>
                    </div>
                    <?php 
                        if ($_SESSION["login"] == null) {
                            echo
                            '<form action="authentification.html">
                                <div class="alert alert-danger" role="alert">
                                    Wrong email and/or password!
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit">Try again</button>
                                </div>
                            </form>'
                            ;
                        }
                        else {
                            echo 
                            '<form action="../index.php">
                                <div class="alert alert-success" role="alert">
                                    Welcome back, '.strtok($_SESSION["login"],'@').'!
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit">Go to homepage</button>
                                </div>
                            </form>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
