<header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo2.png" alt="logo" width="100em" height="100em">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Sectors</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tickets
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="newTicket.php">New ticket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="showOneTicket.php">Ticket search</a></li>
                                <li><a class="dropdown-item" href="showTickets.php">All tickets</a></li>
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
                                                <a class="nav-link" href="../loginPages/login.php">login</a>
                                            </li>';
                            } else {
                                echo '
                                            <span class="navbar-text">
                                                Logged in as ' . strtok($_SESSION["login"], '@') . '
                                            </span>';
                                echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="../loginPages/logout.php">logout</a>
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