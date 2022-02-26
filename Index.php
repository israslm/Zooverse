<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Zooverse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/indexStyle.css" rel="stylesheet">
        <link href="css/global.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <!-- Menu -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="img/logo2.png" alt="logo" width="100em" height="100em">
                        <?php 
                            $h = gmdate('H');
                            if($h>5 && $h<=12){
                                echo ' <img src="img/navigationBar/zebre.jpg" alt="zebra" width="100em" height="100em" /> ';
                            }
                            elseif($h>12 && $h<=21){
                                echo ' <img src="img/navigationBar/giraffe.jpg" alt="giraffe" width="100em" height="100em" /> ';
                            }
                            else {
                                echo ' <img src="img/navigationBar/panda.jpg" alt="panda" width="100em" height="100em" /> ';
                            }
                        ?>
                    </a>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">index</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tickets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="ticketPages/newTicket.php">newTicket</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="ticketPages/showOneTicket.php">showOneTicket</a></li>
                                    <li><a class="dropdown-item" href="ticketPages/showTickets.php">showTickets</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <?php
                                    session_start();
                                    if ($_SESSION == null) {
                                        echo '
                                            <span class="navbar-text">
                                                Not logged in
                                            </span>';
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="loginPages/login.php">login</a>
                                            </li>';
                                    }
                                    elseif ($_SESSION["login"] == null) {
                                        echo '
                                            <span class="navbar-text">
                                                Not logged in
                                            </span>';
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="loginPages/login.php">login</a>
                                            </li>';
                                    }
                                    else {
                                        echo '
                                            <span class="navbar-text">
                                                Logged as '.strtok($_SESSION["login"],'@').'
                                            </span>';
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="loginPages/logout">logout</a>
                                            </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    

                </div>
            </nav>
            <!--
            <nav class="navagation-bar">
                <div class="container-fluid">
                    <img src="img/logo2.png" alt="" width="45" height="44" class="d-inline-block align-text-top" >
                </div>
                <div>
                <ul class="menu">
                    <li><a href="http://localhost/wordpress/">Home</a></li>
                    <li><a href="#" class="active">Sectors</a></li>
                    <li><a href="http://localhost/wordpress/tickets/">Tickets</a></li>
                    <li><a href="http://localhost/wordpress/food-drinks/">Food & Drinks</a></li>
                    <li><a href="http://localhost/wordpress/goodies/">Goodies</a></li>
                </ul>
                </div>
            </nav> 
            -->
        </header>
        <div class="container">
            <div class="intro">
                <h1>Welcome to Zooverse!</h1>
                <p>
                Located an hour north of Sydney on New South Wales' Sunshine Coast, 
                Zooverse has a team of passionate conservationists working around-the-clock to deliver animal experiences like no other. 
                Visit us at Zooverse to see over 100 animals with all your Aussie favourites!
                </p>
                <h2>See our different sectiors !</h2>
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
                            <li><strong>Surface area:</strong> 0.5 hectare </li>
                            <li><strong>Number of animals:</strong> 6 koalas </li>
                            <li><strong>Maximum capacity of people:</strong> 25 </li>
                        </ul>
                    </div>
                </div>
                <div class="column">
                    <div class="content">
                        <img src="img\sections\birds.jpg" alt="birds" width="100%">
                        <h3>Fly with birds</h3>
                        <p>
                        .....
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
                        <img src="img\sections\devil.jpg" alt="devil" width="100%">
                        <h3>Cartoons' animals</h3>
                        <p>
                        .....
                        </p>
                        <ul class="plus">
                            <li><strong>Surface area:</strong> 1 hectare </li>
                            <li><strong>Number of animals:</strong> 3 alligators </li>
                            <li><strong>Maximum capacity of people:</strong> 40 </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>