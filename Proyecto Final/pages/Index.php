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
    <link rel="stylesheet" href="../assets/css/indexx.css">
    <script defer src="../assets/js/Cod.js"></script>
    <title>RecipeEase</title>
</head>
<body class="body">
    <div class="container-index">
        <div class="left-side ">
        </div>
        <div class="right-side">
            <div class="content">
                <h1 class="title">RecipeEase</h1>
                <p class="description">Bienvenido a RecipeEase, el chatbot de cocina para facilitarte a la hora de cocinar.</p>
                <p class="sub-description">¡Haz clic en el botón de abajo para empezar!</p>
                
                <div class="button-container">
                    <a href="acceder.php">
                        <button class=" left-btn ">Ingresar</button>
                    </a>
                    <a href="Registrarse.php">
                        <button class=" right-btn ">Registro</button>
                    </a>
                </div>
                <a href="ChatBot.php">
                        <button class=" center-btn ">Ingresar como invitado</button>
                    </a>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
