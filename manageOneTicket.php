<?php
include $_SERVER['DOCUMENT_ROOT']."/common/connectSQL.php";
     $sql = "SELECT * FROM ticket";
     $result = mysqli_query($conn, $sql);

            $search_ticket_id = $_GET["id_ticket"];
            $_SESSION['search_ticket_id'] = $search_ticket_id;
            $sql = "SELECT * FROM ticket WHERE id='$search_ticket_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) { ?>
<table class="table table-hover table-striped table-bordered">
    <br>
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
<a>
    <button id="button_modify_ticket" class="btn btn-outline-success" type="submit">Modify</button>
</a>
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
<script>
$('#button_modify_ticket').click(function() {
    $.ajax(
        '//dsagdullin.alwaysdata.net/modifyOneTicket.php', {
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
</script>