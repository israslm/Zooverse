<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//dsagdullin.alwaysdata.net/css/global.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/common/navigation.php"; ?>

    <?php
        include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
        $sql = "SELECT * FROM ticket";
        $result = mysqli_query($conn, $sql);
    ?>

    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-5">
                <div>
                    <h1>Manage tickets</h1>
                </div>
                <select id="id_ticket" class="form-select">
                    <option selected>Choose ticket id</option>
                    <?php
                    while ($row = mysqli_fetch_array($result)) { ?>
                    <option>
                        <?php echo $row["id"]; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div id="showTicket">

            </div>
        </div>

        <script>
        $(document).ready(function() {
            $('#id_ticket').change(function() {
                $.ajax(
                    '//dsagdullin.alwaysdata.net/manageOneTicket.php', {
                        type: 'GET',
                        method: 'GET',
                        data: {
                            "id_ticket": $('#id_ticket').val()
                        },
                        success: function(resultat) {
                            $('#showTicket').html(resultat)
                        },

                    }
                )
            })

        })
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>