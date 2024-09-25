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

if (isset($_POST['title'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $instructions = isset($_POST['instructions']) ? $conn->real_escape_string($_POST['instructions']) : '';
    $ingredients = isset($_POST['ingredients']) ? $conn->real_escape_string($_POST['ingredients']) : '';

    // Verificar si el ID del usuario está disponible
    if (isset($_SESSION['IdUsuario'])) {}
    else if (isset($_POST['instructions'])) { // Aquí faltaba el cierre del paréntesis
        $userId = $conn->real_escape_string($_SESSION['IdUsuario']);
        // Preparar la consulta SQL
        $sql = "INSERT INTO `recetas recientes` (NomReceta, Id_usuario, Receta, Ingredientes) VALUES ('$title', '$userId', '$instructions', '$ingredients')";
    }}

$conn->close();
?>

