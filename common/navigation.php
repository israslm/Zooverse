<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="//dsagdullin.alwaysdata.net">
                <img src="//dsagdullin.alwaysdata.net/img/logo2.png" alt="logo" width="100em" height="100em">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="//dsagdullin.alwaysdata.net">Sectors</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tickets
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item"
                                    href="//dsagdullin.alwaysdata.net/ticketPages/newTicket.php">New ticket</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item"
                                    href="//dsagdullin.alwaysdata.net/ticketPages/searchTicket.php">Search ticket</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="//dsagdullin.alwaysdata.net/ticketPages/allTickets.php">All tickets</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="//dsagdullin.alwaysdata.net/ticketPages/manageTickets.php">Manage tickets</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <?php
                        session_start();
                        if (!isset($_SESSION["login"])) {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="//dsagdullin.alwaysdata.net/signupPages/signup.php">Sign Up</a>
                                </li>';
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="//dsagdullin.alwaysdata.net/loginPages/login.php">Login</a>
                                </li>';
                        } else {
                            echo '
                                <span class="navbar-text font-weight-bold">
                                    Hi, ' . strtok($_SESSION["login"], "@") . '
                                </span>';
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="//dsagdullin.alwaysdata.net/loginPages/logout.php">Logout</a>
                                </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <a class="navbar-brand" href="//dsagdullin.alwaysdata.net">
                <?php
                $h = gmdate('H');
                if ($h > 5 && $h <= 12) {
                    echo ' <img src="//dsagdullin.alwaysdata.net/img/navigationBar/zebra.png" alt="zebra" width="100em" height="100em" /> ';
                } elseif ($h > 12 && $h <= 21) {
                    echo ' <img src="//dsagdullin.alwaysdata.net/img/navigationBar/giraffe.png" alt="giraffe" width="100em" height="100em" /> ';
                } else {
                    echo ' <img src="//dsagdullin.alwaysdata.net/img/navigationBar/panda.png" alt="panda" width="100em" height="100em" /> ';
                }
                ?>
            </a>
        </div>
    </nav>
    <br>
</header>