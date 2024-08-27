<?php
require_once('config.php');
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:login.php");
}
if (empty($_SESSION['email'])) {
    header("location:login.php");
} else {
    $email = $_SESSION['email'];
    $return = user_info($email);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="container">
        
        <header>
            <h1>Bienvenido <?php echo $return['username'] ?></h1> 
        </header>
        <div class="user_info">
            <p>
                Username: <?php echo $return['username'] ?><br />
                Email: <?php echo $return['email'] ?><br />
                Nombre: <?php echo $return['name'] ?><br />
                Telefono: <?php echo $return['telefono'] ?><br />
                Pais: <?php echo $return['country'] ?><br />
                Comida Favorita: <?php echo $return['favfood'] ?><br />
                Lugar Favorito: <?php echo $return['favplace'] ?><br />
                Artista Favorito: <?php echo $return['favartist'] ?><br />
                Color Favorito Place: <?php echo $return['favcolor'] ?><br />
            </p>
        </div>
        <!-- Form Section -->
        <form id="logout" action="" method="post">
            <div class="form-group">
                <button type="submit" name="logout" id="submit" class="submit-logout">
                    <h2>Logout</h2>
                </button>
            </div>
        </form>
    </div>
</body>
</html>