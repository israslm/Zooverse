<?php
  include_once 'connectSQL.php';
    $sql = "SELECT * FROM ticket";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>All tickets view</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <!-- Menu -->
        </header> 
        <div class="container">
            <?php
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
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <?php
                } else {
                    echo "No tickets found";
                }
                $conn->close();?>
        </div>
    </body>
</html>
