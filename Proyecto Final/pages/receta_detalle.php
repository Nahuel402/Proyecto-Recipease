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
$imagen = "";
$nombre = "";
$query = mysqli_query($conn, "SELECT Nombre, Imagen FROM usuarios WHERE ID = " . $_SESSION["IdUsuario"] . "") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($query)) {
    $imagen = $row["Imagen"];
    $nombre = $row["Nombre"];
}

if (isset($_GET['id'])) {
    $idReceta = intval($_GET['id']); // Asegúrate de convertirlo a entero para evitar inyecciones SQL

    // Consulta para obtener los detalles de la receta
    $sql = "SELECT NomReceta, Ingredientes, Receta FROM `recetas recientes` WHERE Id = $idReceta AND Id_usuario = " . $_SESSION["IdUsuario"];
    $result = mysqli_query($conn, $sql);

    // Comprobar si se obtuvo la receta
    if ($result && mysqli_num_rows($result) > 0) {
        $receta = mysqli_fetch_assoc($result);
    } else {
        // Redirigir o mostrar un mensaje si no se encuentra la receta
        echo "<script>alert('Receta no encontrada.'); window.location.href='historial.php';</script>";
        exit;
    }
} else {
    // Redirigir si no se proporciona un ID
    echo "<script>alert('ID de receta no válido.'); window.location.href='historial.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/recetas.css">
    <title>Detalles de la Receta - <?php echo $receta['NomReceta']; ?></title>
</head>
<body>
    <?php include "../includes/header.php"; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12"><br></div>
        </div>
        <h1 class="text-center mb-4"><?php echo $receta['NomReceta']; ?></h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ingredientes:</h5>
               <!-- nl2br mantiene los saltos de linea -->
                <p class="card-text"><?php echo nl2br($receta['Ingredientes']); ?></p>
                <h5 class="card-title">Instrucciones:</h5>
                <p class="card-text"><?php echo nl2br($receta['Receta']); ?></p>
            </div>
        </div>
        <a href="historial.php" class="btn btn-custom justify-text-center">Volver a historial  </a>
    </div>
    

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
