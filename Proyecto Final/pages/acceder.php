<?php 
session_start();

if (isset($_SESSION['error_message'])) {
    echo $_SESSION['error_message'];
<<<<<<< HEAD
=======
    
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<<<<<<< HEAD
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
                <img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" width="80" height="80">
                <h1 class="h3 mb-4">Iniciar sesión</h1>
            </div>
            <form action="../base_de_datos/Chequeo.php" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-4">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <?php 
                    if(isset($_SESSION["error"])){
                        echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';
                    }
                ?>
                <button type="submit" name="Registrar" class="btn w-100 mb-3">Ingresar</button>
                <div class="text-center">
                    <a href="Registrarse.php">¿No tienes cuenta? ¡Regístrate aquí!</a>
                </div>
            </form>
        </div>
    </div>
=======
    <link rel="stylesheet" href="../assets/css/Estil.css">
    <title>RecipeEase</title>
</head>
<body class="body">
    <?php 
        include "../includes/header-registro-login.php";
    ?>
        <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
            <div class="container bg-dark text-light p-4 rounded shadow" style="max-width: 400px;">
                <div class="text-center mb-4">
                    <img src="https://images.vexels.com/media/users/3/235848/isolated/preview/4b62529b242dcef2dbc6719899ecdd6e-chefs-kitchen-hat.png" alt="Carrito" width="80" height="80">
                    <h1 class="h3 mb-4">Iniciar sesión</h1>
                </div>
                <form action="../base_de_datos/Chequeo.php" method = "POST">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control bg-secondary text-light border-secondary" name="email" placeholder="Ingresa tu correo" required>
                    </div>
                    <div class="mb-4">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control bg-secondary text-light border-secondary" name="Contra" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <?php 
                        if(isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                        }
                    ?>
                    <button type="submit" name="Registrar" class="btn btn-dark w-100 mb-3">Ingresar</button>
                    <div class="text-center">
                        <a href="Registrarse.php" class="text-light">¿No tienes cuenta? ¡Regístrate aquí!</a>
                    </div>
                </form>
            </div>
        </div>
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
