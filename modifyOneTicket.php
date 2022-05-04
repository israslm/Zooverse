<?php
include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
     $sql = "SELECT * FROM ticket";
     $result = mysqli_query($conn, $sql);

            $search_ticket_id = $_GET["id_ticket"];
            $_SESSION['search_ticket_id'] = $search_ticket_id;
            $sql = "SELECT * FROM ticket WHERE id='$search_ticket_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) { 
        ?>

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
</table>

<?php
            } else {
                echo '
                        <div class="row justify-content-sm-center">
                            <div class="col-sm-5">
                                <div class="alert alert-danger" role="alert">
                                    No ticket found!
                                </div>
                            </div>
                        </div>';
            }
            $conn->close();
        ?>
<div class="col-sm-5">
    <div>
        <h1>Modify ticket n°<?php echo $_GET["id_ticket"]; ?></h1>
    </div>
    <?php
        session_start();
                if (!isset($_SESSION["login"])) {
                    echo '<div class="alert alert-danger" role="alert">Login in order to modify a ticket</div>';
                    die();
                }
                ?>

    <form>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Status</td>
                    <td>
                        <?php
                                    include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
                                    include $_SERVER['DOCUMENT_ROOT']."/common/setSelected.php";
                                    $sql_get_current_ticket = "SELECT status FROM ticket WHERE id='" . $_GET["id_ticket"] . "'";
                                    $result = mysqli_query($conn, $sql_get_current_ticket);
                                    $current_status = mysqli_fetch_row($result)[0];
                                    ?>
                        <select id="new_satuts" name="new_status" class="form-select form-select-sm ">
                            <option <?php set_selected('New', $current_status);      ?>>New </option>
                            <option <?php set_selected('Ongoing', $current_status);  ?>>Ongoing</option>
                            <option <?php set_selected('Finished', $current_status); ?>>Finished</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <button id="button_update_ticket" class="btn btn-outline-success">Modify</button>
    </form>

    <script>
    $('#button_update_ticket').click(function() {
        console.log($('#new_satuts').text());
        // $.ajax(
        //     '//dsagdullin.alwaysdata.net/updateOneticket.php', {
        //         type: 'GET',
        //         method: 'GET',
        //         data: {
        //             "new_satuts": $('#new_satuts').text(),
        //             "id_ticket": $('#id_ticket').val(),

        //         },
        //         success: function(resultat) {
        //             $('#showTicket').html(resultat)
        //         },

        //     }
        // )
    })
    </script>