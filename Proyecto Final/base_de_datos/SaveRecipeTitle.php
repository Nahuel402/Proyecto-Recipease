<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos POST están presentes
if (isset($_POST['title']) && isset($_POST['instructions']) && isset($_POST['ingredients'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $instructions = $conn->real_escape_string($_POST['instructions']);
    $ingredients = $conn->real_escape_string($_POST['ingredients']);

    // Validar que la lista de ingredientes no esté vacía
    if (empty($ingredients)) {
        echo "No se puede guardar la receta porque no contiene ingredientes.";
    } else {
        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION['IdUsuario'])) {
            $userId = $conn->real_escape_string($_SESSION['IdUsuario']);
            
            // Preparar y ejecutar la consulta de inserción
            $sql = "INSERT INTO `recetas recientes` (NomReceta, Id_usuario, Receta, Ingredientes) 
                    VALUES ('$title', '$userId', '$instructions', '$ingredients')";

            if ($conn->query($sql) === TRUE) {
                echo "Receta guardada correctamente.";
            } else {
                echo "Error al guardar la receta: " . $conn->error;
            }
        } else {
            echo "Usuario no identificado.";
        }
    }
} else {
    echo "Datos incompletos.";
}

$conn->close();
?>
