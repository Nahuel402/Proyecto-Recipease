<?php
session_start();
$_SESSION["IgualE"] = " ";
$_SESSION["DistC"] = " ";
$_SESSION["error"]= " ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/alerts.css">
    

   
=======
    <script defer src="../assets/js/Cod.js"></script>
>>>>>>> b3367a20d16705255057f37c5abc14436de62b12
    <title>RecipeEase</title>
</head>
<body class="body">
    <div class="container-index">
        <!-- Left Section -->
        <div class="left-side">
        </div>
        <!-- Right Section -->
        <div class="right-side">
            <div class="content">
                <h1 class="title">RecipeEase</h1>
                <p class="description">Bienvenido a RecipeEase, el chatbot de cocina para facilitarte a la hora de cocinar.</p>
                <p class="sub-description">¡Haz clic en el botón de abajo para empezar!</p>
                <div class="button-container">
                    <a href="acceder.php">
                        <button class=" left-btn " onclick="Login()">Ingresar</button>
                    </a>
                    <a href="Registrarse.php">
                        <button class=" right-btn " onclick="Registrar()">Registro</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
