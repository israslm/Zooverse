<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//dsagdullin.alwaysdata.net/css/global.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/common/navigation.php"; ?>

    <div class="container">
        <div class="row justify-content-sm-center">
            <form method="POST" class="col-sm-5" id="form"
                action="//dsagdullin.alwaysdata.net/signupPages/verificationSignup.php">
                <div>
                    <h1>Sign Up</h1>
                </div>
                <div class="form-floating mb-3">
                    <input id="email" class="form-control" type="email" name="email" required autofocus>
                    <label for="email">E-mail address</label>
                </div>
                <div class="form-floating mb-3">
                    <input id="password" class="form-control" type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <span class="btn btn-outline-success" id="submit_signup_button" type="submit">Submit</span>
            </form>
        </div>
    </div>

    <script src="//dsagdullin.alwaysdata.net/js/signup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>