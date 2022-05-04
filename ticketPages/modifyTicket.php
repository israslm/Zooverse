<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modify a ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//dsagdullin.alwaysdata.net/css/global.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT']."/common/navigation.php"; ?>

    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-5">
                <div>
                    <h1>Modify ticket n°<?php echo $_SESSION['search_ticket_id']; ?></h1>
                </div>
                <?php
                if (!isset($_SESSION["login"])) {
                    echo '<div class="alert alert-danger" role="alert">Login in order to modify a ticket</div>';
                    die();
                }
                ?>

                <form method="POST" action="//dsagdullin.alwaysdata.net/ticketPages/updateTicket.php">
                    <table class="table table-borderless">
                        <tbody>
                            <?php
                                include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
                                include $_SERVER['DOCUMENT_ROOT']."/common/setSelected.php";
                                $sql_get_current_ticket = "SELECT status FROM ticket WHERE id='" . $_SESSION['search_ticket_id'] . "'";
                                $result = mysqli_query($conn, $sql_get_current_ticket);
                                $current_status = mysqli_fetch_row($result)[0];
                            ?>
                            <label for="new_status">New status : </label>
                            <select id="new_status" name="new_status" class="form-select form-select-sm ">
                                <option <?php set_selected('New', $current_status);      ?>>New </option>
                                <option <?php set_selected('Ongoing', $current_status);  ?>>Ongoing</option>
                                <option <?php set_selected('Finished', $current_status); ?>>Finished</option>
                            </select>

                        </tbody>
                    </table>
                    <button class="btn btn-outline-success" type="submit">Modify</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>