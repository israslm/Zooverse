<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ticket view</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
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
        <div class="container">
            <form action="showOneTicket.php" method="POST">
                <div class="input-group">
                    <input name="search_ticket_id" type="text" class="form-control" placeholder="Enter ticket's id">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </form>
            <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $search_ticket_id = $_POST["search_ticket_id"];
                    include_once 'connectSQL.php';
                    $sql = "SELECT * FROM ticket WHERE id='$search_ticket_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {?>
                        <table class="table table-borderless">
                            <tbody>
                                <th>
                                    all tickets
                                </th>
                                <tr>
                                    <td>id</td>
                                    <td>date and time</td>
                                    <td>login</td>
                                    <td>subject</td>
                                    <td>description</td>
                                    <td>urgency</td>
                                    <td>sector</td>
                                    <td>status</td>
                                </tr>
                                <?php
                                while($row = mysqli_fetch_array($result)) {?>
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
                                }?>
                            </tbody>
                        </table><?php
                    } else {
                        echo "No ticket found";
                    }
                    $conn->close();
                }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>