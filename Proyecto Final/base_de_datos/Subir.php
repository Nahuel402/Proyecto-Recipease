<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado correctamente
if (isset($_POST["Registrar"]) && isset($_POST["email"]) && isset($_POST["Contra"])) {
    $Email = $_POST["email"];
    $Contra = $_POST["Contra"];

    // Utilizar declaraciones preparadas para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE Email = ? AND Contra = ?");
    $stmt->bind_param("ss", $Email, $Contra);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($row = $result->fetch_assoc()) {
        // Usuario encontrado, establecer las sesiones y redirigir al chatbot
        $_SESSION["Idusuario"] = $row["ID"];
        $_SESSION["Registrado"] = 1;
        header("Location: ../pages/Chatbot.php");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $_SESSION['error_message'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Oye!</strong> Has tenido un problema con tu inicio de sesión, intenta de nuevo.<br>
            No te has registrado? <a href='Registrarse.php' class='BotRegistro'>Haz click aquí</a>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
        header('Location: ../pages/acceder.php');
        exit();
    }

    $stmt->close();
} else {
    // Redirigir si no se enviaron los datos necesarios
    header('Location: ../pages/acceder.php');
    exit();
}

$conn->close();
?>
