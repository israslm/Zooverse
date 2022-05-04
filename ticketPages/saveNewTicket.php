<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//dsagdullin.alwaysdata.net/css/global.css" rel="stylesheet">
</head>

<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
        $sql = "INSERT INTO ticket(login,subject,description,priority,sector,status) VALUES('" . $_POST["login"] . "','" . $_POST["subject"] . "','" . $_POST["description"] . "','" . $_POST["priority"] . "','" . $_POST["sector"] . "','" . $_POST["status"] . "')";
    ?>
    <?php @include $_SERVER['DOCUMENT_ROOT']."/common/navigation.php"; ?>

    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-5">
                <div>
                    <h1>New ticket</h1>
                </div>
                <?php
                    if (mysqli_query($conn, $sql)) {
                        echo
                        '<form action="//dsagdullin.alwaysdata.net">
                            <div class="alert alert-success" role="alert">
                                New record created successfully!
                            </div>
                            <div>
                                <button class="btn btn-outline-success" type="submit">Go to homepage</button>
                            </div>
                        </form>';
                        echo "";
                    } else {
                        echo
                        '<form action="//dsagdullin.alwaysdata.net/ticketPages/newTicket.php">
                            <div class="alert alert-danger" role="alert">';
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        echo '
                            </div>
                            <div>
                                <button class="btn btn-outline-success" type="submit">Try again</button>
                            </div>
                        </form>';
                    }
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>