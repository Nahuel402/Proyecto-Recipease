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
$noingreso= "";
$imagen = "";
$nombre = "";
if (isset($_SESSION["IdUsuario"])){
    $query = mysqli_query($conn, "SELECT Nombre, Imagen FROM usuarios WHERE ID = " . $_SESSION["IdUsuario"] . "") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($query)) {
        $imagen = $row["Imagen"];
        $nombre = $row["Nombre"];
    }
}else{
    $noingreso="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>Te has ingresado como invitado!</strong> Create una cuenta para disfrutár de todos nuestros servicios y guardar tus recetas favoritas <br><a href='Registrarse.php' class='A-Registro'>Registrate</a>/<a href='acceder.php' class='A-Registro'>Ingresate</a>
                                </div>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/estiloschat.css">
       
    <title>RecipeEase</title>

</head>

<body>
<?php 
    include "../includes/header.php";
    ?>
    <div class="container-fluid vh-100 p-5 ">
    <div class="row">
        <div class="col-12 p-4"></div>
    </div>
        <div class="row">
            <div class="col-3 seccion-historial">
                <h4>Historial de Recetas</h4>
                <ul>
                <?php
            if (isset($_SESSION["IdUsuario"])) {
                $idUsuario = $_SESSION["IdUsuario"];
                $sql = "SELECT r.Id, r.NomReceta, 
                        (SELECT COUNT(*) FROM `receta favorita` rf WHERE rf.Id_usuario = $idUsuario AND rf.Id_receta = r.Id) AS esFavorito
                        FROM `recetas recientes` r WHERE r.Id_usuario = $idUsuario ORDER BY r.Id DESC";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nombreReceta = $row['NomReceta'];
                        $idReceta = $row['Id'];
                        $esFavorito = $row['esFavorito']; // Si es 1, la receta es favorita

                        // Cambia el ícono del corazón según si es favorito
                        $iconoCorazon = $esFavorito ? '../assets/images/corazon.png' : '../assets/images/corazonvacio.png';
                        $claseFavorito = $esFavorito ? 'red' : '';  // Clase 'red' si es favorito

                        echo "<li class='Recetas'>
                        <a href='receta_detalle.php?id=$idReceta'>$nombreReceta</a>
                        <div class='RecetasFav'>
                            <div class='container-buttons-card d-flex justify-content-end'>
                                <form action='../base_de_datos/saveFavorite.php' method='POST'>
                                    <input type='hidden' name='id' value='$idReceta'>
                                    <input type='hidden' name='title' value='$nombreReceta'>
                                    <input type='hidden' name='instructions' value='Instrucciones de ejemplo'>
                                    <input type='hidden' name='ingredients' value='Ingredientes de ejemplo'>
                                    <button class='favorite' onclick='toggleHeart(this)'>
                                        <img class='favorite-btn $claseFavorito' src='$iconoCorazon' id='favorite-$idReceta' alt='Heart'>
                                    </button>
                                </form>
                                <form action='../base_de_datos/deleteRecipe.php' method='POST' style='margin-left: 10px;'>
                                    <input type='hidden' name='id' value='$idReceta'>
                                    <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta receta del historial?\")'>
                                        <img src='../assets/images/cruz.jpg' alt='Borrar' style='width: 16px; height: 16px;'>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>";
            }
                } else {
                    echo "<li>No hay recetas recientes.</li>";
                }

                echo "<li class='Historial btn btn-primary'><a href='historial.php'>Ver todas las recetas</a></li>";
            } else {
                echo $noingreso;
            }
            ?>
                 
            </div>

            <div class="col-9  ">
                <div id="user-prompt-display" class="response-message"></div>
                <div id="chat-messages" class="flex-grow-1 p-3">
                    <div id="response-text" class="response-text ">
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
