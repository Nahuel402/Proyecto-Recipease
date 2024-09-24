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
<<<<<<< HEAD

$imagen = "";
$nombre = "";
$query = mysqli_query($conn, "SELECT Nombre, Imagen FROM usuarios WHERE ID = " . $_SESSION["IdUsuario"]) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($query)) {
=======
$imagen= "";
$nombre= "";
$query = mysqli_query($conn, " SELECT Nombre, Imagen FROM usuarios WHERE ID = ".$_SESSION["IdUsuario"]."") or die (mysqli_error($conn));
while ($row = mysqli_fetch_array($query)){
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
    $imagen = $row["Imagen"];
    $nombre = $row["Nombre"];
}
?>
<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

=======
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="../assets/css/estiloschate.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <title>RecipeEase Chatbot</title>
   
</head>

<body>
    <?php include "../includes/header.php"; ?>

    <div class="container-fluid vh-100 p-5">
        <div class="row">
            <div class="col-12 "> <br> </div>
        </div>
        <div class="row w-100 h-100">
            <div class="col-12 col-md-10 col-lg-10 mx-auto p-0 d-flex flex-column">
                <div class="chat-header p-3">
                    <h4 class="m-0">RecipeEase Chatbot</h4>
                </div>
                <div id="chat-messages" class="flex-grow-1 p-3">
                    <!-- Sección donde se mostrará la respuesta -->
                    <div id="response-text" class="response-text response-message">
                        <div class="col-12 col-md-12 col-lg-12"><p id="title"></p><br></div>
                        <div class="row">
                            <div class="col-6"><label id="ingredients" class="response-message"></label></div>
                            <div class="col-6"><label id="instructions"></label></div>
                        </div>
                    </div>
                </div>

                <div class="chat-input">
                    <input type="text" id="userPrompt" class="form-control me-3" placeholder="Escribe tu mensaje aquí..." required>
                    <button onclick="FetchOpenAIResponse()" type="submit" class="btn">Enviar</button>
=======
    <link rel="stylesheet" href="../assets/css/Estil.css">
    <title>RecipeEase Chatbot</title>
    <style>
        .chat-input {
            display: flex;
            align-items: center;
        }
        .response-container {
            flex: 1; /* Takes up the remaining space */
            height: 50px; /* Adjust height as needed */
            overflow: hidden;
            background-color: #e9ecef; /* Light background color */
            border-radius: 20px;
            padding: 10px;
            box-sizing: border-box; /* Ensures padding is included in the height */
            margin-right: 10px; /* Space between container and button */
            display: flex;
            align-items: center;
            justify-content: center; /* Center the text */
        }
        .response-text {
            font-size: 16px; /* Adjust font size as needed */
            color: #333; /* Dark text color for contrast */
            text-align: center; /* Center text horizontally */
        }
        .btn {
            border-radius: 20px;
            width: 100px;
        }
    </style>
</head>
<body class="">
    <?php 
        include "../includes/header-ingresado.php";
    ?>

    
<div class="container-fluid vh-100 d-flex flex-column justify-content-between p-0 ">
        <div class="row w-100 h-100">
            <div class="col-12 col-md-8 col-lg-6 mx-auto p-0 d-flex flex-column ">

                <div class="chat-header bg-dark text-white p-3">
                    <h4 class="m-0">RecipeEase Chatbot</h4>
                </div>

                <div id="chat-messages" class="flex-grow-1 p-3" style="background-color: #f4f4f4; overflow-y: auto;">
                    <!-- Messages will appear here -->
                    <div id="response-text" class="response-text">
                        <p id="response">Aquí se mostrará la respuesta del chatbot.</p>
                    </div>
                </div>
                <div class="chat-input p-3 bg-light">
                    <input type="text" name="message" id="userPrompt" class="form-control me-3" placeholder="Escribe tu mensaje aquí..." required>
                    <!-- Llamada corregida a FetchOpenAIResponse -->
                    <button onclick="FetchOpenAIResponse()" type="submit" class="btn btn-primary">Enviar</button>
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

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
    <script src="../assets/js/chatbot.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
=======
</body>
    <script defer src="../assets/js/Cod.js"></script>
    <script defer src="../assets/js/chatbot.js"></script>
    <script defer src="../bootstrap/js/bootstrap.min.js"></script>

</html>
>>>>>>> a0c53c1ba67e5c1aed1917f2be81ce77883a9a92
