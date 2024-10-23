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

if (isset($_POST['id'])) {
    $idReceta = intval($_POST['id']);
    $idUsuario = $_SESSION['IdUsuario'];

    // Eliminar la receta del historial
    $sql = "DELETE FROM `recetas recientes` WHERE Id = $idReceta AND Id_usuario = $idUsuario";
    if ($conn->query($sql) === TRUE) {
        echo "Receta eliminada con éxito";
    } else {
        echo "Error al eliminar la receta: " . $conn->error;
    }
}

$conn->close();

// Redireccionar de nuevo al historial o donde desees
if ($_SESSION["site"] == "historial.php" ) {
    header("Location: ../pages/historial.php");
}elseif ($_SESSION["site"] == "ChatBot.php") {
    header("Location: ../pages/ChatBot.php");
}else{
    header("Location: ../base_de_datos/CerrarSession.php");
}

exit;
?>
