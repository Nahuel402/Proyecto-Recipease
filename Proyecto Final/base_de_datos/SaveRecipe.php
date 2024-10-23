<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['title']) && isset($_POST['instructions']) && isset($_POST['ingredients'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $instructions = $conn->real_escape_string($_POST['instructions']);
    $ingredients = $conn->real_escape_string($_POST['ingredients']);
    if (empty($ingredients)) {
        echo "No se puede guardar la receta porque no contiene ingredientes.";
    } else {
        if (isset($_SESSION['IdUsuario'])) {
            $userId = $conn->real_escape_string($_SESSION['IdUsuario']);
            
            $sql = "INSERT INTO `recetas recientes` (NomReceta, Id_usuario, Receta, Ingredientes) 
                    VALUES ('$title', '$userId', '$instructions', '$ingredients')";

            if ($conn->query($sql) === TRUE) {
                echo "Receta guardada correctamente.";
            } else {
                echo "Error al guardar la receta: " . $conn->error;
            }
        } else {
            header("Location:../pages/ChatBot.php");
        }
    }
} else {
    echo "Datos incompletos.";
}

$conn->close();
?>
