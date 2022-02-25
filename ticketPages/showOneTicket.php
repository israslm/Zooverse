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
            <!-- Menu -->
        </header>
        <div class="container">
            <form action="" method="POST">
                <div class="input-group">
                    <input name="search_ticket_id" type="text" class="form-control" placeholder="Enter ticket's id">
                    <button class="btn btn-outline-primary" type="button">Search</button>
                </div>
            </form>
            <?php 
                session_start();
                $search_ticket_id =  $_POST["search_ticket_id"];
                echo $search_ticket_id; ?>
        </div>
    </body>
</html>