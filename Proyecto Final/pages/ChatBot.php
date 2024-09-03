<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Estil.css">
    <script defer src="../assets/js/Cod.js"></script>
    <script defer src="../assets/css/estiloschat.css"></script>
    
    <title>RecipeEase Chatbot</title>
</head>
<body class="BodyChat">
    <?php 
    if(isset($_SESSION["Registrado"])){   
        include "../includes/header-ingresado.php";
    } else {
        include "../includes/header.php";
    }
    ?>

    <div class="container-fluid vh-100 d-flex flex-column justify-content-between p-0">
        <div class="row w-100 h-100">
            <div class="col-12 col-md-8 col-lg-6 mx-auto p-0 d-flex flex-column">

                <div class="chat-header bg-dark text-white p-3">
                    <h4 class="m-0">RecipeEase Chatbot</h4>
                </div>

                <div id="chat-messages" class="flex-grow-1 p-3" style="background-color: #f4f4f4; overflow-y: auto;">
                   
                </div>

              
                <div class="chat-input p-3 bg-light">
                    <form id="chat-form" action="process_chat.php" method="POST" class="d-flex align-items-center">
                        <input type="text" name="message" id="chat-input" class="form-control me-3" placeholder="Escribe tu mensaje aquí..." required style="border-radius: 20px;">
                        <button type="submit" class="btn btn-primary" style="border-radius: 20px; width: 100px;">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
