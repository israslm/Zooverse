<?php
    include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
    $sql = "SELECT * FROM ticket";
    $result = mysqli_query($conn, $sql);
    $search_ticket_id = $_POST["select_ticket_id"];
    $_SESSION['search_ticket_id'] = $search_ticket_id;
    $sql = "SELECT * FROM ticket WHERE id='$search_ticket_id'";
    $result = mysqli_query($conn, $sql);
?>
<table class="table table-hover table-striped table-bordered">
    <br>
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
        </tr>
        <?php 
            } 
        $conn->close();?>
    </tbody>
</table>

<div class="row justify-content-sm-center">
    <div class="col-sm-5">
        <div>
            <h1>Modify ticket n°<?php echo $_POST["select_ticket_id"]; ?></h1>
        </div>
        <?php
            session_start();
            if (!isset($_SESSION["login"])) {
                echo '<div class="alert alert-danger" role="alert">Login in order to modify a ticket</div>';
                die();
            }
        ?>


        <table class="table table-borderless">
            <tbody>
                <?php
                        include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
                        include $_SERVER['DOCUMENT_ROOT']."/common/setSelected.php";
                        $sql_get_current_ticket = "SELECT status FROM ticket WHERE id='" . $_POST["select_ticket_id"] . "'";
                        $result = mysqli_query($conn, $sql_get_current_ticket);
                        $current_status = mysqli_fetch_row($result)[0];
                    ?>
                <label for="select_new_status">New status : </label>
                <select id="select_new_status" name="new_status" class="form-select form-select-sm ">
                    <option <?php set_selected('New', $current_status);      ?>>New </option>
                    <option <?php set_selected('Ongoing', $current_status);  ?>>Ongoing</option>
                    <option <?php set_selected('Finished', $current_status); ?>>Finished</option>
                </select>
            </tbody>
        </table>
        <div id="buttonToUpdateTicket">
            <button id="update_ticket_button" class="btn btn-outline-success">Modify</button>
        </div>

    </div>
</div>

<script>
$('#update_ticket_button').click(function() {
    $.ajax(
        '//dsagdullin.alwaysdata.net/ticketPages/partials/updateticketPart.php', {
            method: 'POST',
            data: {
                "select_new_status": $('#select_new_status').find(":selected").text(),
                "select_ticket_id": $('#select_ticket_id').val(),
            },
            success: function(resultat) {
                $('#buttonToUpdateTicket').html(resultat)
            },

        }
    )
})
</script>