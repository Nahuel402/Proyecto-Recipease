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
    <title>Historial de Recetas - RecipeEase</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>

    <div class="container mt-5">
    <div class="row">
            <div class="col-12"><br></div>
        </div>
        <h1 class="text-center mb-4">Historial de Recetas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Receta</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener las recetas recientes
                $sql = "SELECT NomReceta, Id FROM `recetas recientes` WHERE Id_usuario = " . $_SESSION["IdUsuario"] . " ORDER BY Id DESC";
                
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idReceta = $row['Id'];
                        $nombreReceta = $row['NomReceta'];
                       
                      
                        echo "<tr>
                                <td>$nombreReceta</td>
                                <td>choquito hermoso</td>
                                <td>
                                    <a href='receta_detalle.php?id=$idReceta' class='btn btn-custom'>Ver Detalles</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No hay recetas recientes.</td></tr>";
                }
                ?>
            </tbody>
            
        </table>
        <div class="text-center">
        <a href="ChatBot.php" class="btn btn-custom">Volver al chat</a>
    </div>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
