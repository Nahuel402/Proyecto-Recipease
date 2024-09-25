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

$ID = $_POST["Registrar"];
$Email = $_POST["email"];
$Contra = $_POST["Contra"];

$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE Email = '$Email' AND Contra = '$Contra'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_array($query);
    // Verifica que el correo y la contraseña sean correctos
    if ($row["Email"] == $Email && $row["Contra"] == $Contra) {
        $_SESSION["IdUsuario"] = $row["ID"];
        $_SESSION["Registrado"] = 1;
        $_SESSION["role"] = $row["role"];  // Guardar el rol en la sesión

        // Redirigir al chatbot
        header("Location:../pages/Chatbot.php");
        exit; // Asegúrate de usar exit después de header
    }
} else {
    $_SESSION["error"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Ha ocurrido un error!</strong> La contraseña o el correo electrónico son incorrectos.
                            Si no se ha registrado aún, por favor regístrese.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
    header("Location:../pages/acceder.php");
    exit; // Asegúrate de usar exit después de header
}

$conn->close();
?>
