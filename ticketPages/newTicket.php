<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Zoo ticket</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../css/newTicket.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <?php
            session_start();
            if ($_SESSION == null) {
                echo '<div class="alert alert-warning" role="alert">Login in order to create a ticket</div>';
                header("Refresh:1; ../loginPages/authentification.html");
            die();
            }
        ?>
        <header>
            <!-- Menu -->
            <nav class="navagation-bar">
                <div>
                    <ul class="menu">
                        <li><a href="../index.php">index</a></li>
                        <li><a href="../loginPages/authentification.html">authentification</a></li>
                        <li><a href="newTicket.php">newTicket</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <form method="POST" action="recupTicket.php">
                <table class="table table-borderless">
                    <tbody>
                        <th>
                            Describe the incident or request
                        </th>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="statut" class="form-select form-select-sm">
                                    <option>New</option>
                                    <option>Ongoing</option>
                                    <option>Finished</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Proprity</td>
                            <td>
                                <select name="prio" class="form-select form-select-sm">
                                    <option>Medium</option>
                                    <option>Very high</option>
                                    <option>High</option>
                                    <option>Low</option>
                                    <option>Very low</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Zoo sector</td>
                            <td>
                                <select name="secteur" class="form-select form-select-sm">
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
                                    <input name="sujet" type="text" class="form-control" placeholder="Enter a relevant subject">
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
                            <td>Claimer</td>
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


