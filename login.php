

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login &mdash; TemanSehat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Spicy+Rice&display=swap" rel="stylesheet">
    <style>
        .montserrat> {
        font-family: "Montserrat", serif;
        font-optical-sizing: auto;
        font-weight: 100;
        font-style: normal;
        }
    </style>
</head>
<body class="my-login-page" style="background-image: url(https://wallpaperaccess.com/full/9294650.jpg); background-size: cover; background-position: center; background-attachment: fixed;">
    <section class="h-100 mt-5">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100" style = "display: flex; justify-content: center; align-items: center;">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <center><h4 class="card-title montserrat"><b>Login</b></h4></center>
                            <form method="POST" action="login_action.php" class="my-login-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" required autofocus>
                                    <div class="invalid-feedback">
                                        Username is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                        <a href="forgot.html" class="float-right">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button name="btnlogin" type="submit" style="background-color:#0B8FAC; color: #FFFFFF;" class="btn btn-block">
                                        Login
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Don't have an account yet? <a href="register.php">Create One</a>
                                </div>
                            </form>
                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="footer">
                        <center style="color: #FFFFFF;">Copyright &copy; 2024 &mdash; TemanSehat</center>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
    <script src="js/my-login.js"></script>
</body>
</html>
