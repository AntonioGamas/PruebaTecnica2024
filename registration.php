<?php require("config.php");
session_start();
global $message_code;
$return = false;

if (!empty($_SESSION['email'])) {
    header("location:home.php");
}

if(isset($_POST['registration'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $country = $_POST['country'];
    $favfood = $_POST['favfood'];
    $favplace = $_POST['favplace'];
    $telefono = $_POST['telefono'];
    $favartist = $_POST['favartist'];
    $favcolor = $_POST['favcolor'];
    $image = $_POST['image'];

    $return =  user_registration($email, $username, $password, $name, $country, $favfood, $favplace, $telefono, $favartist, $favcolor, $image);

    if ($return != '2') {
        echo "<script type='text/javascript'>alert('{$message_code[$return]}');</script>";
    }
        else{
            echo "<script type='text/javascript'>;";
            echo "alert('{$message_code[$return]}');";
            echo "window.location.href='login.php';";
            echo "</script>";
        }
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
            <h1>Registro</h1>
        </header>

        <!-- Form Section -->
        <form id="register" action="" method="post">

            <div class="form-group">
            <label id="name-label" for="Nombre">Nombre</label>
                <input type="text" name="name" id="name" required />  

            <label id="apellido-label" for="Apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" required />  
            </div>
            </br>

            <div class="form-group">
            <label id="email-label" for="email">email</label>
                <input type="email" name="email" id="email" required />
            <label id="telefono-label" for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" placeholder="+00" required />
            </div>
            </br>

            <div class="form-group">
                Pais
                <input type="text" name="country" id="country" required />  
            </div>
            </br>

            <div class="form-group">
                Comida Favorita   
                <input type="text" name="favfood" id="favfood" required /> 
                Artista Favorita   
                <input type="text" name="favartist" id="favartist" required />   
                </div>
            <br />

            <div class="form-group">
                Lugar Favorito   
                <input type="text" name="favplace" id="favplace" required />   
                Color Favorito   
                <input type="text" name="favcolor" id="favcolor" required />   
            </div>
            <br />

            <div class="form-group">
                    <label id="username-label" for="username">Usuario</label>
                    <input type="text" name="username" id="username"  required />
                    <label id="username-label" for="username">Imagen</label>
                    <input type="file" name="image" id="image" required />
                    
                </div>
                <br />

            <div class="form-group">
            <label id="password-label" for="password">Contraseña</label>
            <input type="password" name="password" id="password" required />
            </div>
            <br />
            
            <div class="form-group">

            </div>

            <div class="form-group">
                <button type="submit" name="registration" id="submit" class="submit-register"><h2>Crear cuenta</h2> 
                </button>
            </div>

            
        </form>
        <br />
        <p>Already have an account? <a href="login.php">Login here!</a></p>
    </div>
</body>
</html>
