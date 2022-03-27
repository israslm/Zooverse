<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/global.css" rel="stylesheet">
</head>

<body>
    <!-- Background operations -->
    <?php
    session_start();
    /*                  log/login_attempts.log */

    // get email and password from login.php
    $login_input_log = [$_POST["email"], $_POST["password"], gmdate("Y-m-d H:i:s")];
    // write $login_input_log in log/login_attempts.log
    file_put_contents('../log/login_attempts.log', json_encode($login_input_log) . "\n", FILE_APPEND);


    /*                  log/login_successful.json */

    // log/login_successful.json structure definition
    $login_input_json = new class
    {
    };
    $login_input_json->log = [['email' => $_POST["email"], 'password' => $_POST["password"], 'date' => gmdate("Y-m-d H:i:s")]];
    

    // Vars
    $_SESSION["login"] = null;
    
    
    include_once '../common/connectSQL.php';
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    
    // go through registred users in log/login_users.json and compare it with $login_input_json
    while ($row = mysqli_fetch_array($result)) {
        if($row["login"]==$_POST["email"] && $row["password"]==$_POST["password"])   {
            // if entered (user/password) couple exists in log/login_users.json then set session variable
            $_SESSION["login"] = $_POST["email"];

            // log/login_successful.json -> php table (even if login_successful.json doesn't exist, in this case $login_successful = null)
            $login_successful = json_decode(file_get_contents('../log/login_successful.json'), true);

            if ($login_successful == null) {
                // create log/login_successful.json and write $login_input_json
                file_put_contents('../log/login_successful.json', json_encode($login_input_json, JSON_PRETTY_PRINT));
            } else {
                // write $login_input_json in $login_successful (php table) using json suntax
                $login_successful["log"][count($login_successful["log"])] = ['email' => $_POST["email"], 'password' => $_POST["password"], 'date' => gmdate("Y-m-d H:i:s")];
                // write $login_successful (php table) -> log/login_successful.json
                file_put_contents('../log/login_successful.json', json_encode($login_successful, JSON_PRETTY_PRINT));
            }
            break;
        }     
    }
    ?>
    <header>
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo2.png" alt="logo" width="100em" height="100em">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Sectors</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tickets
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="../ticketPages/newTicket.php">New ticket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../ticketPages/showOneTicket.php">showOneTicket</a>
                                </li>
                                <li><a class="dropdown-item" href="../ticketPages/showTickets.php">All tickets</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <?php
                            if (!isset($_SESSION["login"])) {
                                echo '
                                            <span class="navbar-text">
                                                Not logged in
                                            </span>';
                                echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.php">login</a>
                                            </li>';
                            } else {
                                echo '
                                            <span class="navbar-text">
                                                Logged in as ' . strtok($_SESSION["login"], '@') . '
                                            </span>';
                                echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="logout.php">logout</a>
                                            </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <a class="navbar-brand" href="index.php">
                    <?php
                    $h = gmdate('H');
                    if ($h > 5 && $h <= 12) {
                        echo ' <img src="../img/navigationBar/zebra.png" alt="zebra" width="100em" height="100em" /> ';
                    } elseif ($h > 12 && $h <= 21) {
                        echo ' <img src="../img/navigationBar/giraffe.png" alt="giraffe" width="100em" height="100em" /> ';
                    } else {
                        echo ' <img src="../img/navigationBar/panda.png" alt="panda" width="100em" height="100em" /> ';
                    }
                    ?>
                </a>
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
                    '<form action="login.php">
                                <div class="alert alert-danger" role="alert">
                                    Wrong email and/or password!
                                </div>
                                <div>
                                    <button class="btn btn-outline-success" type="submit">Try again</button>
                                </div>
                            </form>';
                } else {
                    echo
                    '<form action="../index.php">
                                <div class="alert alert-success" role="alert">
                                    Welcome back, ' . strtok($_SESSION["login"], '@') . '!
                                </div>
                                <div>
                                    <button class="btn btn-outline-success" type="submit">Go to homepage</button>
                                </div>
                            </form>';
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>