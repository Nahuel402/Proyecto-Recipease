<?php
session_start(); // Inicia la sesión

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron los datos del POST y el ID del usuario
if (isset($_POST['title']) && isset($_SESSION['IdUsuario'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $instructions = isset($_POST['instructions']) ? $conn->real_escape_string($_POST['instructions']) : '';
    $ingredients = isset($_POST['ingredients']) ? $conn->real_escape_string($_POST['ingredients']) : '';

    // Obtener el ID del usuario de la sesión
    $userId = $conn->real_escape_string($_SESSION['IdUsuario']);

    // Verificar si las instrucciones no están vacías y son válidas antes de insertar
    if (!empty($instructions)) {
        // Preparar la consulta SQL
        $sql = "INSERT INTO `recetas recientes` (NomReceta, Id_usuario, Receta, Ingredientes) 
                VALUES ('$title', '$userId', '$instructions', '$ingredients')";

        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "Receta guardada correctamente."]);
        } else {
            // Enviar mensaje de error si la consulta falló
            echo json_encode(["status" => "error", "message" => "Error al guardar la receta: " . $conn->error]);
        }
    } else {
        // Enviar mensaje de error si las instrucciones están vacías o no válidas
        echo json_encode(["status" => "error", "message" => "Las instrucciones no son válidas."]);
    }
} else {
    // Enviar mensaje de error si faltan datos o el usuario no está autenticado
    echo json_encode(["status" => "error", "message" => "Faltan datos o usuario no autenticado."]);
}

// Cerrar la conexión
$conn->close();
?>
