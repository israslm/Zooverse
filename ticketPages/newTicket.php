<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New ticket</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <!-- Menu -->
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
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                            <li class="nav-item">
                                <a class="nav-link" href="../loginPages/login.php">login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../loginPages/logout">logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?php
            session_start();
            if ($_SESSION == null) {
                echo '<div class="alert alert-warning" role="alert">Login in order to create a ticket</div>';
                header("Refresh:1; ../loginPages/login.php");
            die();
            }
        ?>
        <div class="container">
            <form method="POST" action="saveTicket.php">
                <table class="table table-borderless">
                    <tbody>
                        <th>
                            Describe the incident or request
                        </th>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-select form-select-sm">
                                    <option>New</option>
                                    <option>Ongoing</option>
                                    <option>Finished</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Proprity</td>
                            <td>
                                <select name="priority" class="form-select form-select-sm">
                                    <option>Medium</option>
                                    <option>Very high</option>
                                    <option>High</option>
                                    <option>Low</option>
                                    <option>Very low</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Sector</td>
                            <td>
                                <select name="sector" class="form-select form-select-sm">
                                    <option selected>Choose a sector</option>
                                    <option>Alligators</option>
                                    <option>Koalas</option>
                                    <option>Birds</option>
                                    <option>Tasmanian devils</option>
                                    <option>Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <input name="subject" type="text" class="form-control" placeholder="Enter a relevant subject">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <div class="form-group">
                                    <textarea name="description" class="form-control form-control-sm" placeholder="Describe the issue" rows="3"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Login</td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <input name="login" type="text" readonly class="form-control" value="<?php echo $_SESSION["login"]?>">
                                    <button button type="submit" class="btn btn-primary ">Submit</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>


