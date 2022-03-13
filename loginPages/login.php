<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/global.css" rel="stylesheet">
</head>

<body>
    <header>
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo2.png" alt="logo" width="100em" height="100em">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Sectors</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tickets
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="../ticketPages/newTicket.php">New ticket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../ticketPages/showOneTicket.php">showOneTicket</a></li>
                                <li><a class="dropdown-item" href="../ticketPages/showTickets.php">showTickets</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <?php
                            session_start();
                            if (!isset($_SESSION["login"])) {
                                echo '
                                            <span class="navbar-text">
                                                Not logged in
                                            </span>';
                                echo '
                                            <li class="nav-item">
                                                <a class="nav-link active" href="login.php">login</a>
                                            </li>';
                            } else {
                                echo '
                                            <span class="navbar-text">
                                                Logged in as ' . strtok($_SESSION["login"], '@') . '
                                            </span>';
                                echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="logout">logout</a>
                                            </li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <a class="navbar-brand" href="index.php">
                        <?php
                        $h = gmdate('H');
                        if ($h > 5 && $h <= 12) {
                            echo ' <img src="../img/navigationBar/zebre.png" alt="zebra" width="100em" height="100em" /> ';
                        } elseif ($h > 12 && $h <= 21) {
                            echo ' <img src="../img/navigationBar/giraffe.png" alt="giraffe" width="100em" height="100em" /> ';
                        } else {
                            echo ' <img src="../img/navigationBar/panda.png" alt="panda" width="100em" height="100em" /> ';
                        }
                        ?>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-sm-center">
            <form method="POST" class="col-sm-5" action="verification.php">
                <div>
                    <h1>Login</h1>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="email" name="email" required autofocus>
                    <label for="email">E-mail address</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div>
                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>