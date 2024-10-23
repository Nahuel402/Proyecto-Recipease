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

$Editar = $_POST["Editar"];
$ID = $_SESSION["IdUsuario"];
$Nombre = $_POST["name"];
$Email = $_POST["email"];
$Contra = $_POST["Contra"];
$target_dir = "../assets/images/";
$Imagen = "";
$ImagenB = "";


if (isset($_FILES["imagen"])) {
    if ($_FILES["imagen"]["name"] != "") {
        $target_file = $target_dir . time() . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $Imagen = $target_file;
    }
}


$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE ID = '$ID'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);

$ImagenB = $row["Imagen"];

if (password_verify($Contra, $row["Contra"])) {

    $ContraHasheada = $row["Contra"];
} else {
    
    $ContraHasheada = password_hash($Contra, PASSWORD_DEFAULT);
}


if (isset($Editar)) {
    if ($Imagen != "") {
        
        $sql = "UPDATE usuarios SET Nombre = '$Nombre', Email = '$Email', Contra = '$ContraHasheada', Imagen = '$Imagen' WHERE ID = '$ID'";
    } else {
        
        $sql = "UPDATE usuarios SET Nombre = '$Nombre', Email = '$Email', Contra = '$ContraHasheada' WHERE ID = '$ID'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location:../pages/ChatBot.php");
        exit;
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>
