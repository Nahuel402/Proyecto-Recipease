<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipeease";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capturar datos del formulario
$ID = $_POST["Registrar"];
$Nombre = mysqli_real_escape_string($conn, $_POST["name"]);
$Email = mysqli_real_escape_string($conn, $_POST["email"]);
$Contra = mysqli_real_escape_string($conn, $_POST["Contra"]);
$Confir = mysqli_real_escape_string($conn, $_POST["confirmar-contraseña"]);
$Imagen = "../assets/images/default.png";

// Determinar rol (usuario o administrador)
if (isset($_POST["role"]) && $_POST["role"] == "admin") {
    $role = "admin"; // Si se seleccionó la opción de administrador
} else {
    $role = "user"; // Por defecto es un usuario normal
}

// Verificar si el correo ya existe
$query = mysqli_query($conn, "SELECT Email FROM usuarios WHERE Email = '$Email'");
if (mysqli_num_rows($query) > 0) {
    $ErrorE = 1;
} else {
    $EGood = 1;
}

// Verificar si las contraseñas coinciden
if ($Contra != $Confir) {
    $ErrorC = 1;
} else {
    $CGood = 1;
}

// Procesar si se ha enviado el formulario
if (isset($ID)) {
    if (isset($ErrorC)) {
        $_SESSION["DistC"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>¡Error!</strong> Las contraseñas no coinciden.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        $_SESSION["IgualE"] = " ";
        header("Location: ../pages/Registrarse.php");
    } elseif (isset($ErrorE) && isset($CGood)) {
        $_SESSION["IgualE"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>¡Error!</strong> Ya existe un usuario con ese correo.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        $_SESSION["DistC"] = " ";
        header("Location: ../pages/Registrarse.php");
    } elseif (isset($ErrorE) && isset($ErrorC)) {
        $_SESSION["DistC"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>¡Error!</strong> Las contraseñas no coinciden.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
        $_SESSION["IgualE"] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <strong>¡Error!</strong> Ya existe un usuario con ese correo.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
<<<<<<< HEAD
            header("Location:../pages/Registrarse.php");
        }else{
            $_SESSION["IgualE"] = " ";
            $_SESSION["DistC"] = " ";
            $sql = "INSERT INTO usuarios (Nombre,Email,Contra,Imagen) VALUES ('$Nombre', '$Email', '$Contra', '../assets/images/person.svg')";
            if($conn->query($sql) == TRUE) {
                $query = mysqli_query($conn, " SELECT ID FROM usuarios WHERE Nombre='$Nombre' AND Contra='$Contra' AND Email='$Email'") or die (mysqli_error($conn));
                while ($row = mysqli_fetch_array($query)){
                    $_SESSION["IdUsuario"] = $row["ID"];
                    $_SESSION["Registrado"]= 1 ;
                    header("Location:../pages/ChatBot.php");
                } 
            }else {
                
            header("Location:../pages/Registrarse.php");
=======
        header("Location: ../pages/Registrarse.php");
    } else {
        $_SESSION["IgualE"] = " ";
        $_SESSION["DistC"] = " ";

        // Insertar el usuario en la base de datos con el rol asignado
        $sql = "INSERT INTO usuarios (Nombre, Email, Contra, Imagen, role) VALUES ('$Nombre', '$Email', '$Contra', '$Imagen', '$role')";
        if ($conn->query($sql) === TRUE) {
            // Obtener el ID del usuario recién creado
            $query = mysqli_query($conn, "SELECT ID FROM usuarios WHERE Nombre='$Nombre' AND Contra='$Contra' AND Email='$Email'");
            while ($row = mysqli_fetch_array($query)) {
                $_SESSION["IdUsuario"] = $row["ID"];
                $_SESSION["Registrado"] = 1;

                // Redirigir a la página de chat
                header("Location: ../pages/ChatBot.php");
>>>>>>> 76802f900ef7ed84ed47f41e24fde42cce905d90
            }
        } else {
            header("Location: ../pages/Registrarse.php");
        }
    }
}

$conn->close();
exit;
?>
