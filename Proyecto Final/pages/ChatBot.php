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
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/estiloschates.css">
    <title>RecipeEase</title>

</head>

<body>
<?php 
    include "../includes/header.php";
    ?>
    <div class="container-fluid vh-100 p-5">
    <div class="row">
        <div class="col-12 p-4"></div>
    </div>
        <div class="row">
            <div class="col-3 seccion-historial">
                <h4>Historial de Recetas</h4>
                <ul>
                    
                <?php
                $sql = "SELECT NomReceta, Id FROM `recetas recientes` WHERE Id_usuario = " . $_SESSION["IdUsuario"] . " ORDER BY Id DESC";


$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nombreReceta = $row['NomReceta'];
        $idReceta = $row['Id'];
        echo "<li><a href='receta_detalle.php?id=$idReceta'>$nombreReceta</a></li>";
    }
} else {
    echo "<li>No hay recetas recientes.</li>";
}
?>
                 <li><a href="historial.php">Ver todas las recetas</li></a>
                </ul>
               
            </div>

            <div class="col-9">
                <div id="user-prompt-display" class="response-message"></div>
                <div id="chat-messages" class="flex-grow-1 p-3">
                    <div id="response-text" class="response-text mensaje-respuesta">
                        <p id="title" class="titulo-respuesta"></p>
                        <div class="row">
                            <div class="col-6">
                                <label id="ingredients" class="mensaje-respuesta"></label>
                            </div>
                            <div class="col-6 mensaje-respuesta">
                                <label id="instructions"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entrada-chat">
                    <input type="text" id="userPrompt" class="form-control me-3" placeholder="Escribe tu mensaje aquí..." required>
                    <button onclick="FetchOpenAIResponse()" type="submit" class="btn">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("userPrompt").addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();  
                FetchOpenAIResponse(); 
            }
        });
    </script>
    <script src="../assets/js/chatbot.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
