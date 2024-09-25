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
    <style>
        /* Estilos generales */
        body {
            background-color: #FDEEDC; /* Fondo claro */
            color: #000; /* Texto negro */
        }

        /* Estilos para el contenedor */
        .container {
            background-color: #F1A661; /* Fondo naranja */
            border: 2px solid #000; /* Borde negro */
            padding: 20px; /* Espaciado general */
            border-radius: 15px; /* Bordes redondeados */
        }

        .form-control {
            background-color: #FFFFFF; /* Fondo blanco para campos */
            color: #000; /* Texto negro */
            border-color: #000; /* Borde negro */
        }

        .form-control::placeholder {
            color: #666; /* Color de placeholder gris */
        }

        .btn {
            background-color: #000; /* Botón negro */
            color: #FDEEDC; /* Texto blanco */
            border: 2px solid #F1A661; /* Borde naranja */
        }

        .btn:hover {
            background-color: #F1A661; /* Cambia a naranja al hover */
            color: #000; /* Texto negro al hover */
            border: 2px solid #000; /* Borde negro al hover */
        }

        .text-center a {
            color: #000; /* Texto negro para el enlace */
            text-decoration: none;
        }

        .text-center a:hover {
            color: #F1A661; /* Texto naranja al pasar el ratón */
        }

        /* Media Queries para Responsividad */
        @media (max-width: 575.98px) {
            .container {
                padding: 10px; /* Menos espaciado en pantallas muy pequeñas */
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .container {
                border-radius: 20px; /* Bordes ligeramente más redondeados */
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .container {
                border-radius: 25px; /* Bordes más redondeados */
            }
        }

        @media (min-width: 992px) {
            .container {
                border-radius: 30px; /* Bordes aún más redondeados en pantallas grandes */
            }
        }

        .error {
            color: red; /* Color para mensajes de error */
        }
    </style>
</head>
<body>
    <?php 
        include "../includes/header-registro-login.php";
    ?>
    <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
        <div class="container text-light p-4 rounded shadow" style="max-width: 400px;">
            <div class="text-center mb-4">
                <?php  
                    if (isset($_SESSION["IgualE"])){
                        echo $_SESSION["IgualE"];
                    }
                ?>
                <img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" width="80" height="80">
                <h1 class="h3 mb-4">Registro</h1>
            </div>
            <form action="../base_de_datos/Subir.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="confirmar-contraseña" class="form-label">Confirmar Contraseña</label>
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
