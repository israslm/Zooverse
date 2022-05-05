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
    <?php
        include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
        $sql = "SELECT * FROM ticket";
        $result = mysqli_query($conn, $sql);
    ?>

    <?php @include $_SERVER['DOCUMENT_ROOT']."/common/navigation.php"; ?>

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
                    <td>Date</td>
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