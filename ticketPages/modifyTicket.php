<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ticket view</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../css/global.css" rel="stylesheet">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../img/logo2.png" alt="logo" width="100em" height="100em">
                        <?php 
                            $h = gmdate('H');
                            if($h>5 && $h<=12){
                                echo ' <img src="../img/navigationBar/zebre.jpg" alt="zebra" width="100em" height="100em" /> ';
                            }
                            elseif($h>12 && $h<=21){
                                echo ' <img src="../img/navigationBar/giraffe.jpg" alt="giraffe" width="100em" height="100em" /> ';
                            }
                            else {
                                echo ' <img src="../img/navigationBar/panda.jpg" alt="panda" width="100em" height="100em" /> ';
                            }
                        ?>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">index</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tickets
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="newTicket.php">newTicket</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="showOneTicket.php">showOneTicket</a></li>
                                    <li><a class="dropdown-item" href="showTickets.php">showTickets</a></li>
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
                                    }
                                    else {
                                        echo '
                                            <span class="navbar-text">
                                                Logged as '.strtok($_SESSION["login"],'@').'
                                            </span>';
                                        echo '
                                            <li class="nav-item">
                                                <a class="nav-link" href="../loginPages/logout">logout</a>
                                            </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <?php
            if (!isset($_SESSION["login"])) {
                echo '<div class="alert alert-warning" role="alert">Login in order to modify a ticket</div>';
                die();
            }
        ?>
        <div class="container">
            <form method="POST" action="updateTicket.php">
                <table class="table table-borderless">
                    <tbody>
                        <th>
                            Modify ticket n°<?php echo $_SESSION['search_ticket_id'];?>
                        </th>
                        <tr>
                            <td>Status</td>
                            <td>
                                <?php 
                                    include_once 'connectSQL.php';
                                    include_once 'setSelected.php';
                                    $sql_get_current_ticket = "SELECT status FROM ticket WHERE id='".$_SESSION['search_ticket_id']."'";
                                    $result = mysqli_query($conn,$sql_get_current_ticket);
                                    $current_status = mysqli_fetch_row($result)[0];
                                ?>
                                <select name="new_status" class="form-select form-select-sm" >
                                    <option <?php set_selected('New',$current_status);      ?>>New </option>
                                    <option <?php set_selected('Ongoing',$current_status);  ?>>Ongoing</option>
                                    <option <?php set_selected('Finished',$current_status); ?>>Finished</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-outline-primary" type="submit">Modify</button>
            </form>
        </div>
    </body>
</html>