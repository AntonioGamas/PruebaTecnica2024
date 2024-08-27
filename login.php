<?php
require_once('config.php');
session_start();
$return = false;

if (!empty($_SESSION['email'])) {
    header("location:home.php");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $return = login($email, $password);
    echo "<script type='text/javascript'>alert('{$message_code[$return]}');</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <div class="container">
        <header>
            <h1>Login</h1>
        </header>

        <form id="register" action="" method="post">

            <div class="form-group">
                <label id="email-label" for="email">Email</label>
                <input type="email" name="email" id="email" required />
            </div>
            <br />
            <div class="form-group">
                <label id="password-label" for="password">Password</label>
                <input type="password" name="password" id="password" required />
            </div>
            <br />
            <div class="form-group">
                <button type="submit" name="login" id="submit" class="submit-login"> <h2>Login</h2>
                </button>
            </div>
        </form>
        <br />
        <p><a href="registration.php">Crear cuenta</a></p>
    </div>
</body>
</html>