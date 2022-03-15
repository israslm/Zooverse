<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zooverse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/global.css" rel="stylesheet">
    <link href="css/indexStyle.css" rel="stylesheet">
</head>

<body>
    <header>
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo2.png" alt="logo" width="100em" height="100em">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Sectors</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tickets
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="ticketPages/newTicket.php">New ticket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="ticketPages/showOneTicket.php">showOneTicket</a></li>
                                <li><a class="dropdown-item" href="ticketPages/showTickets.php">showTickets</a></li>
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
                                            <a class="nav-link" href="loginPages/login.php">login</a>
                                        </li>';
                            } else {
                                echo '
                                        <span class="navbar-text">
                                            Logged in as ' . strtok($_SESSION["login"], '@') . '
                                        </span>';
                                echo '
                                        <li class="nav-item">
                                            <a class="nav-link" href="loginPages/logout">logout</a>
                                        </li>';
                            }
                            ?>
                        </ul>
                        <a class="navbar-brand" href="index.php">
                            <?php
                            $h = gmdate('H');
                            if ($h > 5 && $h <= 12) {
                                echo ' <img src="img/navigationBar/zebra.png" alt="zebra" width="100em" height="100em" /> ';
                            } elseif ($h > 12 && $h <= 21) {
                                echo ' <img src="img/navigationBar/giraffe.png" alt="giraffe" width="100em" height="100em" /> ';
                            } else {
                                echo ' <img src="img/navigationBar/panda.png" alt="panda" width="100em" height="100em" /> ';
                            }
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="intro">
            <h1>Welcome to Zooverse!</h1>
            <p>
                Located an hour north of Sydney on New South Wales' Sunshine Coast,
                Zooverse has a team of passionate conservationists working around-the-clock to deliver animal experiences like no other.
                Visit us at Zooverse to see over 100 animals with all your Aussie favorites!
            </p>
            <h2>See our different sectors !</h2>
        </div>
        <div class="row">
            <div class="column">
                <div class="content">
                    <img src="img\sections\alligator.jpg" alt="alligator" width="100%">
                    <h3>Australia's scariest animal</h3>
                    <p>
                        Don't miss all of the jaw-snapping alligators action here at Zooverse.
                        Our amazing alligators can be spotted soaking up the Sun's rays and meeting our guests.
                    </p>
                    <ul class="plus">
                        <li><strong>Surface area:</strong> 1 hectare </li>
                        <li><strong>Number of animals:</strong> 3 alligators </li>
                        <li><strong>Maximum capacity of people:</strong> 40 </li>
                    </ul>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <img src="img\sections\koala.jpg" alt="koala" width="100%">
                    <h3>Australia's most famous animal</h3>
                    <p>
                        Get ready for a cuteness overload here at Australia Zoo!
                        Keep your eyes peeled for our Wandering Wildlife Team for your chance to get up close with our adorable koalas.
                    </p>
                    <ul class="plus">
                        <li><strong>Surface area:</strong> 0.5 hectares </li>
                        <li><strong>Number of animals:</strong> 6 koalas </li>
                        <li><strong>Maximum capacity of people:</strong> 25 </li>
                    </ul>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <img src="img\sections\birds.jpg" alt="birds" width="100%">
                    <h3>Fly with colorful birds<br></br></h3>
                    <p>
                        This is a breathtaking walk-through area where guests are encouraged to participate in a sit-and-enjoy experience!
                        If you're lucky, you might even catch the famous calibri!
                    </p>
                    <ul class="plus">
                        <li><strong>Surface area:</strong> 1.8 hectares </li>
                        <li><strong>Number of animals:</strong> 90 birds </li>
                        <li><strong>Maximum capacity of people:</strong> 70 </li>
                    </ul>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <img src="img\sections\devil.jpg" alt="devil" width="100%">
                    <h3>Cartoon animals<br></br></h3>
                    <p>
                        Come visit iconic animals from everyone's favourite cartoons : tasmanian devil, platypus and many more in the most diverse and unique area of the zoo
                    </p>
                    <ul class="plus">
                        <li><strong>Surface area:</strong> 2 hectares </li>
                        <li><strong>Number of animals:</strong> 14 animals </li>
                        <li><strong>Maximum capacity of people:</strong> 100 </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>