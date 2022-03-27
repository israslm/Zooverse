<?php
include_once '../common/connectSQL.php';
$sql = "SELECT * FROM ticket";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/global.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo2.png" alt="logo" width="100em" height="100em">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-5">
                <div>
                    <h1>View of all tickets</h1>
                </div>
            </div>
        </div>
        <?php
        if (mysqli_num_rows($result) > 0) { ?>
        <table class="table table-hover table-striped table-bordered">
            <tbody>
                <thead>
                    <td>Id</td>
                    <td>Date and time</td>
                    <td>Login</td>
                    <td>Subject</td>
                    <td>Description</td>
                    <td>Urgency</td>
                    <td>Sector</td>
                    <td>Status</td>
                </thead>
                <?php
                    while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["datet"]; ?></td>
                    <td><?php echo $row["login"]; ?></td>
                    <td><?php echo $row["subject"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["priority"]; ?></td>
                    <td><?php echo $row["sector"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                </tr><?php
                            } ?>
            </tbody>
        </table><?php
                } else {
                    echo "No tickets found";
                }
                $conn->close();
                    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>