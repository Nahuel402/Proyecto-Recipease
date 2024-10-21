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

if (isset($_SESSION['IdUsuario']) && isset($_POST['id'])) {
    $idUsuario = $_SESSION['IdUsuario'];
    $idReceta = $_POST['id'];
    $nombreReceta = $_POST['title'];
    $instrucciones = $_POST['instructions'];
    $ingredientes = $_POST['ingredients'];

    // Verifica si la receta ya está en favoritos
    $checkQuery = "SELECT * FROM `receta favorita` WHERE Id_usuario = $idUsuario AND Id_receta = $idReceta";
    $result = mysqli_query($conn, $checkQuery);

    if (!$result) {
        // Si hay un error en la consulta, lo muestra
        die("Error en la consulta: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        // Si ya existe, elimina la receta de favoritos
        $deleteQuery = "DELETE FROM `receta favorita` WHERE Id_usuario = $idUsuario AND Id_receta = $idReceta";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "Receta eliminada de favoritos.";
            header("Location:../pages/ChatBot.php");
        } else {
            echo "Error al eliminar la receta: " . mysqli_error($conn);
          
        }
    } else {
        // Si no existe, añade la receta a favoritos
        $insertQuery = "INSERT INTO `receta favorita` (Id_usuario, Id_receta, NomReceta, Receta, Ingredientes) 
                        VALUES ($idUsuario, $idReceta, '$nombreReceta', '$instrucciones', '$ingredientes')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Receta añadida a favoritos.";
            header("Location:../pages/ChatBot.php");
        } else {
            echo "Error al añadir la receta: " . mysqli_error($conn);
        }
    }
} else {
    echo "Error: No se recibió la información correcta.";
}

$conn->close();
?>
