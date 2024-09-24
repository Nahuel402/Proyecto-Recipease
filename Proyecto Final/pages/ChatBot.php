<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$imagen = "";
$nombre = "";
$query = mysqli_query($conn, "SELECT Nombre, Imagen FROM usuarios WHERE ID = " . $_SESSION["IdUsuario"] . "") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($query)) {
    $imagen = $row["Imagen"];
    $nombre = $row["Nombre"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style-Chat.css">
    <title>RecipeEase Chatbot</title>
</head>

<body>
    <?php include "../includes/header-ingresa.php"; ?>

    <div class="container-fluid vh-100 d-flex flex-column justify-content-between p-0">
        <div class="row w-100 h-100">
            <div class="col-12 col-md-10 col-lg-10 mx-auto p-0 d-flex flex-column">
                <div class="chat-header bg-dark text-white p-3">
                    <h4 class="m-0">RecipeEase Chatbot</h4>
                </div>
                <div id="chat-messages" class="flex-grow-1 p-3" style="background-color: #f4f4f4; overflow-y: auto;">
                    <!-- Sección donde se mostrará la respuesta -->
                    <div id="response-text" class="response-text response-message">
                        <div class="col-12 col-md-12 col-lg-12"><p id="title"></p><br></div>
                            <div class="row">
                                <div class="col-6"><label id="ingredients" class="response-message"></div>
                                <div class="col-6"><label id="instructions"></label></div>
                            </div>
                        </div>
                    </div>
                
                <div class="chat-input p-3 bg-light">
                    <input type="text" id="userPrompt" class="form-control me-3" placeholder="Escribe tu mensaje aquí..." required>
                    <button onclick="FetchOpenAIResponse()" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <script defer src="../assets/js/chatbot.js"></script>

    <script>
        // Detectar cuando se presiona "Enter" en el input de texto
        document.getElementById("userPrompt").addEventListener("keypress", function (event) {
            // 13 es el código de la tecla "Enter"
            if (event.key === "Enter") {
                event.preventDefault();  // Evita que se agregue una nueva línea en el input
                FetchOpenAIResponse();   // Llama a la función para enviar el mensaje
            }
        });
    </script>
</body>

</html>
