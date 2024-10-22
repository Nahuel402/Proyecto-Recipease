<?php 
session_start();
$_SESSION["IgualE"] = " ";
$_SESSION["DistC"] = " ";

if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/alerts.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>RecipeEase</title>
    
</head>
<body class="body">
    <?php 
        include "../includes/header-contacto.php";
    ?>
    <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
        <div class="container text-dark p-4 rounded shadow">
            <div class="text-center mb-4">
                <br>
                <img id="filtrado" src="../assets/images/Looo.svg" width="80" height="80">
                <h1 class="h3 mb-4 title">Iniciar sesión</h1>
            </div>
            <form action="../base_de_datos/Chequeo.php" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label description">Correo</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-4">
                    <label for="contraseña" class="form-label description">Contraseña</label>
                    <input type="password" class="form-control" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <?php 
                    if(isset($_SESSION["error"])){
                        echo $_SESSION["error"];
                    }
                ?>
                <button type="submit" name="Registrar" class="btn w-100 mb-3">Ingresar</button>
                <div class="text-center">
                    <a href="Registrarse.php" >¿No tienes cuenta? ¡Regístrate aquí!</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
