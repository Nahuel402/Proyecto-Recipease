<?php 
    session_start();
    $ID = -1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Esti.css">
    <script defer src="../assets/js/Cod.js"></script>
    <script defer src="../assets/js/Imagen.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
    <?php 
        include "../includes/header-registro-login.php";
    ?>
    <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
        <div class="container bg-dark text-light p-4 rounded shadow" style="max-width: 400px;">
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
                    <input type="text" class="form-control bg-secondary text-light border-secondary" name="name" placeholder="Ingresa tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control bg-secondary text-light border-secondary" name="email" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control bg-secondary text-light border-secondary" name="Contra" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="confirmar-contraseña" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control bg-secondary text-light border-secondary"  name="confirmar-contraseña" placeholder="Confirma tu contraseña">
                    <?php  
                        if (isset($_SESSION["DistC"])){
                            echo"<label class='error'>La contraseña no es la misma</label>";
                        }
                    ?>
                </div>
                <button type="submit" name="Registrar" class="btn btn-dark w-100 mb-3">Registrar</button>
                <div class="text-center">
                    <a href="acceder.php" class="text-light">¿Ya tienes cuenta? ¡Inicia sesión aquí!</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
