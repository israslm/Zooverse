<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Zooverse</title>
        <link href="css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="top-image">
                <?php 
                    $h = gmdate('H');
                    if($h>5 && $h<=12){
                        echo ' <img src="img/navigationBar/zebre.jpg" alt="zebra" width="100em" /> ';
                    }
                    elseif($h>12 && $h<=21){
                        echo ' <img src="img/navigationBar/giraffe.jpg" alt="giraffe" width="100em" /> ';
                    }
                    else {
                        echo ' <img src="img/navigationBar/panda.jpg" alt="panda" width="100em" /> ';
                    }
                ?>
            </div>
            <!-- Menu -->
            <nav class="navagation-bar">
                <div>
                    <ul class="menu">
                        <li><a href="loginPages/logout.php">logout</a></li>
                        <li><a href="index.php">index</a></li>
                        <li><a href="loginPages/authentification.html">authentification</a></li>
                        <li><a href="ticketPages/newTicket.php">newTicket</a></li>
                        <li><a href="ticketPages/afficheListeTickets.php">afficheListeTickets</a></li>
                    </ul>
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
        <section>
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
        </section>
    </body>
</html>