<?php 
session_start();
$ID = -1;
$_SESSION["error"] = " ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/alerts.css">
    <script defer src="../assets/js/Cod.js"></script>
    <script defer src="../assets/js/Imagen.js"></script>
    <title>RecipeEase</title>
</head>
<body>

    <?php 
        include "../includes/header-registro-login.php";
    ?>
    <div class="col-lg-12 d-flex  align-items-center vh-100">
        <div class="container text-light rounded shadow" >
            <div class="text-center mb-4">
                <?php  
                    if (isset($_SESSION["IgualE"])){
                        echo $_SESSION["IgualE"];
                    }
                ?>
                <img id="filtrado" src="../assets/images/Looo.svg" width="80" height="80">
                <h1 class="h3 mb-4 title">Registro</h1>
            </div>
            <form action="../base_de_datos/Subir.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label description">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label description">Correo</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label description">Contraseña</label>
                    <input type="password" class="form-control" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="confirmar-contraseña" class="form-label description">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="confirmar-contraseña" placeholder="Confirma tu contraseña">
                    <?php  
                        if (isset($_SESSION["DistC"])){
                            echo $_SESSION["DistC"];
                        }
                    ?>
                </div>
                <button type="submit" name="Registrar" class="btn w-100 mb-3">Registrar</button>
                <div class="text-center">
                    <a href="acceder.php">¿Ya tienes cuenta? ¡Inicia sesión aquí!</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
