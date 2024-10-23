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

$Email = $_POST["email"];
$Contra = $_POST["Contra"];

// Preparar la consulta SQL
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE Email = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if (password_verify($Contra, $row["Contra"])) {
        
        $_SESSION["IdUsuario"] = $row["ID"];
        $_SESSION["Registrado"] = 1;
      

      
        header("Location:../pages/Chatbot.php");
        exit;
    } else {
    
        $_SESSION["error"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>Error!</strong> La contraseña o el correo electrónico son incorrectos.
                                Si no se ha registrado aún, por favor regístrese.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
        header("Location:../pages/acceder.php");
        exit;
    }
} else {
    
    $_SESSION["error"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>Error!</strong> La contraseña o el correo electrónico son incorrectos.
                            Si no se ha registrado aún, por favor regístrese.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";
    header("Location:../pages/acceder.php");
    exit;
}

$stmt->close();
$conn->close();
?>
