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
$Nombre = $_POST["name"];
$Email = $_POST["email"];
$Contra = $_POST["Contra"];
$Confir = $_POST["confirmar-contraseña"];
$Imagen = "../assets/images/default.png";

$query = mysqli_query($conn, "SELECT Email FROM usuarios WHERE Email = '$Email'");
if (mysqli_num_rows($query) > 0) {
    $_SESSION["IgualE"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>¡Error!</strong> Existe un usuario con ese correo electrónico, por favor ingrese otro.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
    header("Location:../pages/Registrarse.php");
    exit;
}

if ($Contra !== $Confir) {
    $_SESSION["DistC"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>¡Error!</strong> Las contraseñas no coinciden.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
    header("Location:../pages/Registrarse.php");
    exit;
}


$hashedPassword = password_hash($Contra, PASSWORD_DEFAULT);


$sql = "INSERT INTO usuarios (Nombre, Email, Contra, Imagen) VALUES ('$Nombre', '$Email', '$hashedPassword', '$Imagen')";
if ($conn->query($sql) === TRUE) {
   
    $query = mysqli_query($conn, "SELECT ID FROM usuarios WHERE Email = '$Email'");
    $row = mysqli_fetch_array($query);
    
    if ($row) {
        $_SESSION["IdUsuario"] = $row["ID"];
        $_SESSION["Registrado"] = 1;
        header("Location:../pages/ChatBot.php");
    }
} else {
    $_SESSION["RegistroError"] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Error!</strong> No se pudo registrar el usuario. Inténtelo nuevamente.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
    header("Location:../pages/Registrarse.php");
}

$conn->close();
exit;
?>