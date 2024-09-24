<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <link rel="stylesheet" href="../assets/css/recetas.css">
    <link rel="stylesheet" href="../assets/css/globales.css">
    <title>Historial de Recetas - RecipeEase</title>
  
</head>
<body>
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
    $query = mysqli_query($conn, "SELECT Nombre, Imagen FROM usuarios WHERE ID = " . $_SESSION["IdUsuario"]) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($query)) {
        $imagen = $row["Imagen"];
        $nombre = $row["Nombre"];
    }
    include "../includes/header.php"; ?>

    <div class="container mt-5">
        <br>
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
               
                <tr>
                    <td>Ensalada César</td>
                    <td>23/09/2024</td>
                    <td>
                        <a href="receta_detalle.php?id=1" class="btn btn-custom">Ver Detalles</a>
                    </td>
                </tr>
                <tr>
                    <td>Pasta Carbonara</td>
                    <td>22/09/2024</td>
                    <td>
                        <a href="receta_detalle.php?id=2" class="btn btn-custom">Ver Detalles</a>
                    </td>
                </tr>
                <tr>
                    <td>Tacos de Pollo</td>
                    <td>21/09/2024</td>
                    <td>
                        <a href="receta_detalle.php?id=3" class="btn btn-custom">Ver Detalles</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
